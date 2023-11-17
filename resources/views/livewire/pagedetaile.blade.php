<?php
use App\Models\multiimg;
use App\Models\product;
use App\Models\cart;
?>


<div class = "card-wrapper">
   <div  class='cart' id="cart"  wire:ignore.self  tabindex="-1" role="dialog" aria-labelledby="cartLabel" aria-hidden="true">
            <a class='bx bx-x cart__close' data-dismiss="cart-close" aria-label="cart-close"  id="cart-close" aria-hidden="true cart-close"></a>
            <h2 class="cart__title-center">My Cart</h2> 
            @foreach($cartitems as $item)
            @if(empty(cart::where('prod_id',$item['id'])))
            <h1>emty cart</h1>
            @else
            <div class="cart__container col-mt-5">
                <article class="cart__card">
                    <div class="cart__box">
                        <img src="{{asset('app/files/files')}}/{{$item->image}}" alt="" class="cart__img">
                    </div>
                    <div class="cart__details">
                        <h3 class="cart__title">{{$item->name}}</h3>
                        <span class="cart__price">{{$item->price}}$</span>
                        <div class="cart__amount">
                            <div class="cart__amount-content">
                                <span class="cart__amount-box">
                                    <i class='bx bx-minus' wire:click="decrementQty({{ $item->id }})"></i>
                                </span> 
                                <span class="cart__amount-number"  value = "{{$item->prod_qty}}">{{$item->prod_qty}}</span>
                                <span class="cart__amount-box">
                                    <i class='bx bx-plus' wire:click="incrementQty({{ $item->id }})"></i>
                                </span>
                            </div>
                           <i class='bx bx-trash-alt cart__amount-trash' wire:click="deletitem('{{$item->id}}')"></i>
                    </div>
                </article> 
            </div>
            @endif
            @endforeach
            <div class="cart__prices">
                <span class="cart__prices-item">total :</span>
                <span class="cart__prices-total">${{$total}}</span>     
     </div>
  </div>   
      

      <div class = "card">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
              <img src =  "{{asset('app/files/files')}}/{{$product['image']}}" class ='imgs' style="width: 300px" alt = "shoe image">
            </div>
          </div>

         <?php
          $multiimg = multiimg::where('multiid',$product['prod_uniqid'])->get();
         ?>
         
         <div class = "img-select">
          @foreach($multiimg as  $image)
            <div class = "img-item"> 
              <div class="product-img">
              <img src =  "{{asset('app/files/photos')}}/{{$image['multiimg']}}" onclick="slidimg(this.src)" style="display: flex"  alt = "shoe image">
              </div>
            </div>
            @endforeach
          </div>
        </div>
        </div>
         
      
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title">nike shoes</h2>
          <a href = "#" class = "product-link">visit nike store</a>
          <div class = "product-rating">
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star-half-alt"></i>
            <span>4.7(21)</span>
          </div>

          <div class = "product-price">
            <p class = "last-price">Old Price: <span class='price'>{{$product['price']}}</span></p>
            <p class = "new-price">New Price: <span>$249.00 (5%)</span></p>
          </div>
          @if(session('succes'))
       <div class="alert alert-warning alert-dismissible fade show" role="alert">{{session('succes')}}
        </div>
        @endif
          <div class = "product-detail">
            <h2>about this item: </h2>
            <p>{{$product['description']}}</p>
            <ul>
              <li>Color: <span>Black</span></li>
              <li>Available: <span>in stock</span></li>
              <li>Category: <span>Shoes</span></li>
              <li>Shipping Area: <span>All over the world</span></li>
              <li>Shipping Fee: <span>Free</span></li>
            </ul>
          </div>

          <?php
          $session_id = Session()->get('session_id');
          if(empty($session_id)){
              $session_id = Session::getId();
              Session()->put('session',$session_id);
          }    
          ?>

          <form wire:submit.prevent="store({{$product['id']}})"   enctype="multipart/form-data"> 
              @csrf
          <div class = "purchase-info">
            <input type = "number"  wire:model="prod_qty" value='1'>
            <button class="button home__button addcart" data-toggle="cart-close"  data-target="#cart"   type="submit">add to cart</button>
          </div>
          </form>
          
          <div class = "social-links">
            <p>Share At: </p>
            <a href = "#">
              <i class = "fab fa-facebook-f"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-twitter"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-instagram"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-whatsapp"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-pinterest"></i>
            </a>
          </div>
        </div>
      </div>
    </div>

  
    