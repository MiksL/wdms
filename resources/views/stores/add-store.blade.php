@section('title', 'Add a new store')
<x-app-layout>
    <div class="w-full grid place-items-center">
        <form action="POST" class="w-3/5 grid place-items-center my-5">
            <div class="border rounded-lg w-1/3 grid place-items-center">
                <input required type="text" name="name" placeholder="Store name" class="searchBox my-3 w-4/5 rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-500 text-gray-500 dark:text-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <input required type="text" name="location" placeholder="Store location"  class="searchBox my-2 w-4/5 rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-500 text-gray-500 dark:text-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <input required type="text" name="supplyingWarehouse" placeholder="Supplying warehouse"  class="searchBox my-2 w-4/5 rounded-xl bg-gray-50 dark:bg-gray-700 border-gray-500 text-gray-500 dark:text-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <button type="submit" class="my-3 hover:text-green-300">Add Store</button>
            </div>
        </form>
    </div>
</x-app-layout>