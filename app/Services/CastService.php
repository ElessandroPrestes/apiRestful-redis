<?php

namespace App\Services;

use App\Repositories\CastRepository;
use App\Repositories\FilmRepository;

class CastService
{
    protected $castRepository, $filmRepository;

    public function __construct(
        CastRepository $castRepository,
        FilmRepository $filmRepository
    ) {
        $this->castRepository = $castRepository;
        $this->filmRepository = $filmRepository;
    }

    public function getCastsByFilm(string $film)
    {
        $film = $this->filmRepository->getFilmByUuid($film);

        return $this->castRepository->getCastFilm($film->id);
    }

    public function createNewCast(array $data)
    {
        $film = $this->filmRepository->getFilmByUuid($data['film']);

        return $this->castRepository->createNewCast($film->id, $data);
    }

    public function getCastByFilm(string $film, string $uuid)
    {
        $film = $this->filmRepository->getFilmByUuid($film);

        return $this->castRepository->getCastByFilm($film->id, $uuid);
    }

    public function updateCast(string $uuid, array $data)
    {
        $film = $this->filmRepository->getFilmByUuid($data['film']);

        return $this->castRepository->updateCastByUuid($film->id, $uuid, $data);
    }

    public function deleteCast(string $uuid)
    {
        return $this->castRepository->deleteCastByUuid($uuid);
    }
}