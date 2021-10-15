<x-app-layout>
    <div class="w-full content-center">
        <table class="table-fixed w-full text-center">
            <thead>
                <tr>
                <th class="w-1/5">
                    @sortablelink('id', 'ID')
                </th>
                <th class="w-1/5">@sortablelink('name', 'Name')</th>
                <th class="w-1/">@sortablelink('price', 'Price')</th>
                <th class="w-1/5">@sortablelink('size', 'Size')</th>
                <th class="w-1/5">@sortablelink('weight', 'Weight')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>$ {{ $product->price }}</td>
                        <td>{{ $product->size }}</td>
                        <td>{{ $product->weight }} kg</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $products->appends(\Request::except('page'))->render() !!}
    </div>
</x-app-layout>
