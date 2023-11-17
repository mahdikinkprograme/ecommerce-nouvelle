<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Tables extends Component
{
    public $lengthsike = 0;
    public $lengthdarfe = 0;
    public $valuesike = 0;
    public $valuedarfe = 0;
    public $widthdarfe = 0;
    public $widthsike = 0;
    public function render()
    {
        return view('livewire.tables')->layout('layouts.apps');
    }

    public function formss()
    {
        if(empty($this->lenthsike)){
        $this->valuesike = $this->lengthsike +5;
    }else{
        return  0;

    }
        $this->valuedarfe = $this->lengthsike - 4;
        $this->widthsike = $this->lengthdarfe - 3;
        $this->widthdarfe = $this->lengthdarfe /2 -3;
    }

}
