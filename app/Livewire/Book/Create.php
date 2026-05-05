<?php

namespace App\Livewire\Book;

use Livewire\Component;
use App\Models\Book;
use App\Models\Category;

class Create extends Component
{
    public $title, $author, $isbn, $description,
           $published_date, $pages, $price,
           $available_copies, $total_copies,
           $publisher, $category_id;

    protected $rules = [
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'isbn' => 'required|unique:books|regex:/^\d{10}(\d{3})?$/',
        'description' => 'nullable|string',
        'published_date' => 'required|date|before_or_equal:today',
        'pages' => 'required|integer|min:1',
        'price' => 'required|numeric|min:0',
        'available_copies' => 'required|integer|min:0',
        'total_copies' => 'required|integer|min:0',
        'publisher' => 'nullable|string|max:255',
        'category_id' => 'required|exists:categories,id',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        Book::create([
            'title' => $this->title,
            'author' => $this->author,
            'isbn' => $this->isbn,
            'description' => $this->description,
            'published_date' => $this->published_date,
            'pages' => $this->pages,
            'price' => $this->price,
            'available_copies' => $this->available_copies,
            'total_copies' => $this->total_copies,
            'publisher' => $this->publisher,
            'category_id' => $this->category_id,
        ]);

        session()->flash('success', 'Book created successfully');

        return redirect()->route('books.index');
    }

    public function render()
    {
        return view('livewire.book.create', [
            'categories' => Category::all()
        ]);
    }
}