<div class="w-full grid place-items-center dark:bg-background-800" x-data="{ popup: false }">
    <div x-cloak x-show="popup" class="absolute z-15 w-80 grid place-items-center inset-0 overflow-y-auto h-full w-full bg-gray-500 dark:bg-gray-700 bg-opacity-75 dark:bg-opacity-75">
        <div class="grid place-items-center w-1/5 space-y-3 text-gray-500 dark:text-gray-300 bg-gray-100 dark:bg-gray-800 bg-opacity-90 rounded-xl py-5">
            <input type="text" class="productNameInput w-3/5 rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Product Name"/>
            <input type="text" class="productPriceInput w-3/5 rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Product Price"/>
            <input type="text" class="productSizeInput w-3/5 rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Product Size"/>
            <input type="text" class="productWeightInput mb-3 w-3/5 rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Product Weight"/>
            <div class="text-xl space-x-4 space-y-2 text-gray-500 dark:text-gray-200 font-semibold">
                <button @click="popup = ! popup" class="cancel-edit-button hover:text-red-500 dark:hover:text-red-300 leading-tight">Cancel</button>
                <button @click="popup = ! popup; editProduct()" class="save-changes-button hover:text-green-500 dark:hover:text-green-300 leading-tight">Save</button>
            </div>
        </div>
    </div>
    @include('components.search', ['search' => 'product'])
    <table class="mt-4 w-10/12 text-center divide-y divide-gray-200 dark:divide-gray-600 shadow overflow-hidden rounded-lg">
        <thead class="bg-gray-50 dark:bg-gray-700 text-xs uppercase h-6">
            <tr class="text-gray-500 dark:text-gray-300">
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Size</th>
                <th>Weight</th>
                @if(Auth::user()->is_product_manager == 1)
                    <th>Action</th>
                @endif
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
            @foreach ($products as $product)
                <tr class="text-gray-900 dark:text-gray-300">
                    <td class="py-1">{{ $product->id }}</td>
                    <td class="name py-1">{{ $product->name }}</td>
                    <td class="price py-1">${{ $product->price }}</td>
                    <td class="size py-1">{{ $product->size }}</td>
                    <td class="weight py-1">{{ $product->weight }} kg</td>
                    @if(Auth::user()->is_product_manager == 1)
                        <td class="py-1">
                            <button class="edit-product-button text-base text-gray-500 dark:text-gray-300 hover:text-yellow-500 dark:hover:text-yellow-300" @click="popup = ! popup" value="{{ $product->id }}">Edit</button>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="w-7/12 my-3">
        {{ $products->links() }}
    </div>
    <script>
        // Initialize variables
        var selectedRow;
        var id;
        var productPrice;
        var productWeight;
    
        // Function to edit the product and set the input field values
        $(document).on('click', '.edit-product-button', function() { 
            id = $(this).val();
            selectedRow = $(this).closest('tr');

            $('.cancel-edit-button').val(id);
            $('.productNameInput').val(selectedRow.find('.name').text());
            productPrice = selectedRow.find('.price').text().slice(1);
            $('.productPriceInput').val(productPrice);
            productWeight = selectedRow.find('.weight').text().slice(0, -3);
            $('.productWeightInput').val(productWeight);
            $('.productSizeInput').val(selectedRow.find('.size').text());
    
            selectedRow.addClass('bg-yellow-400 dark:bg-opacity-80');
        });
    
        // Function to cancel the editing of the product
        $(document).on('click', '.cancel-edit-button', function() { 
            selectedRow.removeClass('bg-yellow-400 bg-opacity-70');
        });
    
        // Function to save changes made to the product
        function editProduct()
        {
            selectedRow.removeClass('bg-yellow-400 bg-opacity-70');

            $.ajax({
                type: "PUT",
                url: '/products/'+id,
                data:
                {
                    _token:'{{ csrf_token() }}',
                    id: id,
                    name: $('.productNameInput').val(),
                    price: $('.productPriceInput').val(),
                    size: $('.productSizeInput').val(),
                    weight: $('.productWeightInput').val()
                },
                success:function() 
                {
                    selectedRow.find('.name').text($('.productNameInput').val());
                    selectedRow.find('.price').text('$'+ $('.productPriceInput').val());
                    selectedRow.find('.size').text($('.productSizeInput').val());
                    selectedRow.find('.weight').text($('.productWeightInput').val()+' kg');
                },
                error:function() 
                {
                }
            });
        }
    </script>
</div>
