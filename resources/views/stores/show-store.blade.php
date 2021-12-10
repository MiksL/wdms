<x-app-layout>
    <div class="w-full grid place-items-center" x-data="{ selectedTable: 0 }">
        <div class="absolute grid top-1/4 z-10 right-0 mt-5 text-gray-500 dark:text-gray-200 bg-gray-200 dark:bg-gray-900 rounded-l-xl">
            <button class="m-4 hover:text-gray-900 dark:hover:text-gray-400" @click="selectedTable = 0">
            Currently Stocked
            </button>
        </div>
        @foreach($store as $store)
            @section('title', "$store->name")
            <div class="w-full grid place-items-center my-5 text-gray-500 dark:text-gray-300">
                <div class="my-2 text-lg">{{ $store->location }}</div>
            </div>

            <div class="w-full grid place-items-center text-gray-500 dark:text-gray-300">
                <div x-show="selectedTable === 0">Currently stocked products</div>
                <div x-cloak x-show="selectedTable === 0" class="w-full grid place-items-center">
                    @livewire('store-product-stock', ['storeid' => $store->id])
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>