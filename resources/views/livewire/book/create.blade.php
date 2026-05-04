<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">

    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl p-8">

        <h2 class="text-3xl font-bold text-gray-800 mb-6">
            ➕ Create Book
        </h2>

        <form wire:submit.prevent="save" class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <!-- TITLE -->
            <div>
                <input wire:model="title"
                       placeholder="Title"
                       class="w-full border p-3 rounded-lg outline-none
                       @error('title') border-red-500 focus:ring-red-400 @enderror">

                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- AUTHOR -->
            <div>
                <input wire:model="author"
                       placeholder="Author"
                       class="w-full border p-3 rounded-lg outline-none
                       @error('author') border-red-500 focus:ring-red-400 @enderror">

                @error('author')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- ISBN -->
            <div>
                <input wire:model="isbn"
                       placeholder="ISBN"
                       class="w-full border p-3 rounded-lg outline-none
                       @error('isbn') border-red-500 focus:ring-red-400 @enderror">

                @error('isbn')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- DATE -->
            <div>
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
                <input wire:model="pages"
                       type="number"
                       placeholder="Pages"
                       class="w-full border p-3 rounded-lg outline-none
                       @error('pages') border-red-500 focus:ring-red-400 @enderror">

                @error('pages')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- PRICE -->
            <div>
                <input wire:model="price"
                       type="number"
                       placeholder="Price"
                       class="w-full border p-3 rounded-lg outline-none
                       @error('price') border-red-500 focus:ring-red-400 @enderror">

                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- AVAILABLE -->
            <div>
                <input wire:model="available_copies"
                       type="number"
                       placeholder="Available Copies"
                       class="w-full border p-3 rounded-lg outline-none
                       @error('available_copies') border-red-500 focus:ring-red-400 @enderror">

                @error('available_copies')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- TOTAL -->
            <div>
                <input wire:model="total_copies"
                       type="number"
                       placeholder="Total Copies"
                       class="w-full border p-3 rounded-lg outline-none
                       @error('total_copies') border-red-500 focus:ring-red-400 @enderror">

                @error('total_copies')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- PUBLISHER -->
            <div>
                <input wire:model="publisher"
                       placeholder="Publisher"
                       class="w-full border p-3 rounded-lg outline-none
                       @error('publisher') border-red-500 focus:ring-red-400 @enderror">

                @error('publisher')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- CATEGORY -->
            <div>
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
                <textarea wire:model="description"
                          placeholder="Description"
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