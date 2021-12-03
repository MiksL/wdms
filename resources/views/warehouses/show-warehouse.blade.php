<x-app-layout>
    <div class="w-full grid place-items-center" x-data="{ selectedTable: 0 }">
        <div class="absolute grid align-middle z-10 right-0 mt-5 text-gray-500 dark:text-gray-200 bg-gray-200 dark:bg-gray-900 rounded-l-xl">
            <button class="m-4 hover:text-gray-900 dark:hover:text-gray-400" @click="selectedTable = 0">
            Currently Stocked
            </button>
            <button class="m-4 hover:text-gray-900 dark:hover:text-gray-400" @click="selectedTable = 1">
                Recently Moved
            </button>
        </div>
        @foreach($warehouse as $warehouse)
            @section('title', "$warehouse->name")
            <div class="w-4/5 grid place-items-left my-5 text-gray-500 dark:text-gray-300">
                <div class="my-2 text-lg">{{ $warehouse->location }}</div>
            </div>
            @include('components.search')

            <div class="w-full grid place-items-center text-gray-500 dark:text-gray-300">
                <div x-show="selectedTable === 0">Currently stocked products</div>
                <div class="w-4/5 grid place-items-center dark:bg-background-800" x-show="selectedTable === 0">
                    <table class="mt-4 w-10/12 text-center divide-y divide-gray-200 dark:divide-gray-600 shadow overflow-hidden sm:rounded-lg">
                        <thead class="bg-gray-50 dark:bg-gray-700 text-xs uppercase h-6 w-full">
                            <tr>
                                <th class="text-gray-500 dark:text-gray-300 w-1/6">Product ID</th>
                                <th class="text-gray-500 dark:text-gray-300 w-1/6">Name</th>
                                <th class="text-gray-500 dark:text-gray-300 w-1/6">Price</th>
                                <th class="text-gray-500 dark:text-gray-300 w-1/6">Size</th>
                                <th class="text-gray-500 dark:text-gray-300 w-1/6">Weight</th>
                                <th class="text-gray-500 dark:text-gray-300 w-1/6">In Stock</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                            @foreach ($warehouseStock as $product)
                                <tr class="text-gray-900 dark:text-gray-300">
                                    <td class="py-1">{{ $product->product_id }}</td>
                                    <td class="py-1">{{ $product->name }}</td>
                                    <td class="py-1">{{ $product->price }}</td>
                                    <td class="py-1">{{ $product->size }} cm</td>
                                    <td class="py-1">{{ $product->weight }} kg</td>
                                    <td class="py-1">{{ $product->product_count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div x-cloak x-show="selectedTable === 1">
                    Recently moved products
                </div>
                <div x-cloak x-show="selectedTable === 1" class="w-full grid place-items-center">
                    @livewire('recently-moved-products')
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>