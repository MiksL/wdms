@section('title', 'Products')
<x-app-layout>
    <div class="w-full grid place-items-center dark:bg-background-800">
        <table class="mt-4 w-10/12 text-center divide-y divide-gray-200 dark:divide-gray-600 shadow overflow-hidden sm:rounded-lg">
            <thead class="bg-gray-50 dark:bg-gray-700 text-xs uppercase h-6">
                <tr>
                    <th class="text-gray-300">@sortablelink('id', 'ID')</th>
                    <th class="text-gray-300">@sortablelink('name', 'Name')</th>
                    <th class="text-gray-300">@sortablelink('price', 'Price')</th>
                    <th class="text-gray-300">@sortablelink('size', 'Size')</th>
                    <th class="text-gray-300">@sortablelink('weight', 'Weight')</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                @foreach ($products as $product)
                    <tr>
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
            {!! $products->appends(\Request::except('page'))->render() !!}
        </div>
    </div>
</x-app-layout>
