<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Film;

class FilmObserver
{
    /**
     * Handle the Film "created" event.
     */
    public function creating(Film $film): void
    {
        $film->uuid = (string) Str::uuid();
    }

    /**
     * Handle the Film "updated" event.
     */
    public function updated(Film $film): void
    {
        //
    }

    /**
     * Handle the Film "deleted" event.
     */
    public function deleted(Film $film): void
    {
        //
    }

    /**
     * Handle the Film "restored" event.
     */
    public function restored(Film $film): void
    {
        //
    }

    /**
     * Handle the Film "force deleted" event.
     */
    public function forceDeleted(Film $film): void
    {
        //
    }
}
