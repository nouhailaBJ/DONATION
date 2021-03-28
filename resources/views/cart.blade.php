@extends('layouts.app')
@section('title')
سلة الدفع
@endsection
@section('content')
<main>
         <div class=" section-padding mt-4 rtl_dir">
            <div class="container">
               <div class="row align-items-center justify-content-between">
                  <div class="col-xl-12">
                    <a href="#" class="btn return_btn mb-4" data-animation="fadeInUp" data-delay=".2s" ><i class="fas fa-arrow-right"></i> عودة </a>
                  </div>
                  <div class="col-12">
                      <div class="checkout_wrapper">
                        <div class="Checkout_paymentFlow">
                            <h4> مجموع التبرع </h4>
                            <h3>300 <small>ريال</small></h3>
                            <div class="form-group">
                               <label for="">رقم الجوال</label>
                               <input type="text"  placeholder="05xxxxxxxx">
                            </div>
                            <button class="btn btn-primary mt-4">تبرع </button>
                        </div>
                        <div class="Checkout__cartManagement">
                            <div class="checkout_image">
                                <span> <i class="fas fa-money-bill-wave-alt"></i> سلة التبرعات</span>
                            </div>
                           <div class="basket_card">
                            @foreach( Cart::content() as $item )
                              <div class="basket_item">
                                 <div class="basket_image">
                                    <img src="{{ asset($item->model->image) }}" alt="">
                                 </div>
                                 <div class="basket_title">
                                    <p>{{ $item->model->title }}</p>
                                 </div>
                                 <div class="basket_cat">
                                    {{ $item->model->category->name }}
                                 </div> 
                                 <div class="basket_price">
                                    {{ $item->model->price }} <small> ريال </small>
                                 </div>
                                 <button class="basket_delete">
                                    <i class="fas fa-times"></i>
                                 </button>
                              </div>
                            @endforeach
                           </div>
                        </div>
                      </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container footer2 rtl_dir " id="footer_all">
            <div class="footer_all text-left">
               <a href="#" class="btn hero-btn"  data-animation="fadeInUp" data-delay=".8s"><i class="far fa-question-circle"></i> الدعم</a>
            </div>
         </div>   
@stop