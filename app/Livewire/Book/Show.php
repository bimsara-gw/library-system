<?php

namespace App\Livewire\Book;

use Livewire\Component;
use App\Models\Book;

class Show extends Component
{
    public $book;

    public function mount($id)
    {
        $this->book = Book::with(['category','creator','updater'])
            ->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.book.show');
    }
}