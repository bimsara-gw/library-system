<?php

namespace App\Livewire\Book;

use Livewire\Component;
use App\Models\Book;

class Show extends Component
{
    public $book;

    public function mount($id)
    {
        $this->book = Book::with(['category','creator','updater','deleter'])
            ->withTrashed()
            ->findOrFail($id);
    }

    public function restore()
    {
        $this->book->restore();
        $this->book->refresh();
        session()->flash('success', 'Book restored successfully.');
    }

    public function forceDelete()
    {
        $this->book->forceDelete();
        session()->flash('success', 'Book permanently deleted.');
        return redirect()->route('books.index');
    }

    public function render()
    {
        return view('livewire.book.show');
    }
}