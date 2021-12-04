<div class="w-full grid place-items-center dark:bg-background-800">
    @include('components.search', ['search' => 'store'])
    <table class="mt-4 w-10/12 text-center divide-y divide-gray-200 dark:divide-gray-600 shadow overflow-hidden sm:rounded-lg">
        <thead class="bg-gray-50 dark:bg-gray-700 text-xs uppercase h-6">
            <tr>
                <th class="text-gray-500 dark:text-gray-300">ID</th>
                <th class="text-gray-500 dark:text-gray-300">Name</th>
                <th class="text-gray-500 dark:text-gray-300">Location</th>
                <th class="text-gray-500 dark:text-gray-300">Supplying warehouse</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
            @foreach ($stores as $store)
                <tr class="text-gray-900 dark:text-gray-300">
                    <td class="py-1">{{ $store->id }}</td>
                    <td class="py-1">{{ $store->name }}</td>
                    <td class="py-1">{{ $store->location }}</td>
                    <td class="py-1">{{ $store->supplying_warehouse }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="w-7/12 my-3">
        {{ $stores->links() }}
    </div>
</div>
