<div class="p-6 bg-gray-100 min-h-screen">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold text-gray-800">
            📚 Books Management
        </h1>

        <a href="{{ route('books.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow">

            ➕ Add New Book
        </a>

    </div>

    <!-- FILTER BAR -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

        <input type="text"
               wire:model.live="search"
               placeholder="🔍 Search Title"
               class="p-2 border rounded-lg shadow-sm">

        <input type="text"
               wire:model.live="author"
               placeholder="✍️ Author"
               class="p-2 border rounded-lg shadow-sm">

        <select wire:model.live="category"
                class="p-2 border rounded-lg shadow-sm">

            <option value="">📂 All Categories</option>

            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach

        </select>

        <select wire:model.live="availability"
                class="p-2 border rounded-lg shadow-sm">

            <option value="">📦 All</option>
            <option value="available">Available</option>
            <option value="out">Out of Stock</option>

        </select>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow overflow-x-auto">

        <table class="w-full text-sm text-left">

            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Title</th>
                    <th class="p-3">Author</th>
                    <th class="p-3">Category</th>
                    <th class="p-3">Price</th>
                    <th class="p-3">Stock</th>
                    <th class="p-3">Created By</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach($books as $book)
                    <tr class="border-b hover:bg-gray-50">

                        <td class="p-3">{{ $book->id }}</td>

                        <td class="p-3 font-semibold text-gray-800">
                            {{ $book->title }}
                        </td>

                        <td class="p-3">{{ $book->author }}</td>

                        <td class="p-3">
                            <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded">
                                {{ $book->category->name ?? '-' }}
                            </span>
                        </td>

                        <td class="p-3 font-bold text-green-600">
                            ${{ $book->price }}
                        </td>

                        <!-- STOCK BADGE -->
                        <td class="p-3">
                            @if($book->available_copies > 0)
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded">
                                    Available
                                </span>
                            @else
                                <span class="bg-red-100 text-red-700 px-2 py-1 rounded">
                                    Out
                                </span>
                            @endif
                        </td>

                        <td class="p-3 text-gray-600">
                            {{ $book->creator->name ?? 'System' }}
                        </td>

                        <!-- ACTIONS -->
                        <td class="p-3 flex gap-2">

                            <a href="{{ route('books.show', $book->id) }}"
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                View
                            </a>

                            <a href="{{ route('books.edit', $book->id) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                Edit
                            </a>

                            <button wire:click="delete({{ $book->id }})"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                Delete
                            </button>

                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>

    <!-- PAGINATION -->
    <div class="mt-4">
        {{ $books->links() }}
    </div>

</div>