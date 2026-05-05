<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">

    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl p-8">

        <h2 class="text-3xl font-bold text-gray-800 mb-6">
            ➕ Create Book
        </h2>

        <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <!-- TITLE -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Title <span class="text-red-500">*</span></label>
                <input wire:model="title"
                       placeholder="Enter book title"
                       class="w-full border p-3 rounded-lg outline-none
                       @error('title') border-red-500 focus:ring-red-400 @enderror">

                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- AUTHOR -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Author <span class="text-red-500">*</span></label>
                <input wire:model="author"
                       placeholder="Author name"
                       class="w-full border p-3 rounded-lg outline-none
                       @error('author') border-red-500 focus:ring-red-400 @enderror">

                @error('author')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- ISBN -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">ISBN <span class="text-red-500">*</span></label>
                <input wire:model="isbn"
                       placeholder="e.g. 1234567890 or 1234567890123"
                       class="w-full border p-3 rounded-lg outline-none
                       @error('isbn') border-red-500 focus:ring-red-400 @enderror">

                @error('isbn')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- DATE -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Published Date <span class="text-red-500">*</span></label>
                <input wire:model="published_date"
                       type="date"
                       class="w-full border p-3 rounded-lg outline-none
                       @error('published_date') border-red-500 focus:ring-red-400 @enderror">

                @error('published_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- PAGES -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Pages <span class="text-red-500">*</span></label>
                <input wire:model="pages"
                       type="number"
                       placeholder="e.g. 350"
                       class="w-full border p-3 rounded-lg outline-none
                       @error('pages') border-red-500 focus:ring-red-400 @enderror">

                @error('pages')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- PRICE -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Price <span class="text-red-500">*</span></label>
                <input wire:model="price"
                       type="number"
                       step="0.01"
                       placeholder="e.g. 19.99"
                       class="w-full border p-3 rounded-lg outline-none
                       @error('price') border-red-500 focus:ring-red-400 @enderror">

                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- AVAILABLE -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Available Copies <span class="text-red-500">*</span></label>
                <input wire:model="available_copies"
                       type="number"
                       placeholder="0"
                       class="w-full border p-3 rounded-lg outline-none
                       @error('available_copies') border-red-500 focus:ring-red-400 @enderror">

                @error('available_copies')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- TOTAL -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Total Copies <span class="text-red-500">*</span></label>
                <input wire:model="total_copies"
                       type="number"
                       placeholder="0"
                       class="w-full border p-3 rounded-lg outline-none
                       @error('total_copies') border-red-500 focus:ring-red-400 @enderror">

                @error('total_copies')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- PUBLISHER -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Publisher</label>
                <input wire:model="publisher"
                       placeholder="Publisher name"
                       class="w-full border p-3 rounded-lg outline-none
                       @error('publisher') border-red-500 focus:ring-red-400 @enderror">

                @error('publisher')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- CATEGORY -->
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Category <span class="text-red-500">*</span></label>
                <select wire:model="category_id"
                        class="w-full border p-3 rounded-lg outline-none
                        @error('category_id') border-red-500 focus:ring-red-400 @enderror">

                    <option value="">📚 Select Category</option>

                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach

                </select>

                @error('category_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- DESCRIPTION -->
            <div class="md:col-span-2">
                <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea wire:model="description"
                          placeholder="Book description..."
                          class="w-full border p-3 rounded-lg h-28 outline-none
                          @error('description') border-red-500 focus:ring-red-400 @enderror"></textarea>

                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- BUTTON -->
            <div class="md:col-span-2">
                <button class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-3 rounded-lg font-semibold hover:opacity-90 transition">
                    💾 Save Book
                </button>
            </div>

        </form>

    </div>
</div>