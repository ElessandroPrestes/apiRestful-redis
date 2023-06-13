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
        return Cache::rememberForever('films', function(){
            return $this->entity->with('casts')->get();
        });  
    }

    public function createNewFilm(array $data)
    {
        return $this->entity->create($data);
    }

    public function getFilmByUuid(string $uuid, bool $loadRelationships = true)
    {
        $query = $this->entity->where('uuid', $uuid);

        if ($loadRelationships)
            $query->with('casts');

        return $query->firstOrfail();
    }

    public function deleteFIlmByUuid(string $uuid)
    {
        $film = $this->getFilmByUuid($uuid, false);

        Cache::forget('films');

        return $film->delete();
    }

    public function updateFilmByUuid(string $uuid, array $data)
    {
        $film = $this->getFilmByUuid($uuid, false);

        Cache::forget('films');

        return $film->update($data);
    }
}