<?php

namespace Tests\Feature\Api;

use App\Models\Film;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FilmTest extends TestCase
{

    /**
     * @test
     */
    public function not_found_films()
    {
        $response = $this->getJson('/api/films/fake_film');

        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function validations_create_film()
    {
        $response = $this->postJson('/api/films', []);

        $response->assertStatus(422);
    }
    
    /**
     * @test
     */
    public function create_film()
    {
        $response = $this->postJson('/api/films', [
            'title' => 'New Film',
            'synopsis' => 'Synopsis Film'
        ]);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function get_all_films()
    {
        $response = $this->getJson('/api/films');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function get_count_films()
    {
        Film::factory()->count(10)->create();

        $response = $this->getJson('/api/films');

        $response->assertJsonCount(10, 'data');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function get_film()
    {
        $film = Film::factory()->create();

        $response = $this->getJson("/api/films/{$film->uuid}");

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function not_found_update_film()
    {
        $response = $this->putJson('/api/films/fake_film', [
            'title' => 'Film Updated',
            'synopsis' => 'Synopsis Film Updated'
        ]);

        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function validation_update_film()
    {
        $film = Film::factory()->create();

        $response = $this->putJson("/api/films/{$film->uuid}", []);

        $response->assertStatus(422);
    }


    /**
     * @test
     */
    public function update_film()
    {
        $film = Film::factory()->create();

        $response = $this->putJson("/api/films/{$film->uuid}", [
            'title' => 'Film Updated',
            'synopsis' => 'Synopsis Film Updated'
        ]);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function not_found_delete_film()
    {
        $response = $this->deleteJson('/api/films/fake_film');

        $response->assertStatus(404);
    }

    /**
     * @test
     */
    public function delete_course()
    {
        $film = FIlm::factory()->create();

        $response = $this->deleteJson("/api/films/{$film->uuid}");

        $response->assertStatus(204);
    }
}
