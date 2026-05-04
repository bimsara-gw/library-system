<?php

namespace App\Livewire\Book;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Book;
use App\Models\Category;

class Index extends Component
{
    use WithPagination;

    public $search, $author, $category, $availability;

    protected $updatesQueryString = [
        'search','author','category','availability'
    ];

    public function delete($id)
    {
        Book::findOrFail($id)->delete();
    }

    public function restore($id)
    {
        Book::withTrashed()->findOrFail($id)->restore();
    }

    public function forceDelete($id)
    {
        Book::withTrashed()->findOrFail($id)->forceDelete();
    }

    public function render()
    {
        $books = Book::with(['category','creator'])
            ->when($this->search, fn($q) =>
                $q->where('title','like',"%{$this->search}%")
            )
            ->when($this->author, fn($q) =>
                $q->where('author','like',"%{$this->author}%")
            )
            ->when($this->category, fn($q) =>
                $q->where('category_id',$this->category)
            )
            ->when($this->availability === 'available', fn($q) =>
                $q->where('available_copies','>',0)
            )
            ->when($this->availability === 'out', fn($q) =>
                $q->where('available_copies',0)
            )
            ->paginate(20);

        return view('livewire.book.index', [
            'books' => $books,
            'categories' => Category::all()
        ]);
    }
}
