<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCast;
use App\Http\Resources\CastResource;
use App\Services\CastService;
use Illuminate\Http\Request;

class CastController extends Controller
{
    protected $castService;

    public function __construct(CastService $castService)
    {
        $this->castService = $castService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($film)
    {
        $casts = $this->castService->getCastsByFilm($film);

        return response([
            'data' => CastResource::collection($casts),
            'message' => 'Casts Successfully listed'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateCast $request)
    {
        $cast = $this->castService->createNewCast($request->validated());

        return response([
            'data'=>new CastResource($cast),
            'message' => 'Register successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     * @param string $uuid
     */
    public function show($film, $uuid)
    {
        $film = $this->castService->getCastByFilm($film, $uuid);

        return response(['data'=>new CastResource($film),
         'message' => 'Cast successfully listed'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     * @param string $uuid
     */
    public function update(StoreUpdateCast $request, $uuid)
    {
        $this->castService->updateCast($uuid, $request->validated());

        return response()->json(['message' => 'Updated']);
    }

    /**
     * Remove the specified resource from storage.
     * @param string $uuid
     */
    public function destroy($uuid)
    {
        $this->castService->deleteCast($uuid);

        return response()->json([], 204);
    }
}
