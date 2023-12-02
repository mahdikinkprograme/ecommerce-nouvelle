<?php

namespace App\Http\Livewire;

use App\Models\product;

use App\Models\multiimg;

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
    public $multiimg = [];

    public function render()
    {
        return view('livewire.edite-product',['student' => $this->student])->layout('layouts.apps');
    }


    public function mount($id)
    {
        $this->student = product::with('multiimg')->find($id)->first();
        $this->id = $this->student['id'];
        $this->name = $this->student['name'];
        $this->price = $this->student['price'];
        $this->description = $this->student['description'];
        $this->is_item = $this->student['is_item'] == true ? 'yes' : 'no';
        if($this->image){
        $imagename = Carbon::now()->timestamp. '.' .$this->student['image']->extension();
        $this->image->storeAs('files',$imagename);
        $this->image = $imagename;
        }        
            
    }

    public  function updateproduct($id)
    {

        $this->student = product::with('multiimg')->find($id)->first();
        $dataarray = $this->all();
        $dataarray['id'] = $this->id;
        $dataarray['name'] = $this->name;
        $dataarray['price'] = $this->price;
        $dataarray['description'] = $this->description;
        $dataarray['is_item'] = $this->is_item == true ? 'yes' : 'no';
        if($dataarray['image']){
            $imagename = Carbon::now()->timestamp. '.' .$this->image->extension();
            $dataarray['image']->storeAs('files',$imagename);
            $dataarray['image'] = $imagename;
            }        
            
        $this->student->update($dataarray);
        session()->flash('message', 'product update has been successfully'); 

    }
}
