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

    public function getFilm(string $id)
    {
        return $this->repository->getFilmByUuid($id);
    }

    public function deleteFilm(string $id)
    {
        return $this->repository->deleteFilmByUuid($id);
    }

    public function updateFilm(string $id, array $data)
    {
        return $this->repository->updateFilmByUuid($id, $data);
    }
}