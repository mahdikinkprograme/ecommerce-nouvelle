<?php

namespace App\Http\Livewire;

use App\Models\product;

use App\Models\multiimg;

use App\Models\cart;

use Livewire\WithFileUploads;

use Session;

use Auth;

use Livewire\Attributes\On; 

use Livewire\Component;

class Pagedetaile extends Component
{
    use WithFileUploads;
    public $multiimgs;
    public $cartitems;
    public $total = 0;
    public $product;
    public $prod_qty = 1;
    public $totalcount = 0;
    protected $listeners = ['updateCartCount' => 'getCartItemCount'];


    public function mount($id=null)
    {
        if($id !== null){
            $this->product = product::with('multiimg')->find($id)->toArray();
        }else{
            abort(404);
        }
          
    }


     public function render()
    {
       $this->getCartItemCount();
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
        return view('livewire.pagedetaile',['product' => $this->product,'multiimgs' => $this->multiimgs, 
        'cartitems'=> $this->cartitems,'total' => $this->total, 'totalcount' => $this->totalcount])
        ->layout('layouts.index');
    }

    public function getCartItemCount()
    {
        $session_id = Session()->get('session_id');
        if(empty($session_id)){
        $session_id = Session::getId();
        Session()->put('session',$session_id);
        }
        $this->totalcount = cart::where(['session_id'=> $session_id])
            ->count();
    }


    public  function store($rowId)
    {
        $this->dispatchBrowserEvent('cart');
        $addpro = product::findOrFail($rowId);
        $session_id = Session()->get('session_id');
        if(empty($session_id)){
            $session_id = Session::getId();
            Session()->put('session',$session_id);
        }

        if(cart::where('prod_id',$addpro->id)->where('session_id',$session_id)->count()){
            return;
        }

        $addcart = new cart();
        $addcart->prod_id = $addpro->id;
        $addcart->name = $addpro->name;
        $addcart->price = $addpro->price;
        $addcart->image = $addpro->image;
        $addcart->prod_qty = $this->prod_qty;
        $addcart->session_id = $session_id;
        $addcart->save();
        $this->emit('updateCartCount');
        session()->flash('succes', 'Images has been successfully'); 

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
