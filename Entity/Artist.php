<?php

namespace App\Entity;

class Artist extends Model
{
    public string|null $Id_artist;

    public function __construct(
        public string|null $Id_artist_spotify,

        public string|null $name,

        public int|null    $followers,

        public array|null  $genders,

        public string|null $link,

        public string|null $picture,
    )
    {
        $this->table = "artist";
    }

    public function getId_artist_spotify(): ?string
    {
        return $this->Id_artist_spotify;
    }

    public function setId_artist_spotify(string $Id_artist_spotify): self
    {
        $this->Id_artist_spotify = $Id_artist_spotify;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setFollowers(int $followers): self
    {
        $this->followers = $followers;
        return $this;
    }

    public function getFollowers(): ?int
    {
        return $this->followers;
    }

    public function getGenders(): ?array
    {
        return $this->genders;
    }

    public function setGenders(array $genders): self
    {
        $this->genders = $genders;
        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }


    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;
        return $this;
    }

    public function display(): void{
        echo (
        '<div class=col-md-4>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src=' . $this->getPicture() . 'alt="Image d album">
                <div class="card-body">
                <h5 class="card-title">Name : ' . $this->getName() . '</h5>
                <p class="card-text">Followers : ' . $this->getFollowers() .'</p>
                <p class="card-text">Id : ' . $this->getId() .'</p>
                <p class="card-text">Link : ' . $this->getLink() .'</p>
                <p class="card-text">Genres : ' . $this->getGenders() . '</p>
                </div>
            </div>
        </div>');
    }

}