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
        
        return Cache::rememberForever('films', function () {
            return $this->entity
                        ->with('modules.lessons')
                        ->get();
        });
    }

    public function createNewFilm(array $data)
    {
        return $this->entity->create($data);
    }

    public function getFilmByUuid(string $identify, bool $loadRelationships = true)
    {
        $query = $this->entity->where('uuid', $identify);

        if ($loadRelationships)
            $query->with('modules.lessons');

        return $query->firstOrfail();
    }

    public function deleteFIlmByUuid(string $identify)
    {
        $film = $this->getFilmByUuid($identify, false);

        Cache::forget('films');

        return $film->delete();
    }

    public function updateFilmByUuid(string $identify, array $data)
    {
        $film = $this->getFilmByUuid($identify, false);

        Cache::forget('films');

        return $film->update($data);
    }
}