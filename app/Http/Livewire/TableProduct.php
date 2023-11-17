<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\product;


class TableProduct extends Component
{
    public function render()
    {
        $datavalue = product::where(['is_item' => 'no'])->get();
       // $datavalue = session()->get('produpdate',[]);
        $is_item = product::where(['is_item' => 'yes'])->get()->toArray();
        return view('livewire.table-product',['datavalue' => $datavalue,'is_item' => $is_item,
        ])->layout('layouts.apps');
    }


    public function deletproduct($id)
    {
        $delproduct = product::where('id',$id)->first();
        $delproduct->delete();
    }
}
