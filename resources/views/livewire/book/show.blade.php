<div class="min-h-screen bg-gray-100 p-6 flex items-center justify-center">

    <div class="w-full max-w-3xl bg-white rounded-2xl shadow-xl p-8">

        <!-- HEADER -->
        <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            📖 Book Details
        </h2>

        <!-- CARD CONTENT -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">

            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-500">Title</p>
                <p class="font-semibold text-lg">{{ $book->title }}</p>
            </div>

            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-500">Author</p>
                <p class="font-semibold text-lg">{{ $book->author }}</p>
            </div>

            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-500">ISBN</p>
                <p class="font-semibold">{{ $book->isbn }}</p>
            </div>

            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-500">Category</p>
                <p class="font-semibold">{{ $book->category->name }}</p>
            </div>

            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-500">Price</p>
                <p class="font-semibold text-green-600">${{ $book->price }}</p>
            </div>

            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-500">Published Date</p>
                <p class="font-semibold">{{ $book->published_date }}</p>
            </div>

            <div class="p-4 bg-gray-50 rounded-lg md:col-span-2">
                <p class="text-sm text-gray-500">Created By</p>
                <p class="font-semibold">{{ $book->creator->name ?? '-' }}</p>
            </div>

        </div>

        <!-- STATUS -->
        <div class="mt-6">
            @if($book->available_copies > 0)
                <span class="inline-block px-4 py-2 bg-green-100 text-green-700 font-semibold rounded-full">
                    ✅ Available
                </span>
            @else
                <span class="inline-block px-4 py-2 bg-red-100 text-red-700 font-semibold rounded-full">
                    ❌ Out of Stock
                </span>
            @endif
        </div>

        <!-- BACK BUTTON -->
        <div class="mt-6">
            <a href="{{ route('books.index') }}"
               class="inline-flex items-center gap-2 bg-gray-700 hover:bg-gray-800 text-white px-5 py-2 rounded-lg transition">
                ⬅ Back to Books
            </a>
        </div>

    </div>

</div>