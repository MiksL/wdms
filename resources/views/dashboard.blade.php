@section('title', 'Dashboard')
<x-app-layout>
    <div class="flex flex-wrap overflow-hidden">
        <div id="MostProductsSold" class="w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-3 lg:px-3 lg:w-1/2 xl:my-3 xl:px-3 xl:w-1/2">
            <h2 class="w-full text-center text-lg text-gray-300 mb-1">Best-selling products</h2>
            <canvas id="bestSellingProducts"></canvas>
            <script>
            var ctx = document.getElementById('bestSellingProducts').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Product1', 'Product2', 'Product3', 'Product4', 'Product5'],
                    datasets: [{
                        label: '# of products sold',
                        data: [123, 19, 3, 5, 2, 3],
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
      
        <div id="recentlyMovedProducts" class="w-full overflow-y-auto sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-3 lg:px-3 lg:w-1/2 xl:my-3 xl:px-3 xl:w-1/2">
            <h2 class="w-full text-center text-lg text-gray-300 mb-1">Recently moved products</h2>
            <table class="w-full divide-y divide-gray-200 dark:divide-gray-600 shadow overflow-hidden sm:rounded-lg">
                <thead class="bg-gray-50 dark:bg-gray-700">
                  <tr class="text-md font-semibold tracking-wide text-left text-gray-900 uppercase border-b border-gray-600">
                    <th class="px-4 py-3 text-gray-300">Warehouse</th>
                    <th class="px-4 py-3 text-gray-300">Product</th>
                    <th class="px-4 py-3 text-gray-300">Destination Store</th>
                    <th class="px-4 py-3 text-gray-300">Amount</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                  <tr>
                    <td class="px-4 py-3 text-ms font-semibold">
                        Great People's Warehouse
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold">Great People's Product</td>
                    <td class="px-4 py-3 text-ms font-semibold">Great People's Store</td>
                    <td class="px-4 py-3 text-ms">1</td>
                  </tr>
                  <tr>
                    <td class="px-4 py-3 text-ms font-semibold">
                        Great People's Warehouse 2
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold">Great People's Product 2</td>
                    <td class="px-4 py-3 text-ms font-semibold">Great People's Store 2</td>
                    <td class="px-4 py-3 text-ms">3243333</td>
                  </tr>
                </tbody>
            </table>
        </div>
      
        <div class="w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-3 lg:px-3 lg:w-1/2 xl:my-3 xl:px-3 xl:w-1/2">

        </div>
      
        <div class="w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-3 lg:px-3 lg:w-1/2 xl:my-3 xl:px-3 xl:w-1/2">

        </div>
      
        <div class="w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-3 lg:px-3 lg:w-1/2 xl:my-3 xl:px-3 xl:w-1/2">

        </div>
      
        <div class="w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-3 lg:px-3 lg:w-1/2 xl:my-3 xl:px-3 xl:w-1/2">

        </div>
</x-app-layout>
