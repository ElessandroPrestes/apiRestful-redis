<?php

namespace App\Observers;

use Illuminate\Support\Str;
use App\Models\Cast;

class CastObserver
{
    /**
     * Handle the Cast "created" event.
     */
    public function creating(Cast $cast): void
    {
        $cast->uuid = (string) Str::uuid();
    }

    /**
     * Handle the Cast "updated" event.
     */
    public function updated(Cast $cast): void
    {
        //
    }

    /**
     * Handle the Cast "deleted" event.
     */
    public function deleted(Cast $cast): void
    {
        //
    }

    /**
     * Handle the Cast "restored" event.
     */
    public function restored(Cast $cast): void
    {
        //
    }

    /**
     * Handle the Cast "force deleted" event.
     */
    public function forceDeleted(Cast $cast): void
    {
        //
    }
}
