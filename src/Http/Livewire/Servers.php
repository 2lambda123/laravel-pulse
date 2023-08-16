<?php

namespace Laravel\Pulse\Http\Livewire;

use Carbon\CarbonImmutable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Pulse\Contracts\ShouldNotReportUsage;
use Laravel\Pulse\Contracts\Storage;
use Laravel\Pulse\Contracts\SupportsServers;
use Laravel\Pulse\Http\Livewire\Concerns\HasPeriod;
use Livewire\Component;

class Servers extends Component implements ShouldNotReportUsage
{
    use HasPeriod;

    /**
     * The number of data points shown on the graph.
     */
    protected int $maxDataPoints = 60;

    /**
     * Render the component.
     */
    public function render(Storage $storage): Renderable
    {
        if (! $storage instanceof SupportsServers) {
            throw new RuntimeException('Storage driver does not support servers.');
        }

        $servers = $storage->servers($this->periodAsInterval());

        if (request()->hasHeader('X-Livewire')) {
            $this->dispatch('chartUpdate', servers: $servers);
        }

        return view('pulse::livewire.servers', [
            'servers' => $servers,
        ]);
    }

    /**
     * Render the placeholder.
     */
    public function placeholder(): Renderable
    {
        return view('pulse::components.placeholder', ['class' => 'col-span-6']);
    }
}
