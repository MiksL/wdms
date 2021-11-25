<div class="w-full grid place-items-center">
    <div class="w-4/5 grid place-items-end">
        <input type="text" class="mt-3 w-1/5 rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-500 text-gray-500 dark:text-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Search by warehouse name" wire:model="searchTerm" />
    </div>
    <div class="w-4/6 grid grid-cols-2 place-items-center gap-5 my-4 mx-4 text-gray-500 dark:text-gray-200">
        @foreach ($warehouses as $warehouse)
            <a href="{{ route('warehouses.show', $warehouse->id) }}" class="w-full border-2 border-gray-300 dark:border-gray-500 rounded-xl 
                hover:text-gray-900 dark:hover:text-gray-400 hover:border-gray-900 dark:hover:border-gray-400 
                transform
                hover:scale-105
                transition duration-100"
            >
                <div class="mx-3 my-3">
                    <div class="font-bold">{{ $warehouse->name }}</div>
                    <div class="my-2">{{ $warehouse->location }}</div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="w-7/12 my-3">
        {{ $warehouses->links() }}
    </div>
</div>
