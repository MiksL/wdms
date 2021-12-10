<div class="w-4/5 grid place-items-center dark:bg-background-800">
    @include('components.search', ['search' => 'product'])
    <table class="mt-4 w-10/12 text-center divide-y divide-gray-200 dark:divide-gray-600 shadow overflow-hidden sm:rounded-lg">
        <thead class="bg-gray-50 dark:bg-gray-700 text-xs uppercase h-6 w-full">
            <tr>
                <th class="text-gray-500 dark:text-gray-300 w-1/7">Shipment ID</th>
                <th class="text-gray-500 dark:text-gray-300 w-1/7">Destination Store</th>
                <th class="text-gray-500 dark:text-gray-300 w-1/7">Product ID</th>
                <th class="text-gray-500 dark:text-gray-300 w-1/7">Product Name</th>
                <th class="text-gray-500 dark:text-gray-300 w-1/7">Price</th>
                <th class="text-gray-500 dark:text-gray-300 w-1/7">Weight</th>
                <th class="text-gray-500 dark:text-gray-300 w-1/7">Amount</th>
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
