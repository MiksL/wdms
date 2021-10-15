<x-app-layout>
    <div class="flex flex-wrap overflow-hidden">
        <div id="MostProductsSold" class="w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-3 lg:px-3 lg:w-1/2 xl:my-3 xl:px-3 xl:w-1/2">
            <canvas id="bestSellingProducts"></canvas>
            <script>
            var ctx = document.getElementById('bestSellingProducts').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Product1', 'Product2', 'Product3', 'Product4', 'Product5', 'Product6'],
                    datasets: [{
                        label: '# of products sold',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Best Selling Products',
                            font: {
                                size: 20
                            }
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
      
        <div id="RecentlyMovedProducts" class="w-full overflow-y-auto sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-3 lg:px-3 lg:w-1/2 xl:my-3 xl:px-3 xl:w-1/2">
            <h2 class="w-full text-center">Recently moved products</h2>
            <table class="w-full">
                <thead>
                  <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                    <th class="px-4 py-3">Warehouse</th>
                    <th class="px-4 py-3">Product</th>
                    <th class="px-4 py-3">Destination Store</th>
                    <th class="px-4 py-3">Amount</th>
                  </tr>
                </thead>
                <tbody class="bg-white">
                  <tr class="text-gray-700">
                    <td class="px-4 py-3 border text-ms font-semibold">
                        Great People's Warehouse
                    </td>
                    <td class="px-4 py-3 text-ms font-semibold border">Great People's Product</td>
                    <td class="px-4 py-3 text-ms font-semibold border">Great People's Store</td>
                    <td class="px-4 py-3 text-sm border">1</td>
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
