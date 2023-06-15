<?php

namespace Tests\Feature\Api;

use App\Models\Cast;
use App\Models\Film;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CastTest extends TestCase
{
    /**
     * @test
     */
    public function not_found_casts_by_film()
    {
        $response = $this->getJson('/api/films/fake_film/casts');

        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function validations_create_cast_by_film()
    {
        $film = FIlm::factory()->create();

        $response = $this->postJson("/api/films/{$film->uuid}/casts", []);

        $response->assertStatus(422);
    }

    /**
     * @test
     */
    public function create_cast_by_film()
    {
        $film = Film::factory()->create();

        $response = $this->postJson("/api/films/{$film->uuid}/casts", [
            'film' => $film->uuid,
            'name' => 'New Name',
        ]);

        $response->assertStatus(201);
    }

    /**
     *@test
     */
    public function get_all_casts_by_film()
    {
        $film = Film::factory()->create();

        Cast::factory()->count(10)->create([
            'film_id' => $film->id
        ]);

        $response = $this->getJson("/api/films/{$film->uuid}/casts");

        $response->assertJsonCount(10, 'data');

        $response->assertStatus(200);
    }


    /**
     * @test
     */
    public function get_cast_by_film()
    {
        $film = Film::factory()->create();

        $cast = Cast::factory()->create([
            'film_id' => $film->id
        ]);

        $response = $this->getJson("/api/films/{$film->uuid}/casts/{$cast->uuid}");

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function validations_update_cast_by_film()
    {
        $film = Film::factory()->create();
        $cast = Cast::factory()->create();

        $response = $this->putJson("/api/films/{$film->uuid}/casts/{$cast->uuid}", []);

        $response->assertStatus(422);
    }
    
    /**
     * @test
     */
    public function update_cast_by_film()
    {
        $film = Film::factory()->create();
        $cast = Cast::factory()->create();

        $response = $this->putJson("/api/films/{$film->uuid}/casts/{$cast->uuid}",[
            'film' => $film->uuid,
            'name' => 'Cast Updated'
        ]);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function not_found_delete_cast_by_film()
    {
        $film = Film::factory()->create();

        $response = $this->deleteJson("/api/films/{$film->uuid}/casts/fake_cast");

        $response->assertStatus(404);
    }
    
    /**
     * @test
    */
    public function delete_cast_by_film()
    {
        $film = Film::factory()->create();
        $cast = Cast::factory()->create();

        $response = $this->deleteJson("/api/films/{$film->uuid}/casts/{$cast->uuid}");

        $response->assertStatus(204);
    }


}
