<?php

namespace App\Livewire\Book;

use Livewire\Component;
use App\Models\Book;
use App\Models\Category;

class Edit extends Component
{
    public $bookId;
    public $title, $author, $isbn, $description,
           $published_date, $pages, $price,
           $available_copies, $total_copies,
           $publisher, $category_id;

    public function mount($id)
    {
        $book = Book::withTrashed()->findOrFail($id);

        if ($book->trashed()) {
            abort(403, 'Cannot edit a deleted book.');
        }

        $this->bookId = $book->id;
        $this->title = $book->title;
        $this->author = $book->author;
        $this->isbn = $book->isbn;
        $this->description = $book->description;
        $this->published_date = $book->published_date;
        $this->pages = $book->pages;
        $this->price = $book->price;
        $this->available_copies = $book->available_copies;
        $this->total_copies = $book->total_copies;
        $this->publisher = $book->publisher;
        $this->category_id = $book->category_id;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'nullable|string',
            'published_date' => 'required|date|before_or_equal:today',
            'pages' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'available_copies' => 'required|integer|min:0',
            'total_copies' => 'required|integer|min:0',
            'publisher' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $book = Book::findOrFail($this->bookId);

        $book->update([
            'title' => $this->title,
            'author' => $this->author,
            'description' => $this->description,
            'published_date' => $this->published_date,
            'pages' => $this->pages,
            'price' => $this->price,
            'available_copies' => $this->available_copies,
            'total_copies' => $this->total_copies,
            'publisher' => $this->publisher,
            'category_id' => $this->category_id,
        ]);

        session()->flash('success', 'Book updated successfully');

        return redirect()->route('books.index');
    }

    public function cancel()
    {
        return redirect()->route('books.index');
    }

    public function render()
    {
        return view('livewire.book.edit', [
            'categories' => Category::all()
        ]);
    }
}