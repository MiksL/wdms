@section('title', 'Dashboard')
<x-app-layout>
    <div class="flex flex-wrap overflow-hidden">
        <div id="MostProductsSold" class="w-full overflow-hidden my-1 px-1 lg:my-3 lg:px-3 lg:w-1/2">
            <h2 class="w-full text-center text-lg mb-1">Best-selling products</h2>
            <canvas id="bestSellingProducts"></canvas>
            <script>
            var ctx = document.getElementById('bestSellingProducts').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: 
                    [
                        '{{ isset($bestSellingProducts[0]) ? $bestSellingProducts[0]->name : '' }}',
                        '{{ isset($bestSellingProducts[1]) ? $bestSellingProducts[1]->name : '' }}',
                        '{{ isset($bestSellingProducts[2]) ? $bestSellingProducts[2]->name : '' }}',
                        '{{ isset($bestSellingProducts[3]) ? $bestSellingProducts[3]->name : '' }}',
                        '{{ isset($bestSellingProducts[4]) ? $bestSellingProducts[4]->name : '' }}'
                    ],
                    datasets: [{
                        label: '# of products sold',
                        data: 
                        [
                            {{ isset($bestSellingProducts[0]) ? $bestSellingProducts[0]->shipped_products : 0 }},
                            {{ isset($bestSellingProducts[1]) ? $bestSellingProducts[1]->shipped_products : 0 }},
                            {{ isset($bestSellingProducts[2]) ? $bestSellingProducts[2]->shipped_products : 0 }},
                            {{ isset($bestSellingProducts[3]) ? $bestSellingProducts[3]->shipped_products : 0 }},
                            {{ isset($bestSellingProducts[4]) ? $bestSellingProducts[4]->shipped_products : 0 }}
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },

                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            </script>
        </div>
      
        <div id="recentlyMovedProducts" class="w-full overflow-hidden my-1 px-1 lg:my-3 lg:px-3 lg:w-1/2">
            <h2 class="w-full text-center text-lg mb-1">Recently moved products</h2>
            <table class="w-full divide-y divide-gray-200 dark:divide-gray-600 shadow overflow-hidden rounded-lg">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr class="text-xs md:text-base font-semibold tracking-wide text-left uppercase border-b border-gray-600">
                        <th class="px-4 py-3">Warehouse</th>
                        <th class="px-4 py-3">Product</th>
                        <th class="px-4 py-3">Destination Store</th>
                        <th class="px-4 py-3">Amount</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                    @foreach($recentlyMovedProducts as $product)
                        <tr class="text-ms">
                            <td class="px-4 py-3 font-semibold">{{ $product->warehouse_name }}</td>
                            <td class="px-4 py-3 font-semibold">{{ $product->product_name }}</td>
                            <td class="px-4 py-3 font-semibold">{{ $product->destination_store }}</td>
                            <td class="px-4 py-3">{{ $product->amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      
        <div class="w-full overflow-hidden my-1 px-1 lg:my-3 lg:px-3 lg:w-1/2">

        </div>
      
        <div class="w-full overflow-hidden my-1 px-1 lg:my-3 lg:px-3 lg:w-1/2">

        </div>
      
        <div class="w-full overflow-hidden my-1 px-1 lg:my-3 lg:px-3 lg:w-1/2">

        </div>
      
        <div class="w-full overflow-hidden my-1 px-1 lg:my-3 lg:px-3 lg:w-1/2">

        </div>
</x-app-layout>
