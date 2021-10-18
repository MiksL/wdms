<x-app-layout>
    <div class="w-full grid place-items-center">
        <table class="mt-4 w-10/12 text-center divide-y divide-gray-200 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <thead class="bg-gray-50">
                <tr>
                    <th class="text-gray-500">@sortablelink('id', 'ID')</th>
                    <th class="text-gray-500">@sortablelink('name', 'Name')</th>
                    <th class="text-gray-500">@sortablelink('price', 'Price')</th>
                    <th class="text-gray-500">@sortablelink('size', 'Size')</th>
                    <th class="text-gray-500">@sortablelink('weight', 'Weight')</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($products as $product)
                    <tr>
                        <td class="py-1">{{ $product->id }}</td>
                        <td class="py-1">{{ $product->name }}</td>
                        <td class="py-1">$ {{ $product->price }}</td>
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
