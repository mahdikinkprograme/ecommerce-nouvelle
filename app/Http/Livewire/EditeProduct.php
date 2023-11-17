<?php

namespace App\Http\Livewire;

use App\Models\product;

use Livewire\WithFileUploads;

use Carbon\Carbon;


use Livewire\Component;


class EditeProduct extends Component
{
    use WithFileUploads;
    public $student;
    public $name;
    public $image;
    public $price;
    public $description;
    public $is_item;


    public function render()
    {
        return view('livewire.edite-product',['student' => $this->student])->layout('layouts.apps');
    }


    public function mount($id)
    {
        $this->student = product::find($id)->toArray();
        $this->id = $this->student['id'];
        $this->name = $this->student['name'];
        $this->price = $this->student['price'];
        $this->description = $this->student['description'];
        if($this->image){
        $imagename = Carbon::now()->timestamp. '.' .$this->image->extension();
            $this->image->storeAs('files',$imagename);
            $this->image = $imagename;
        }
            if(!empty($this->is_item)){
                $this->is_item = $this->student['is_item'];
                $this->is_item = 'yes';
            }else{
                $this->is_item = 'no';
            }
            
    }

    public  function updateproduct($id)
    {

        $this->student = product::find($id)->first();
        $dataarray = array(
            'id' => $this->student['id'],
            'name' => $this->student['name'],
            'price' => $this->student['price'],
            'description' => $this->student['description'],
            'image' => $this->student['image'],
        );
            
           $this->student->update($dataarray);
           session()->flash('message', 'product update has been successfully'); 

    }
}
