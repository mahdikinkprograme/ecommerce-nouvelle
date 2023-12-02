<?php

namespace App\Http\Livewire;
use App\Models\product;
use App\Models\multiimg;
use Livewire\WithFileUploads;
use Livewire\Component;
use Carbon\Carbon;

class Admincreate extends Component
{
    use WithFileUploads;
    public $name;
    public $image;
    public $price;
    public $description;
    public $is_item;
    public $multiimg = [];

    public function render()
    {
        return view('livewire.admincreate')->layout('layouts.apps');
    }


    public function forms()
    {

        $data =  $this->validate = [
               'name' => 'required|string',
               'price' => 'required|numeric',
               'description' => 'required',
               'image' => 'required|image',
               //'date' => 'required|date',

            ];

            $dataval = [
                'name.required' => 'error name no required',
                'price.required' => 'error price no required',
                'description.required' => 'error desciption no required',
                'image.required' => 'error image no required',
                //'date.required' => 'error required',
            ];

            $this->validate($data,$dataval);

            $uniqid = carbon::now()->timestamp. uniqid();

            $data = new product();
            $data['name'] = $this->name;
            $data['price'] = $this->price;
            $data['description'] = $this->description;
            $data['date'] = date(('Y-m-d H:i:s'));
            $imagename = Carbon::now()->timestamp. '.' .$this->image->extension();
            $this->image->storeAs('files',$imagename);
            $data['image'] = $imagename;
            $data['is_item'] = $this->is_item == true ? 'yes' : 'no';
            $data['prod_uniqid'] = $uniqid;
            $data->save();
            
            foreach ($this->multiimg as $key => $photo) {
                $multiimage = new multiimg();
                $imagename = Carbon::now()->timestamp. $key. '.' . $photo->extension();
                $photo->storeAs('photos',$imagename);
                $multiimage->multiimg = $imagename;
                $multiimage->multiid = $uniqid;
                $multiimage->save();
                  }

              session()->flash('success', 'data product has been successfully'); 
       
    }

}
