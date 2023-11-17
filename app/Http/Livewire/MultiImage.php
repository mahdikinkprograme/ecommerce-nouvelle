<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;

use App\Models\multiimg;

use Livewire\Component;

class MultiImage extends Component
{

    use WithFileUploads;
 
    public $multiimg = [];

   public function saveimage()
    {
        $this->validate([
            'multiimg' => 'image|nullable', // 1MB Max
        ]);
 
        foreach ($this->multiimg as $key => $photo) {
            $multiimage = new multiimg();
            $imagename = Carbon::now()->timestamp. $key . '.' .$this->multiimg->extension();
            $photo->storeAs('photos',$imagename);
            $multiimage->multiimg = $imagename;
            $multiimage->save();
              }
              
 
        session()->flash('success', 'Images has been successfully Uploaded.');
 
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.multi-image')->layout('layouts.apps');
    }
}
