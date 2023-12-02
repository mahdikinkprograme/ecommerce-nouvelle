<?php

namespace App\Http\Livewire;

use App\Models\category;

use Livewire\WithFileUploads;

use Carbon\Carbon;

use Livewire\Component;

class CategoryEdit extends Component
{
    use WithFileUploads;
    public $category_image;
    public $category_name;
    public $category_discount;
    public $description;
    public $parent_id;
    public $student;

    public function render()
    {
        return view('livewire.category-edit')->layout('layouts.apps');
    }

    public function mount($id)
    {
        $this->student = category::find($id)->first();
        $this->id = $this->student['id'];
        $this->category_name = $this->student['category_name'];
        $this->category_discount = $this->student['category_discount'];
        $this->description = $this->student['description'];
        if($this->category_image){
        $imagename = Carbon::now()->timestamp. '.' .$this->student['category_image']->extension();
        $this->category_image->storeAs('files',$imagename);
        $this->category_image = $imagename;
        }        
    }

    public function updatecategory($id)
    {
        $this->student = category::find($id)->first();
        $categorydata = $this->all();
        $categorydata['category_name'] = $this->category_name;
        $categorydata['category_discount'] = $this->category_discount;
        $categorydata['description'] = $this->description;
        $categorydata['parent_id'] = 0;
        if($categorydata['category_image']){
            $imagename = Carbon::now()->timestamp. '.' .$this->category_image->extension();
            $categorydata['category_image']->storeAs('files',$imagename);
            $categorydata['category_image'] = $imagename;
            }        
        $this->student->update($categorydata);
        session()->flash('success', 'data category has been successfully'); 


    }
}
