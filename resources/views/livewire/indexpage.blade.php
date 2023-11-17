<?php
use App\Models\cart;
use App\Models\product;
 ?>


        <main class="main">
            <!--==================== HOME ====================-->
            <div  class='cart' id="cart"  wire:ignore.self  tabindex="-1" role="dialog" aria-labelledby="cartLabel" aria-hidden="true">
            <a class='bx bx-x cart__close' data-dismiss="cart-close" aria-label="cart-close"  id="cart-close" aria-hidden="true cart-close"></a>
            <h2 class="cart__title-center">My Cart</h2> 
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
            <div class="cart__prices">
                <span class="cart__prices-item">total :</span>
                <span class="cart__prices-total">${{$total}}</span>     
    </div>
    </div>   
            <section class="home" id="home">
                <div class="home__container container grid">
                    <div class="home__img-bg">
                        <img src="{{asset('admin/img/home.png')}}" alt="" class="home__img">
                    </div>
    
                    <div class="home__social">
                        <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                            Facebook
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="home__social-link">
                            Twitter
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                            Instagram
                        </a>
                    </div>

                    <div class="home__data">
                        <h1 class="home__title">NEW WATCH <br> COLLECTIONS B720</h1>
                        <p class="home__description">
                            Latest arrival of the new imported watches of the B720 series, 
                            with a modern and resistant design.
                        </p>
                        <span class="home__price">110$</span>

                        <div class="home__btns">
                            <a href="#" class="button button--gray button--small">
                                discover
                        </a>

                            <button><a href="" class="button home__button">add to cart</a></button>
                        </div> 
                    </div>
                </div>
            </section>

            <!--==================== FEATURED ====================-->
            <section class="featured section container" id="featured">
                <h2 class="section__title">
                    Featured
                </h2>
                <div class="featured__container grid">
                @foreach ($datavalue as $data)
                    <article class="featured__card ">
                        <span class="featured__tag">Sale</span>
                        <img src="{{asset('app/files/files')}}/{{$data['image']}}" alt="" class="featured__img container">
                        <div class="featured__data">
                            <h3 class="featured__title">{{$data['name']}}</h3>
                            <span class="featured__price">{{$data['price']}}$</span>
                        </div>
                        <button class="button featured__button"><a href="{{ url('detail/'.$data['id']) }}" style="color:#fff">add to cart</a></button>
                    </article>
                    @endforeach
                </div>
            </section>

            <!--==================== STORY ====================-->
            <section class="story section container">
                <div class="story__container grid">
                    <div class="story__data">
                        <h2 class="section__title story__section-title">
                            Our Story
                        </h2>
    
                        <h1 class="story__title">
                            Inspirational Watch of <br> this year
                        </h1>
    
                        <p class="story__description">
                            The latest and modern watches of this year, is available in various 
                            presentations in this store, discover them now.
                        </p>
    
                        <a href="#" class="button button--small">Discover</a>
                    </div>

                    <div class="story__images">
                        <img src="{{asset('admin/img/story.png')}}" alt="" class="story__img">
                        <div class="story__square"></div>
                    </div>
                </div>
            </section>

            <!--==================== PRODUCTS ====================-->
            <section class="products section container" id="products">
                <h2 class="section__title">
                    Products
                </h2>

                <div class="products__container grid">
                    @foreach($is_item as $datas)
                    <article class="products__card">
                        <img src="{{asset('app/files/files')}}/{{$datas['image']}}" alt="" class="products__img">

                        <h3 class="products__title">{{$datas['name']}}</h3>
                        <span class="products__price">{{$datas['price']}}$</span>

                        <button class="products__button">
                            <i class='bx bx-shopping-bag'></i>
                        </button>
                    </article>
                    @endforeach

                    <article class="products__card">
                        <img src="{{asset('admin/img/product3.png')}}" alt="" class="products__img">

                        <h3 class="products__title">Jubilee black</h3>
                        <span class="products__price">$870</span>

                        <button class="products__button">
                            <i class='bx bx-shopping-bag'></i>
                        </button>
                    </article>
                   

                    <article class="products__card">
                        <img src="{{asset('admin/img/product4.png')}}" alt="" class="products__img">

                        <h3 class="products__title">Fosil me3</h3>
                        <span class="products__price">$650</span>

                        <button class="products__button">
                            <i class='bx bx-shopping-bag'></i>
                        </button>
                    </article>

                    <article class="products__card">
                        <img src="{{asset('admin/img/product5.png')}}" alt="" class="products__img">

                        <h3 class="products__title">Duchen</h3>
                        <span class="products__price">$950</span>

                        <button class="products__button">
                            <i class='bx bx-shopping-bag'></i>
                        </button>
                    </article>
                </div>
            </section>

            <!--==================== TESTIMONIAL ====================-->
            <section class="testimonial section container">
                <div class="testimonial__container grid">
                    <div class="swiper testimonial-swiper">
                        <div class="swiper-wrapper">
                            <div class="testimonial__card swiper-slide">
                                <div class="testimonial__quote">
                                    <i class='bx bxs-quote-alt-left' ></i>
                                </div>
                                <p class="testimonial__description">
                                    They are the best watches that one acquires, also they are always with the latest 
                                    news and trends, with a very comfortable price and especially with the attention 
                                    you receive, they are always attentive to your questions.
                                </p>
                                <h3 class="testimonial__date">March 27. 2021</h3>
        
                                <div class="testimonial__perfil">
                                    <img src="{{asset('admin/img/testimonial1.')}}jpg" alt="" class="testimonial__perfil-img">
        
                                    <div class="testimonial__perfil-data">
                                        <span class="testimonial__perfil-name">Lee Doe</span>
                                        <span class="testimonial__perfil-detail">Director of a company</span>
                                    </div>
                                </div>
                            </div>

                            <div class="testimonial__card swiper-slide">
                                <div class="testimonial__quote">
                                    <i class='bx bxs-quote-alt-left' ></i>
                                </div>
                                <p class="testimonial__description">
                                    They are the best watches that one acquires, also they are always with the latest 
                                    news and trends, with a very comfortable price and especially with the attention 
                                    you receive, they are always attentive to your questions.
                                </p>
                                <h3 class="testimonial__date">March 27. 2021</h3>
        
                                <div class="testimonial__perfil">
                                    <img src="{{asset('admin/img/testimonial2.')}}jpg" alt="" class="testimonial__perfil-img">
        
                                    <div class="testimonial__perfil-data">
                                        <span class="testimonial__perfil-name">Samantha Mey</span>
                                        <span class="testimonial__perfil-detail">Director of a company</span>
                                    </div>
                                </div>
                            </div>

                            <div class="testimonial__card swiper-slide">
                                <div class="testimonial__quote">
                                    <i class='bx bxs-quote-alt-left' ></i>
                                </div>
                                <p class="testimonial__description">
                                    They are the best watches that one acquires, also they are always with the latest 
                                    news and trends, with a very comfortable price and especially with the attention 
                                    you receive, they are always attentive to your questions.
                                </p>
                                <h3 class="testimonial__date">March 27. 2021</h3>
        
                                <div class="testimonial__perfil">
                                    <img src="{{asset('admin/img/testimonial3.')}}jpg" alt="" class="testimonial__perfil-img">
        
                                    <div class="testimonial__perfil-data">
                                        <span class="testimonial__perfil-name">Raul Zaman</span>
                                        <span class="testimonial__perfil-detail">Director of a company</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="swiper-button-next">
                            <i class='bx bx-right-arrow-alt' ></i>
                        </div>
                        <div class="swiper-button-prev">
                            <i class='bx bx-left-arrow-alt' ></i>
                        </div>
                    </div>

                    <div class="testimonial__images">
                        <div class="testimonial__square"></div>
                        <img src="{{asset('admin/img/testimonial.png')}}" alt="" class="testimonial__img">
                    </div>
                </div>
            </section>

            <!--==================== NEW ====================-->
            <section class="new section container" id="new">
                <h2 class="section__title">
                    New Arrivals
                </h2>
                
                <div class="new__container">
                    <div class="swiper new-swiper">
                        <div class="swiper-wrapper">
                            <article class="new__card swiper-slide">
                                <span class="new__tag">New</span>
        
                                <img src="{{asset('admin/img/new1.png')}}" alt="" class="new__img">
        
                                <div class="new__data">
                                    <h3 class="new__title">Longines rose</h3>
                                    <span class="new__price">$980</span>
                                </div>
        
                                <button class="button new__button">ADD TO CART</button>
                            </article>

                            <article class="new__card swiper-slide">
                                <span class="new__tag">New</span>
        
                                <img src="{{asset('admin/img/new2.png')}}" alt="" class="new__img">
        
                                <div class="new__data">
                                    <h3 class="new__title">Jazzmaster</h3>
                                    <span class="new__price">$1150</span>
                                </div>
        
                                <button class="button new__button">ADD TO CART</button>
                            </article>

                            <article class="new__card swiper-slide">
                                <span class="new__tag">New</span>
        
                                <img src="{{asset('admin/img/new3.png')}}" alt="" class="new__img">
        
                                <div class="new__data">
                                    <h3 class="new__title">Dreyfuss gold</h3>
                                    <span class="new__price">$750</span>
                                </div>
        
                                <button class="button new__button">ADD TO CART</button>
                            </article>

                            <article class="new__card swiper-slide">
                                <span class="new__tag">New</span>
        
                                <img src="{{asset('admin/img/new4.png')}}" alt="" class="new__img">
        
                                <div class="new__data">
                                    <h3 class="new__title">Portuguese rose</h3>
                                    <span class="new__price">$1590</span>
                                </div>
        
                                <button class="button new__button">ADD TO CART</button>
                            </article>                       
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== NEWSLETTER ====================-->
            <section class="newsletter section container">
                <div class="newsletter__bg grid">
                    <div>
                        <h2 class="newsletter__title">Subscribe Our <br> Newsletter</h2>
                        <p class="newsletter__description">
                            Don't miss out on your discounts. Subscribe to our email 
                            newsletter to get the best offers, discounts, coupons, 
                            gifts and much more.
                        </p>
                    </div>

                    <form action="" class="newsletter__subscribe">
                        <input type="email" placeholder="Enter your email" class="newsletter__input">
                        <button class="button">
                            SUBSCRIBE
                        </button>
                    </form>
                </div>
            </section>
        </main>

       