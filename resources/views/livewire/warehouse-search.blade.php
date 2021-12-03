<div class="w-full grid place-items-center">
    @include('components.search')
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
