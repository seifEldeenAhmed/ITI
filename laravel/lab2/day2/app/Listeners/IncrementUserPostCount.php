<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\App;
use App\Events\PostCounter;

class IncrementUserPostCount
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCounter $event): void
    {
        $user=$event ->post->user;
        $user->posts_count++;
        $user->save();
    }
}
