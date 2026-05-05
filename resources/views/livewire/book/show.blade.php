<div class="min-h-screen bg-gray-100 p-6 flex items-center justify-center">

    <div class="w-full max-w-5xl bg-white rounded-2xl shadow-xl overflow-hidden">
        
        @if($book->trashed())
            <div class="bg-red-500 text-white p-3 text-center font-bold">
                ⚠️ This book has been deleted.
            </div>
        @endif

        <div class="p-8">
            <!-- HEADER -->
            <div class="flex justify-between items-start mb-8 border-b pb-6">
                <div>
                    <h2 class="text-4xl font-extrabold text-gray-800">{{ $book->title }}</h2>
                    <p class="text-xl text-gray-500 mt-2">by <span class="font-semibold">{{ $book->author }}</span></p>
                </div>
                <div>
                    @if($book->available_copies > 0)
                        <span class="inline-flex items-center px-4 py-2 bg-green-100 text-green-700 font-bold rounded-full text-lg">
                            ✅ Available ({{ $book->available_copies }} left)
                        </span>
                    @else
                        <span class="inline-flex items-center px-4 py-2 bg-red-100 text-red-700 font-bold rounded-full text-lg">
                            ❌ Out of Stock
                        </span>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- LEFT COLUMN: Image & Audit -->
                <div class="md:col-span-1 space-y-6">
                    <!-- Placeholder Image -->
                    <div class="bg-gray-200 aspect-[2/3] rounded-xl flex items-center justify-center text-gray-400">
                        <span class="text-6xl">📖</span>
                    </div>

                    <!-- Audit Trail -->
                    <div class="bg-blue-50 p-4 rounded-xl border border-blue-100">
                        <h3 class="font-bold text-blue-800 mb-3 text-sm uppercase tracking-wider">Audit Trail</h3>
                        <div class="space-y-3 text-sm">
                            <div>
                                <p class="text-gray-500">Created by</p>
                                <p class="font-medium text-gray-800">{{ $book->creator->name ?? 'System' }} <br><span class="text-xs text-gray-400">{{ $book->created_at->format('Y-m-d H:i') }}</span></p>
                            </div>
                            @if($book->updater)
                            <div>
                                <p class="text-gray-500">Updated by</p>
                                <p class="font-medium text-gray-800">{{ $book->updater->name }} <br><span class="text-xs text-gray-400">{{ $book->updated_at->format('Y-m-d H:i') }}</span></p>
                            </div>
                            @endif
                            @if($book->trashed())
                            <div>
                                <p class="text-red-400">Deleted by</p>
                                <p class="font-medium text-red-600">{{ $book->deleter->name ?? 'System' }} <br><span class="text-xs text-red-400">{{ $book->deleted_at->format('Y-m-d H:i') }}</span></p>
                            </div>
                            @endif
                            <div class="pt-2 border-t border-blue-200">
                                <p class="text-xs text-blue-600">Last modified {{ $book->updated_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN: Details -->
                <div class="md:col-span-2 space-y-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Description</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $book->description ?: 'No description available for this book.' }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                            <p class="text-sm text-gray-500">Category</p>
                            <p class="font-semibold text-purple-700">{{ $book->category->name }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                            <p class="text-sm text-gray-500">ISBN</p>
                            <p class="font-mono text-gray-800">{{ $book->isbn }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                            <p class="text-sm text-gray-500">Price</p>
                            <p class="font-bold text-green-600 text-lg">${{ number_format($book->price, 2) }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                            <p class="text-sm text-gray-500">Published</p>
                            <p class="font-semibold text-gray-800">{{ $book->published_date }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                            <p class="text-sm text-gray-500">Pages</p>
                            <p class="font-semibold text-gray-800">{{ $book->pages }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                            <p class="text-sm text-gray-500">Publisher</p>
                            <p class="font-semibold text-gray-800">{{ $book->publisher ?: '-' }}</p>
                        </div>
                    </div>

                    <!-- Inventory Details -->
                    <div class="bg-orange-50 p-4 rounded-xl border border-orange-100 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-orange-600 font-semibold">Inventory Status</p>
                            <p class="text-gray-700 mt-1"><span class="font-bold text-gray-900">{{ $book->available_copies }}</span> available out of <span class="font-bold text-gray-900">{{ $book->total_copies }}</span> total copies</p>
                        </div>
                        <div class="w-16 h-16 rounded-full border-4 border-orange-200 flex items-center justify-center">
                            @if($book->total_copies > 0)
                                <span class="font-bold text-orange-600">{{ round(($book->available_copies / $book->total_copies) * 100) }}%</span>
                            @else
                                <span class="font-bold text-orange-600">0%</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- FOOTER BUTTONS -->
            <div class="mt-10 flex justify-between items-center pt-6 border-t border-gray-200">
                <a href="{{ route('books.index') }}"
                   class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold px-6 py-3 rounded-lg transition">
                    ⬅ Back to Books
                </a>
                
                <div class="flex gap-4">
                    @if($book->trashed())
                        <button wire:click="restore"
                                class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-3 rounded-lg transition">
                            🔄 Restore
                        </button>
                        <button wire:click="forceDelete"
                                wire:confirm="Are you sure you want to permanently delete this book?"
                                class="inline-flex items-center gap-2 bg-red-700 hover:bg-red-800 text-white font-semibold px-6 py-3 rounded-lg transition">
                            🗑️ Force Delete
                        </button>
                    @else
                        <a href="{{ route('books.edit', $book->id) }}"
                           class="inline-flex items-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-3 rounded-lg transition">
                            ✏️ Edit Book
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>