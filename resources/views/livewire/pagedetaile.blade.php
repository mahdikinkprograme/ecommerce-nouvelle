<?php
use App\Models\multiimg;
use App\Models\product;
use App\Models\cart;
?>
<div>
<header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">
                    <i class='bx bxs-watch nav__logo-icon'></i> Rolex
                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="#home" class="nav__link active-link">Home</a>
                        </li>
                        <li class="nav__item">
                            <a href="#featured" class="nav__link">Featured</a>
                        </li>
                        <li class="nav__item">
                            <a href="#products" class="nav__link">Products</a>
                        </li>
                        <li class="nav__item">
                            <a href="#new" class="nav__link">New</a>
                        </li>
                    </ul>

                    <div class="nav__close" id="nav-close">
                        <i class='bx bx-x' ></i>
                    </div>
                </div>

                <div class="nav__btns">
                    <!-- Theme change button -->
                    <i class='bx bx-moon change-theme' id="theme-button"></i>
                    <?php
                     $session_id = Session()->get('session_id');
                     if(empty($session_id)){
                         $session_id = Session::getId();
                         Session()->put('session',$session_id);
                     }
                    $cartcount = cart::where('session_id',$session_id)->count();
                    ?>
                   
                    <div class="nav__shop" id="cart-shop">
                        <i class='bx bx-shopping-bag' ><span style="color:#f64749">{{$totalcount}}</span></i>
                    </div>

                    <div class="nav__toggle" id="nav-toggle">
                        <i class='bx bx-grid-alt' ></i>
                    </div>
                </div>
            </nav>
        </header>   

<div class = "card-wrapper">
   <div  class='cart' id="cart"  wire:ignore.self  tabindex="-1" role="dialog" aria-labelledby="cartLabel" aria-hidden="true">
            <a class='bx bx-x cart__close' data-dismiss="cart-close" aria-label="cart-close"  id="cart-close" aria-hidden="true cart-close"></a>
            <h2 class="cart__title-center">my cart</h2> 
            @if(cart::count() > 0)
            @foreach($cartitems as $item)
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
            @endforeach
            @else
            <h1 class="container" style="text-align: center">cart is empty</h1>
            @endif
            <div class="cart__prices">
                <span class="cart__prices-item">total :</span>
                <span class="cart__prices-total">{{$total}} usd</span>     
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

          <form wire:submit.prevent="store({{$product['id']}})"   enctype="multipart/form-data"> 
              @csrf
          <div class = "purchase-info">
            <input type = "number"  wire:model="prod_qty" value='1'>
            <button class="button home__button addcart" data-toggle="cart-close"  data-target="#cart"   type="submit">add to cart</button>
          </div>
          </form>
          
          <div class="footer__content">
                    <h3 class="footer__title">Social</h3>

                    <ul class="footer__social">
                        <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                            <i class='bx bxl-facebook'></i>
                        </a>

                        <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                            <i class='bx bxl-twitter' ></i>
                        </a>

                        <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                            <i class='bx bxl-instagram' ></i>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  
    