<div class="w-4/5 grid place-items-center dark:bg-background-800">
    @include('components.search', ['search' => 'store'])
    <table class="mt-4 w-10/12 text-center divide-y divide-gray-200 dark:divide-gray-600 shadow overflow-hidden sm:rounded-lg">
        <thead class="bg-gray-50 dark:bg-gray-700 text-xs uppercase h-6 w-full">
            <tr>
                <th class="text-gray-500 dark:text-gray-300 w-1/3">Store ID</th>
                <th class="text-gray-500 dark:text-gray-300 w-1/3">Name</th>
                <th class="text-gray-500 dark:text-gray-300 w-1/3">Location</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
            @foreach ($stores as $store)
                <tr class="text-gray-900 dark:text-gray-300">
                    <td class="py-1">{{ $store->id }}</td>
                    <td class="py-1">{{ $store->name }}</td>
                    <td class="py-1">{{ $store->location }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>