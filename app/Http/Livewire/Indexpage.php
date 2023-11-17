<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\product;

use App\Models\cart;

class Indexpage extends Component
{
    public $cartitems;
    public $total = 0;
    public $product;
    public $prod_qty = 1;
    public $totalcount = 0;
    #[Layout('layouts.index')] 
    public function render()
    {
        $this->cartitems = cart::where(['user_id'=> auth()->user()->id])->get();
        $this->total = 0;
        foreach($this->cartitems as $item){
            $this->total += $item->price * $item->prod_qty;
        }    
        $datavalue = product::where(['is_item' => 'no'])->get();
        $is_item = product::where(['is_item' => 'yes'])->get();
        return view('livewire.indexpage',['datavalue' => $datavalue,'is_item' => $is_item,
        'product' => $this->product, 'cartitems'=> $this->cartitems,'total' => $this->total, 'totalcount' => $this->totalcount
        ])->layout('layouts.index');
    }


    public function deletitem($id)
    {
       $cartdel = cart::where('id',$id)->first();
       $cartdel->delete();
    }

    public function incrementQty($id){
        $cart = Cart::where('id',$id)->first();
        $cart->prod_qty += 1;
        $cart->save();
    }

    public function decrementQty($id){
        $cart = Cart::where('id',$id)->first();
        if($cart->prod_qty > 1){
            $cart->prod_qty -= 1;
            $cart->save();
          
      }
   }
}
