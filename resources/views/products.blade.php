<x-app-layout>
    <div class="w-full">
        <table class="table-fixed w-full text-center">
            <thead>
                <tr>
                <th class="w-1/5 ...">ID</th>
                <th class="w-1/5 ...">Name</th>
                <th class="w-1/5 ...">Price</th>
                <th class="w-1/5 ...">Size</th>
                <th class="w-1/5 ...">Weight</th>
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
    </div>
</x-app-layout>
