<x-app-layout>
    <div class="w-full grid place-items-center" x-data="{ selectedTable: 0 }">
        <div class="absolute grid align-middle z-10 right-0 mt-5 text-gray-500 dark:text-gray-200 bg-gray-200 dark:bg-gray-900 rounded-l-xl">
            <button class="m-4 hover:text-gray-900 dark:hover:text-gray-400" @click="selectedTable = 0">
            Currently Stocked
            </button>
            <button class="m-4 hover:text-gray-900 dark:hover:text-gray-400" @click="selectedTable = 1">
                Recently Moved
            </button>
            <button class="m-4 hover:text-gray-900 dark:hover:text-gray-400" @click="selectedTable = 2">
                Supplied Stores
            </button>
        </div>
        @foreach($warehouse as $warehouse)
            @section('title', "$warehouse->name")
            <div class="w-4/5 grid place-items-left my-5 text-gray-500 dark:text-gray-300">
                <div class="my-2 text-lg">{{ $warehouse->location }}</div>
            </div>

            <div class="w-full grid place-items-center text-gray-500 dark:text-gray-300">
                <div x-show="selectedTable === 0">Currently stocked products</div>
                <div x-cloak x-show="selectedTable === 0" class="w-full grid place-items-center">
                    @livewire('warehouse-product-stock', ['warehouseid' => $warehouse->id])
                </div>
                
                <div x-cloak x-show="selectedTable === 1">
                    Recently moved products
                </div>
                <div x-cloak x-show="selectedTable === 1" class="w-full grid place-items-center">
                    @livewire('recently-moved-products', ['warehouseid' => $warehouse->id])
                </div>

                <div x-cloak x-show="selectedTable === 2">
                    Supplied stores by the warehouse:
                </div>
                <div x-cloak x-show="selectedTable === 2" class="w-full grid place-items-center">
                    @livewire('supplied-stores', ['warehouseid' => $warehouse->id])
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>