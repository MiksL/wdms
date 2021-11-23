<x-app-layout>
    <div class="w-full grid place-items-center">
        @foreach($warehouse as $warehouse)
            @section('title', "$warehouse->name")
            <div class="w-4/5 grid place-items-left my-5 text-gray-500 dark:text-gray-300">
                <div class="my-2 text-lg">{{ $warehouse->location }}</div>
            </div>

            <div class="w-full grid place-items-center text-gray-500 dark:text-gray-300">
                <div>Currently stocked products</div>
                <div class="w-4/5 grid place-items-center dark:bg-background-800">
                    <table class="mt-4 w-10/12 text-center divide-y divide-gray-200 dark:divide-gray-600 shadow overflow-hidden sm:rounded-lg">
                        <thead class="bg-gray-50 dark:bg-gray-700 text-xs uppercase h-6 w-full">
                            <tr>
                                <th class="text-gray-500 dark:text-gray-300 w-1/6">@sortablelink('id', 'Product ID')</th>
                                <th class="text-gray-500 dark:text-gray-300 w-1/6">@sortablelink('name', 'Name')</th>
                                <th class="text-gray-500 dark:text-gray-300 w-1/6">@sortablelink('price', 'Price')</th>
                                <th class="text-gray-500 dark:text-gray-300 w-1/6">@sortablelink('size', 'Size')</th>
                                <th class="text-gray-500 dark:text-gray-300 w-1/6">@sortablelink('weight', 'Weight')</th>
                                <th class="text-gray-500 dark:text-gray-300 w-1/6">@sortablelink('inStock', 'In Stock')</th>
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

                
                <div class="mt-5">
                    Recently moved products
                </div>
                <div class="w-4/5 grid place-items-center dark:bg-background-800">
                    <table class="mt-4 w-10/12 text-center divide-y divide-gray-200 dark:divide-gray-600 shadow overflow-hidden sm:rounded-lg">
                        <thead class="bg-gray-50 dark:bg-gray-700 text-xs uppercase h-6 w-full">
                            <tr>
                                <th class="text-gray-500 dark:text-gray-300 w-1/7">@sortablelink('id', 'Shipment ID')</th>
                                <th class="text-gray-500 dark:text-gray-300 w-1/7">@sortablelink('destinationStoreName', 'Destination Store')</th>
                                <th class="text-gray-500 dark:text-gray-300 w-1/7">@sortablelink('productID', 'Product ID')</th>
                                <th class="text-gray-500 dark:text-gray-300 w-1/7">@sortablelink('name', 'Product Name')</th>
                                <th class="text-gray-500 dark:text-gray-300 w-1/7">@sortablelink('price', 'Price')</th>
                                <th class="text-gray-500 dark:text-gray-300 w-1/7">@sortablelink('weight', 'Weight')</th>
                                <th class="text-gray-500 dark:text-gray-300 w-1/7">@sortablelink('shippedProductCount', 'Amount')</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                            @foreach ($recentlyMovedProducts as $product)
                                <tr class="text-gray-900 dark:text-gray-300">
                                    <td class="py-1">{{ $product->id }}</td>
                                    <td class="py-1">{{ $product->store_name }}</td>
                                    <td class="py-1">{{ $product->shipped_product_id }}</td>
                                    <td class="py-1">{{ $product->name }}</td>
                                    <td class="py-1">{{ $product->price }}</td>
                                    <td class="py-1">{{ $product->weight }} kg</td>
                                    <td class="py-1">{{ $product->shipped_product_count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>