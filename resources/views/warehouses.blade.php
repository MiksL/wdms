@section('title', 'Warehouses')
<x-app-layout>
    <div class="w-full grid place-items-center">
        <div class="w-4/5 grid grid-cols-2 place-items-center gap-4 my-4 mx-4">
            @foreach ($warehouses as $warehouse)
                <a href="{{ route('warehouses.show', $warehouse->id) }}" class="w-full border-2 border-gray-300 dark:border-gray-500 rounded-xl">
                    <div class="mx-3 my-3">
                        <div>{{ $warehouse->name }}</div>
                        <div>{{ $warehouse->location }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>