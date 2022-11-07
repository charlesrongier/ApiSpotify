<?php
namespace App\Controllers;
use App\Entity\Artist;
use App\Entity\Album;
use App\Entity\Track;

class ArtistController extends Controller
{
    public function index()
    {
        
        $ch = curl_init();
        if(isset($_GET["search"])){
            curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/search?q=" . $_GET['search'] . "&type=artist&limit=50");
        }else{
            curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/search?q=Eminem&type=artist&limit=50");
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); 
        curl_close($ch);
        $jsondecode = json_decode($result);
        $artists = [];
        foreach ($jsondecode->artists->items as $value){
            $artist = new Artist($value->id,$value->name,$value->followers->total,$value->genres,$value->external_urls->spotify,$value->images[0]->url);
            $artists[]=$artist;
        }


        $this->render('artists/index', compact('artists'));
    } 

    public function profil(){
        
        $ch = curl_init();
        if(isset($_GET["id"])){
            curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/artists/" . $_GET["id"]. "/albums");
        }else{
            curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/search?q=Eminem&type=artist&limit=50");
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); 
        curl_close($ch);
        $albumjson = json_decode($result);
        $albums = [];
        foreach ($albumjson->items as $value){
            $album = new Album($value->id,$value->name,$value->release_date,$value->total_tracks,$value->type,$value->images[0]->url);
            $albums[]=$album;
        }

        $this->render('artists/profil', compact('albums'));
    }

    public function tracks(){
        $ch = curl_init();
        if(isset($_GET["idAlbum"])){
            curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/albums/" . $_GET["idAlbum"]. "/tracks");
        }else{
            curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/search?q=Eminem&type=artist&limit=50");
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); 
        curl_close($ch);
        //var_dump(json_decode($result));
        $alltracks = json_decode($result);
        $tracks = [];
        var_dump($alltracks);
        foreach ($alltracks->items as $value){
            $track = new Track($value->id,$value->name,$value->track_number,$value->artists);
            $tracks[]=$track;
            var_dump($tracks);
        }

        $this->render('artists/tracks', compact('tracks'));
    }
}