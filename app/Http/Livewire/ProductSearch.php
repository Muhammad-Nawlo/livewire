<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSearch extends Component
{
    use WithPagination;
    protected $products = [];
    public string $search = '';

    public $queryString = ['search'];
    public function mount(): void
    {
        $this->products = Product::paginate(10);
    }
    public function render()
    {
        $query = Product::query();
        if ($this->search) {
            $query->where('title', 'like', "%{$this->search}%")
                ->orWhere('description', 'like', "%{$this->search}%");
        }
        return view('livewire.product-search', ['products' => $query->paginate(20)]);
    }

    public function updated($property): void
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }
}
