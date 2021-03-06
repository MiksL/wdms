<div class="w-full grid place-items-center dark:bg-background-800">
    @include('components.search', ['search' => 'store'])
    <table class="mt-4 w-10/12 text-center divide-y divide-gray-200 dark:divide-gray-600 shadow overflow-hidden rounded-lg">
        <thead class="bg-gray-50 dark:bg-gray-700 text-xs uppercase h-6">
            <tr class="text-gray-500 dark:text-gray-300">
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Supplying warehouse</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
            @foreach ($stores as $store)
                <tr class="text-gray-900 dark:text-gray-300">
                    <td class="py-1"><a href="{{ route('stores.show', $store->id) }}">{{ $store->id }}</a></td>
                    <td class="py-1"><a href="{{ route('stores.show', $store->id) }}">{{ $store->name }}</a></td>
                    <td class="py-1"><a href="{{ route('stores.show', $store->id) }}">{{ $store->location }}</a></td>
                    <td class="py-1"><a href="{{ route('stores.show', $store->id) }}">{{ $store->warehouse->name }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="w-7/12 my-3">
        {{ $stores->links() }}
    </div>
</div>
