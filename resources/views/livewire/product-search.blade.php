<div class="w-full grid place-items-center dark:bg-background-800" x-data="{ popup: false }">
    <div x-cloak x-show="popup" class="absolute z-15 w-80 grid place-items-center inset-0 overflow-y-auto h-full w-full bg-gray-500 dark:bg-gray-700 bg-opacity-75 dark:bg-opacity-75">
        <div class="grid place-items-center w-1/5 bg-gray-100 dark:bg-gray-800 bg-opacity-90 rounded-xl py-5">
            <input type="text" class="productNameInput mt-3 w-3/5 rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-500 text-gray-500 dark:text-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Product Name"/>
            <input type="text" class="productPriceInput mt-3 w-3/5 rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-500 text-gray-500 dark:text-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Product Price"/>
            <input type="text" class="productSizeInput mt-3 w-3/5 rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-500 text-gray-500 dark:text-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Product Size"/>
            <input type="text" class="productWeightInput my-3 w-3/5 rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-500 text-gray-500 dark:text-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Product Weight"/>
            <div>
                <button @click="popup = ! popup" class="cancel-edit-button my-2 mr-2 text-base text-gray-500 dark:text-gray-200 hover:text-red-500 dark:hover:text-red-300 font-semibold text-xl leading-tight">Cancel</button>
                <button @click="popup = ! popup; editProduct()" class="save-changes-button my-2 ml-2 text-base text-gray-500 dark:text-gray-200 hover:text-green-500 dark:hover:text-green-300 font-semibold text-xl leading-tight">Save</button>
            </div>
        </div>
    </div>
    @include('components.search', ['search' => 'product'])
    <table class="mt-4 w-10/12 text-center divide-y divide-gray-200 dark:divide-gray-600 shadow overflow-hidden sm:rounded-lg">
        <thead class="bg-gray-50 dark:bg-gray-700 text-xs uppercase h-6">
            <tr>
                <th class="text-gray-500 dark:text-gray-300">ID</th>
                <th class="text-gray-500 dark:text-gray-300">Name</th>
                <th class="text-gray-500 dark:text-gray-300">Price</th>
                <th class="text-gray-500 dark:text-gray-300">Size</th>
                <th class="text-gray-500 dark:text-gray-300">Weight</th>
                <th class="text-gray-500 dark:text-gray-300">Action</th>
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
                    <td class="py-1">
                        <button class="edit-product-button" @click="popup = ! popup" value="{{ $product->id }}">Edit</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="w-7/12 my-3">
        {{ $products->links() }}
    </div>
    <script>
        // #region Variables
        var selectedRow;
        var id;
        var productPrice
        var productWeight
        // #endregion
    
        // Function to edit the product
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
