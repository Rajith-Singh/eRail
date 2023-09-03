<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\etablet;
use App\Models\engine_tablet;


class TabletToEngineTabletJob implements ShouldQueue
{
    protected $tablet;

    public function __construct(etablet $tablet)
    {
        $this->tablet = $tablet;
    }

    public function handle()
    {
        $engine_tablet = new engine_tablet;
        $engine_tablet->etablet = $this->tablet->etablet;
        // Copy other data from $this->tablet to $engine_tablet as needed
        $engine_tablet->save();
    }
}