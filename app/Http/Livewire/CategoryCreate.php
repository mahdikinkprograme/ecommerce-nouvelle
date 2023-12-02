<?php

namespace App\Http\Livewire;

use App\Models\category;

use Livewire\WithFileUploads;

use Carbon\Carbon;

use Livewire\Component;

class CategoryCreate extends Component
{
   use WithFileUploads;
   public $category_image;
   public $category_name;
   public $category_discount;
   public $description;
   public $parent_id;

    public function render()
    {
        return view('livewire.category-create')->layout('layouts.apps');
    }

    public function addcategory()
    {
        $categorydata =  $this->validate = [
            'category_name' => 'required|string',
            //'parent_id' => 'required|numeric',
            'category_discount' => 'required|numeric',
            'description' => 'required',
            'category_image' => 'required|image',
         ];

         $dataval = [
             'category_name.required' => 'error name no required',
             'category_discount.required' => 'error discount no required',
             'description.required' => 'error desciption no required',
             'category_image.required' => 'error image no required',
             //'date.required' => 'error required',
         ];
         $this->validate($categorydata,$dataval);

         $categorydata = new category();
         $categorydata['category_name'] = $this->category_name;
         $categorydata['category_discount'] = $this->category_discount;
         $categorydata['description'] = $this->description;
         $categorydata['parent_id'] = 0;
         $imagename = Carbon::now()->timestamp. '.' .$this->category_image->extension();
         $this->category_image->storeAs('files',$imagename);
         $categorydata['category_image'] = $imagename;
         $categorydata->save();
         session()->flash('success', 'data product has been successfully'); 


    }

    
}
