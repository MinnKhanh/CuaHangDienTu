<?php

namespace App\Http\Livewire\Shop;

use App\Models\Brand;
use App\Models\Categories;
use App\Models\Product;
use Livewire\Component;

class ListProduct extends Component
{
    protected $perPage;
    public $category = 1;
    public $name = 'aksdfh';
    public function mount()
    {
        $this->perPage = 6;
    }
    public function render()
    {
        $categoies = Categories::get()->toArray();
        $products = Product::with('Img')->paginate($this->perPage);
        $brands = Brand::get()->toArray();
        // dd($products);
        return view('livewire.shop.list-product', ['categories' => $categoies, 'products' => $products, 'brands' => $brands]);
    }
}
