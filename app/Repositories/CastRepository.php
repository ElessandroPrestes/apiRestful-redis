<?php

namespace App\Repositories;

use App\Models\Cast;
use Illuminate\Support\Facades\Cache;

class CastRepository
{
    protected $entity;

    public function __construct(Cast $cast)
    {
        $this->entity = $cast;
    }

    public function getCastFilm(int $filmId)
    {
        return $this->entity->where('film_id', $filmId)->get();
    }

    public function createNewCast(int $filmId, array $data)
    {
        $data['film_id'] = $filmId;

        return $this->entity->create($data);
    }

    public function getCastByFilm(int $filmId, string $uuid)
    {
        return $this->entity
                    ->where('film_id', $filmId)
                    ->where('uuid', $uuid)
                    ->firstOrfail();
    }

    public function getCastByUuid(string $uuid)
    {
        return $this->entity
                    ->where('uuid', $uuid)
                    ->firstOrfail();
    }

    public function updateCastByUuid(int $filmId, string $uuid, array $data)
    {
        $cast = $this->getCastByUuid($uuid);

        Cache::forget('courses');

        $data['film_id'] = $filmId;

        return $cast->update($data);
    }

    public function deleteCastByUuid(string $uuid)
    {
        $cast = $this->getCastByUuid($uuid);

        Cache::forget('courses');

        return $cast->delete();
    }
}