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

    public function getFilmByUuid(string $id)
    {
        return $this->entity->where('uuid', $id)->firstOrfail();
    }

    public function deleteFIlmByUuid(string $id)
    {
        $film = $this->getFilmByUuid($id, false);

        return $film->delete();
    }

    public function updateFilmByUuid(string $id, array $data)
    {
        $film = $this->getFilmByUuid($id);

        return $film->update($data);
    }
}