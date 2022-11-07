<?php

namespace App\Entity;

class Album{

    public function __construct(
        public string|null $id,

        public string|null $name,

        public int|null    $track_number,

        public array|null $artists,
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

    public function setTrack_number(int $track_number): self
    {
        $this->track_number = $track_number;
        return $this;
    }

    public function getTrack_number(): ?int
    {
        return $this->track_number;
    }

    public function getArtists(): ?array
    {
        return $this->artists;
    }

    public function setArtists(array $artists): self
    {
        $this->artists = $artists;
        return $this;
    }
    
}