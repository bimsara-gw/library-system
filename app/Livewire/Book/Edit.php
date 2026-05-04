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
        $book = Book::findOrFail($id);

        if ($book->trashed()) {
            abort(404);
        }

        $this->bookId = $book->id;

        $this->fill($book->toArray());
    }

    public function update()
    {
        $book = Book::findOrFail($this->bookId);

        $this->validate([
            'title' => 'required',
            'author' => 'required',
            'published_date' => 'before_or_equal:today',
            'pages' => 'integer|min:1',
        ]);

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

        session()->flash('success','Book updated');

        return redirect()->route('books.index');
    }

    public function render()
    {
        return view('livewire.book.edit', [
            'categories' => Category::all()
        ]);
    }
}