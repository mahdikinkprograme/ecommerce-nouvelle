<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\product;

use App\Models\category;

use App\Models\cart;

use Session;

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
        $session_id = Session()->get('session_id');
        if(empty($session_id)){
         $session_id = Session::getId();
         Session()->put('session',$session_id);
     }    
 
        $this->cartitems = cart::where(['session_id'=> $session_id])->get();
        $this->total = 0;
        foreach($this->cartitems as $item){
            $this->total += $item->price * $item->prod_qty;
        } 
        $categoryshow = category::get()->toArray();   
        $datavalue = product::where(['is_item' => 'no'])->get();
        $is_item = product::where(['is_item' => 'yes'])->get();
        return view('livewire.indexpage',['datavalue' => $datavalue,'is_item' => $is_item,
        'product' => $this->product, 'cartitems'=> $this->cartitems,'total' => $this->total, 'totalcount' => $this->totalcount
        ,'categoryshow' => $categoryshow
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
