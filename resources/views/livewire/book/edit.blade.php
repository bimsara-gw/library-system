<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">

    <!-- CARD -->
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl p-8">

        <!-- TITLE -->
        <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            ✏️ Edit Book
        </h2>

        <!-- FORM -->
        <form wire:submit.prevent="update" class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <input wire:model="title"
                   placeholder="Title"
                   class="border p-3 rounded-lg focus:ring-2 focus:ring-yellow-400 outline-none">

            <input wire:model="author"
                   placeholder="Author"
                   class="border p-3 rounded-lg focus:ring-2 focus:ring-yellow-400 outline-none">

            <input wire:model="isbn"
                   placeholder="ISBN"
                   class="border p-3 rounded-lg focus:ring-2 focus:ring-yellow-400 outline-none">

            <input wire:model="published_date"
                   type="date"
                   class="border p-3 rounded-lg focus:ring-2 focus:ring-yellow-400 outline-none">

            <input wire:model="pages"
                   type="number"
                   placeholder="Pages"
                   class="border p-3 rounded-lg focus:ring-2 focus:ring-yellow-400 outline-none">

            <input wire:model="price"
                   type="number"
                   placeholder="Price"
                   class="border p-3 rounded-lg focus:ring-2 focus:ring-yellow-400 outline-none">

            <input wire:model="available_copies"
                   type="number"
                   placeholder="Available Copies"
                   class="border p-3 rounded-lg focus:ring-2 focus:ring-yellow-400 outline-none">

            <input wire:model="total_copies"
                   type="number"
                   placeholder="Total Copies"
                   class="border p-3 rounded-lg focus:ring-2 focus:ring-yellow-400 outline-none">

            <input wire:model="publisher"
                   placeholder="Publisher"
                   class="border p-3 rounded-lg focus:ring-2 focus:ring-yellow-400 outline-none">

            <!-- CATEGORY -->
            <select wire:model="category_id"
                    class="border p-3 rounded-lg focus:ring-2 focus:ring-yellow-400 outline-none">

                <option value="">📚 Select Category</option>

                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach

            </select>

            <!-- DESCRIPTION -->
            <textarea wire:model="description"
                      placeholder="Description"
                      class="border p-3 rounded-lg md:col-span-2 h-28 focus:ring-2 focus:ring-yellow-400 outline-none"></textarea>

            <!-- BUTTONS -->
            <div class="md:col-span-2 flex justify-between gap-4">

                <button type="button"
                        wire:click="cancel"
                        class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition">
                    ❌ Cancel
                </button>

                <button class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white px-6 py-3 rounded-lg font-semibold hover:opacity-90 transition">
                    💾 Update Book
                </button>

            </div>

        </form>

    </div>

</div>