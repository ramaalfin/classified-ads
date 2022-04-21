<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Models\ChildCategories;

class DependedCategory extends Component
{
    public $categories;
    public $subCategories;
    public $childCategories;

    public $selectedCategory = null;
    public $selectedSubCategory = null;

    public function mount(){
        $this->categories = Categories::all();
    }

    public function updatedSelectedCategory($category){
        if (!is_null($this->selectedCategory)) {
            $this->subCategories = SubCategories::where('category_id', $category)->get();
        }
    }

    public function updatedSelectedSubCategory($category){
        if (!is_null($this->selectedSubCategory)) {
            $this->childCategories = ChildCategories::where('sub_category_id', $category)->get();
        }
    }

    public function render()
    {
        return view('livewire.depended-category');
    }
}
