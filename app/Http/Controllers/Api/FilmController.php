<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateFilm;
use App\Http\Resources\FilmResource;
use App\Services\FilmService;
use Illuminate\Http\Request;

class FilmController extends Controller
{

    protected $filmService;

    public function __construct(FilmService $filmService)
    {
        $this->filmService = $filmService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateFilm $request)
    {
        $film = $this->filmService->createNewFilm($request->validated());

        return response([
            'data'=>new FilmResource($film),
            'message' => 'Register successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     * @param string $identify
     */
    public function show($identify)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *  @param  string  $identify
     */
    public function update(StoreUpdateFilm $request, $identify)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  string  $identify
     */
    public function destroy($identify)
    {
        //
    }
}
