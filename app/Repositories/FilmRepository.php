<?php

namespace App\Repositories;

use App\Models\Film;
use Illuminate\Support\Facades\Cache;

class FilmRepository
{
    protected $entity;

    public function __construct(Film $film)
    {
        $this->entity = $film;
    }

    public function getAllFilms()
    {
        return $this->entity->get();
    }

    public function createNewFilm(array $data)
    {
        return $this->entity->create($data);
    }

    public function getFilmByUuid(string $uuid)
    {
        return $this->entity->where('uuid', $uuid)->firstOrfail();
    }

    public function deleteFIlmByUuid(string $uuid)
    {
        $film = $this->getFilmByUuid($uuid, false);

        return $film->delete();
    }

    public function updateFilmByUuid(string $uuid, array $data)
    {
        $film = $this->getFilmByUuid($uuid);

        return $film->update($data);
    }
}