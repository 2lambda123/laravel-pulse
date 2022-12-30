<x-pulse::card
    class="col-span-2"
    wire:poll=""
>
    <x-slot:title>
        <x-pulse::card-title class="flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 mr-1 stroke-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
            </svg>
            Cache
            <small class="ml-2 text-gray-400 text-xs font-medium">Past 7 days</small>
        </x-pulse::card-title>
    </x-slot:title>

    <div class="grid grid-cols-3">
        <div>
            <div class="text-xs uppercase font-bold text-gray-500">
                Hits
            </div>
            <div class="text-xl uppercase font-bold text-gray-700">
                {{ $cacheStats['hits'] }}
            </div>
        </div>
        <div>
            <div class="text-xs uppercase font-bold text-gray-500">
                Misses
            </div>
            <div class="text-xl uppercase font-bold text-gray-700">
                {{ $cacheStats['misses'] }}
            </div>
        </div>
        <div>
            <div class="text-xs uppercase font-bold text-gray-500">
                Hit Rate
            </div>
            <div class="text-xl uppercase font-bold text-gray-700">
                {{ $cacheStats['hit_rate'] }}%
            </div>
        </div>
    </div>
</x-pulse::card>