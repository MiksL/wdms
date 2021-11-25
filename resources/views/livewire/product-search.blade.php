<div class="w-full grid place-items-center dark:bg-background-800">
    <div class="w-4/5 grid place-items-end">
        <input type="text" class="mt-3 w-1/5 rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-500 text-gray-500 dark:text-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Search by product name" wire:model="searchTerm" />
    </div>
    <table class="mt-4 w-10/12 text-center divide-y divide-gray-200 dark:divide-gray-600 shadow overflow-hidden sm:rounded-lg">
        <thead class="bg-gray-50 dark:bg-gray-700 text-xs uppercase h-6">
            <tr>
                <th class="text-gray-500 dark:text-gray-300">ID</th>
                <th class="text-gray-500 dark:text-gray-300">Name</th>
                <th class="text-gray-500 dark:text-gray-300">Price</th>
                <th class="text-gray-500 dark:text-gray-300">Size</th>
                <th class="text-gray-500 dark:text-gray-300">Weight</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
            @foreach ($products as $product)
                <tr class="text-gray-900 dark:text-gray-300">
                    <td class="py-1">{{ $product->id }}</td>
                    <td class="py-1">{{ $product->name }}</td>
                    <td class="py-1">${{ $product->price }}</td>
                    <td class="py-1">{{ $product->size }}</td>
                    <td class="py-1">{{ $product->weight }} kg</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="w-7/12 my-3">
        {{ $products->links() }}
    </div>
</div>
