<x-app-layout>

<div class="p-6">

    <h2 class="text-2xl font-bold mb-6">📊 Library Dashboard</h2>

    <div class="grid grid-cols-4 gap-4">

        <div class="bg-blue-500 text-white p-4 rounded">
            <h3>Total Books</h3>
            <p class="text-2xl font-bold">
                {{ \App\Models\Book::count() }}
            </p>
        </div>

        <div class="bg-green-500 text-white p-4 rounded">
            <h3>Available Books</h3>
            <p class="text-2xl font-bold">
                {{ \App\Models\Book::available()->count() }}
            </p>
        </div>

        <div class="bg-red-500 text-white p-4 rounded">
            <h3>Out of Stock</h3>
            <p class="text-2xl font-bold">
                {{ \App\Models\Book::where('available_copies',0)->count() }}
            </p>
        </div>

        <div class="bg-purple-500 text-white p-4 rounded">
            <h3>Categories</h3>
            <p class="text-2xl font-bold">
                {{ \App\Models\Category::count() }}
            </p>
        </div>

    </div>

</div>

</x-app-layout>