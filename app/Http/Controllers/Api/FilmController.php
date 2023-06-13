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
        $films = $this->filmService->getFilms();

        return response([
            'data' => FilmResource::collection($films),
            'message' => 'Successfully listed'
        ], 200);
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
     * @param string $id
     */
    public function show($id)
    {
        $film = $this->filmService->getFilm($id);

        return response(['data'=>new FilmResource($film),
         'message' => 'Film successfully listed'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *  @param  string  $id
     */
    public function update(StoreUpdateFilm $request, $id)
    {
        $this->filmService->updateFilm($id, $request->validated());

        return response()->json(['message' => 'Updated'], 204);
    }

    /**
     * Remove the specified resource from storage.
     * @param  string  $id
     */
    public function destroy($id)
    {
        $this->filmService->deleteFilm($id);

        return response()->json(['message' => 'Deleted'], 204);
    }
}
