<?php

namespace App\Entity;

class Album{

    public function __construct(
        public string|null $id,

        public string|null $name,

        public string|null    $release_date,

        public int|null  $total_tracks,

        public string|null $type,

        public string|null $picture,
    )
    {
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
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

    public function setRelease_date(string $release_date): self
    {
        $this->release_date = $release_date;
        return $this;
    }

    public function getRelease_date(): ?string
    {
        return $this->release_date;
    }

    public function getTotal_tracks(): ?int
    {
        return $this->total_tracks;
    }

    public function setTotal_tracks(int $total_tracks): self
    {
        $this->total_tracks = $total_tracks;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
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
}