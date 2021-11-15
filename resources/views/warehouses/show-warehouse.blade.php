@section('title', 'Warehouse')
<x-app-layout>
    @foreach($warehouse as $warehouse)
        <div>{{ $warehouse->id }}</div>
    @endforeach
</x-app-layout>