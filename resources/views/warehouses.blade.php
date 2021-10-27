@section('title', 'Warehouses')
<x-app-layout>
    <div class="flex flex-wrap -mx-4 overflow-hidden sm:-mx-4 md:-mx-3 lg:-mx-3 xl:-mx-2">
        @foreach ($warehouses as $warehouse)
            <div class="my-4 px-4 w-full overflow-hidden sm:my-4 sm:px-4 md:my-3 md:px-3 md:w-1/2 lg:my-3 lg:px-3 lg:w-1/2 xl:my-2 xl:px-2 xl:w-1/2">

            </div>
        @endforeach
      </div>
</x-app-layout>