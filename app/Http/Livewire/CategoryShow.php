<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\category;


class CategoryShow extends Component
{
    public function render()
    {
        $datacategory = category::get()->toArray();
        return view('livewire.category-show',['datacategory' => $datacategory])->layout('layouts.apps');
    }

    public function deletcategory($id)
    {
        $delcategory = category::where('id',$id)->first();
        $delcategory->delete(); 
    }
}
