<?php

namespace App\Services;

use App\Repositories\FilmRepository;

class FilmService
{
    protected $repository;

    public function __construct(FilmRepository $filmRepository)
    {
        $this->repository = $filmRepository;
    }

    public function getFilms()
    {
        return $this->repository->getAllFilms();
    }

    public function createNewFilm(array $data)
    {
        return $this->repository->createNewFilm($data);
    }

    public function getFilm(string $uuid)
    {
        return $this->repository->getFilmByUuid($uuid);
    }

    public function deleteFilm(string $uuid)
    {
        return $this->repository->deleteFilmByUuid($uuid);
    }

    public function updateFilm(string $uuid, array $data)
    {
        return $this->repository->updateFilmByUuid($uuid, $data);
    }
}