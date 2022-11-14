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
            $album = new Album($value->id,$value->name,$value->release_date,$value->total_tracks,$value->type,$value->images[0]->url,null);
            $albums[]=$album;
        }

        $this->render('artists/profil', compact('albums'));
    }

    public function tracks(){
        $ch = curl_init();
        if(isset($_GET["idAlbum"])){
            curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/albums/" . $_GET["idAlbum"] . "/tracks");
        }else{
            curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/search?q=Eminem&type=artist&limit=50");
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); 
        curl_close($ch);
        $alltracks = json_decode($result);
        $tracks = [];
        foreach ($alltracks->items as $value){
            $track = new Track($value->id,$value->name,$value->track_number,$value->artists);
            $tracks[]=$track;
        }

        $this->render('artists/tracks', compact('tracks'));
    }

    public function favoris_album(){
        $albums_bd = new Album(null,null,null,null,null,null,null);
        $albums_bd = $albums_bd->findAll();
        if(isset($albums_bd)){
            $albums = [];
            foreach ($albums_bd as $value){
                $album = new Album($value->Id_Album_Spotify,$value->name,$value->release_date,$value->total_tracks,$value->type,$value->picture,$value->tracks,$value->Id_Album);
                $albums[]=$album;
            }
        }
        $this->render('artists/favoris_album', compact('albums'));
    }

    public function add_favoris_album(){
        if(isset($_POST["album"])){
            $value = json_decode($_POST["album"]);
            $value->tracks = null;
            $album = new Album($value->Id_album_spotify,$value->name,$value->release_date,$value->total_tracks,$value->type,$value->picture,$value->tracks);
            $album->create();
        }
        header('location: /artist/favoris_album');
    }

    public function delete_favoris_album(){
        if(isset($_POST["album"])){
            var_dump($_POST["album"]);
            $value = json_decode($_POST["album"]);
            $artist = new Album(null,null,null,null,null,null,null);
            var_dump($value->Id_album);
            $artist->deleteAlbum($value->Id_album);
        }
        header('location: /artist/favoris_album');
    }

    public function favoris_artist(){
        $artists_bd = new Artist(null,null,null,null,null,null);
        $artists_bd = $artists_bd->findAll();
        if(isset($artists_bd)){
            $artists = [];
            foreach ($artists_bd as $value){
                $artist = new Artist($value->Id_artist_spotify,$value->name,$value->followers->total,json_decode($value->genders),$value->link->spotify,$value->picture,$value->Id_artist);
                $artists[]=$artist;
            }
        }
        $this->render('artists/favoris_artist', compact('artists'));
    }

    public function add_favoris_artist(){
        if(isset($_POST["artist"])){
            var_dump($_POST["artist"]);
            $doublon=0;
            $value = json_decode($_POST["artist"]);
            var_dump($value);
            var_dump($value->Id_artist_spotify);
            $artist = new Artist($value->Id_artist_spotify,$value->name,$value->followers,$value->genders,$value->link,$value->picture);
            $artists_bd = new Artist(null,null,null,null,null,null);
            $artists_bd = $artists_bd->findAll();
            foreach ($artists_bd as $donne){
                if($donne->name === $artist->getName()){
                    $doublon=1;
                }
            }
            if($doublon===0){
                $artist->create();
            }
        }
        header('location: /artist/favoris_artist');
    }

    public function delete_favoris_artist(){
        if(isset($_POST["artist"])){
            var_dump($_POST["artist"]);
            $value = json_decode($_POST["artist"]);
            $artist = new Artist(null,null,null,null,null,null);
            var_dump($value->Id_artist);
            $artist->deleteArtist($value->Id_artist);
        }
        header('location: /artist/favoris_artist');
    }
}