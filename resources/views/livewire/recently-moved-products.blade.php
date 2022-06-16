<div class="w-4/5 grid place-items-center dark:bg-background-800" x-data="{ popup: false }">
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button 
        {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] 
        {
        -moz-appearance: textfield;
        }
    </style>
    <div x-cloak x-show="popup" class="absolute z-15 w-80 grid place-items-center inset-0 overflow-y-auto h-full w-full bg-gray-500 dark:bg-gray-700 bg-opacity-75 dark:bg-opacity-75">
        <div class="grid place-items-center w-1/5 bg-gray-100 dark:bg-gray-800 bg-opacity-90 rounded-xl py-5">
            <select type="text" class="destinationStoreInput mt-3 w-3/5 rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-500 text-gray-500 dark:text-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Destination Store">
                @foreach($suppliedStores as $suppliedStore)
                    <option value="{{ $suppliedStore->id }}">{{ $suppliedStore->name }}</option>
                @endforeach
            </select>
            <select type="text" class="shippedProductInput mt-3 w-3/5 rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-500 text-gray-500 dark:text-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Shipped Product">
                @foreach($stockedProducts as $stockedProduct)
                    <option value="{{ $stockedProduct->id }}">{{ $stockedProduct->name }}</option>
                @endforeach
            </select>
            <input type="number" min="1" max="" class="shippedProductAmountInput mt-3 w-3/5 rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-500 text-gray-500 dark:text-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Shipment Amount"/>
            <div>
                <button @click="popup = ! popup" class="my-2 mr-2 text-base text-gray-500 dark:text-gray-200 hover:text-red-500 dark:hover:text-red-300 font-semibold text-xl leading-tight">Cancel</button>
                <button @click="popup = ! popup; addShipment()" class="save-changes-button my-2 ml-2 text-base text-gray-500 dark:text-gray-200 hover:text-green-500 dark:hover:text-green-300 font-semibold text-xl leading-tight">Add</button>
            </div>
        </div>
    </div>
    @include('components.search', ['search' => 'store'])
    <button @click="popup = ! popup" class="my-3 text-base text-gray-500 dark:text-gray-200 hover:text-green-500 dark:hover:text-green-300 font-semibold text-xl leading-tight">
        Add a new Shipment
    </button>
    <table class="mt-4 w-10/12 text-center divide-y divide-gray-200 dark:divide-gray-600 shadow overflow-hidden rounded-lg">
        <thead class="bg-gray-50 dark:bg-gray-700 text-xs uppercase h-6 w-full">
            <tr class="text-gray-500 dark:text-gray-300">
                <th class="w-1/7">Shipment ID</th>
                <th class="w-1/7">Destination Store</th>
                <th class="w-1/7">Product ID</th>
                <th class="w-1/7">Product Name</th>
                <th class="w-1/7">Price</th>
                <th class="w-1/7">Weight</th>
                <th class="w-1/7">Amount</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
            @foreach ($recentlyMovedProducts as $product)
                <tr class="text-gray-900 dark:text-gray-300">
                    <td class="py-1">{{ $product->id }}</td>
                    <td>{{ $product->store_name }}</td>
                    <td>{{ $product->shipped_product_id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->weight }} kg</td>
                    <td>{{ $product->shipped_product_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
    
        // Function to save the new shipment
        function addShipment()
        {
            event.preventDefault();
            $.ajax({
            type: "POST",
            url: '/warehouses/add-shipment',
            data:
            {
                _token:'{{ csrf_token() }}',
                warehouse_id: {{ $warehouseid }},
                store_id: $('.destinationStoreInput').val(),
                shipped_product_id: $('.shippedProductInput').val(),
                shipped_product_count: $('.shippedProductAmountInput').val(),
            },
            success:function() 
            {
                location.reload();
            },
            error:function() 
            {
            }
        });
        }
    </script>
</div>
