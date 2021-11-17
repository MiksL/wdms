<x-app-layout>
    <div class="w-full grid place-items-center">
        @foreach($warehouse as $warehouse)
            @section('title', "$warehouse->name")
            <div class="w-4/5 grid place-items-left my-5">
                <div class="my-2 text-lg">{{ $warehouse->location }}</div>
            </div>

            <div>
                <div>Currently stocked products:</div>
                <div class="w-full grid place-items-center dark:bg-background-800">
                    <table class="mt-4 w-10/12 text-center divide-y divide-gray-200 dark:divide-gray-600 shadow overflow-hidden sm:rounded-lg">
                        <thead class="bg-gray-50 dark:bg-gray-700 text-xs uppercase h-6">
                            <tr>
                                <th class="text-gray-500 dark:text-gray-300">@sortablelink('id', 'ID')</th>
                                <th class="text-gray-500 dark:text-gray-300">@sortablelink('name', 'Name')</th>
                                <th class="text-gray-500 dark:text-gray-300">@sortablelink('price', 'Price')</th>
                                <th class="text-gray-500 dark:text-gray-300">@sortablelink('size', 'Size')</th>
                                <th class="text-gray-500 dark:text-gray-300">@sortablelink('weight', 'Weight')</th>
                                <th class="text-gray-500 dark:text-gray-300">@sortablelink('instock', 'In Stock')</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                                <tr class="text-gray-900 dark:text-gray-300">
                                    <td class="py-1">1</td>
                                    <td class="py-1">2</td>
                                    <td class="py-1">3</td>
                                    <td class="py-1">4</td>
                                    <td class="py-1">5</td>
                                    <td class="py-1">6</td>
                                </tr>
                        </tbody>
                    </table>
                    <div class="w-7/12 my-3">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>