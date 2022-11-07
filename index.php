<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php
session_save_path('/Auth-Spotify.php');

use App\Entity\Artist;
use App\Autoloader;

require_once 'Autoloader.php';
require 'Auth-Spotify.php';
Autoloader::register();