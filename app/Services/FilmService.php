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

    public function getFilm(string $identify)
    {
        return $this->repository->getFilmByUuid($identify);
    }

    public function deleteFilm(string $identify)
    {
        return $this->repository->deleteFilmByUuid($identify);
    }

    public function updateFilm(string $identify, array $data)
    {
        return $this->repository->updateFilmByUuid($identify, $data);
    }
}