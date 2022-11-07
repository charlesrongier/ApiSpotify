<?php
namespace App\Controllers;
use App\Entity\Artist;

class ArtistController extends Controller
{
    public function index()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/search?q=Eminem&type=artist&limit=50");
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
}