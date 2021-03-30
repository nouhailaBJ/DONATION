@extends('layouts.app')
@section('title')
  الرئيسية
@endsection
@section('content')
      <div class="slider-area position-relative">
         <div class="slider-active dot-style">
            <div class="single-slider hero-overly01  slider-height slider-bg2 d-flex align-items-center ">
               <div class="container">
                  <div class="row justify-content-end rtl_dir">
                     <div class="col-xxl-7 col-xl-5 col-lg-6 col-md-6 col-sm-6">
                        <div class="hero-caption text-right rtl_dir">
                           <h1 data-animation="fadeInUp" data-delay=".2s">{{ setting('site.title_home') }}</h1>
                           <p class="mb-4" data-animation="fadeInUp" data-delay=".4s">{{ setting('site.desc_home') }}</p>
                           <a href="{{ route('cases') }}" class="btn hero-btn2 mt-4" data-animation="fadeInUp" data-delay=".8s">استعراض مشاريع الاهداء</a>
                        </div>
                     </div>
                     <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="hero-caption text-right rtl_dir">
                           <img src="{{asset('img/bg_slider2.png')}}" alt="" data-animation="fadeInLeft" data-delay=".10s" class="image_slider">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @foreach ($projects as $project)
                <div class="single-slider hero-overly01  slider-height slider-bg2 d-flex align-items-center ">
                <div class="container">
                    <div class="row justify-content-end rtl_dir">
                        <div class="col-xxl-7 col-xl-5 col-lg-6 col-md-6 col-sm-6">
                            <div class="hero-caption text-right rtl_dir">
                            <h1 data-animation="fadeInUp" data-delay=".2s">{{ $project->title }}</h1>
                            <P data-animation="fadeInUp" data-delay=".4s" style="font-size: 25px;">{{\Illuminate\Support\Str::limit($project->desc, 100)}}</P>
                            <div class="radio-tile-group">
                                <label for="" class="price_type">فئة السهم : </label>
                                @foreach ($project->stocks as $stock)
                                    <div class="input-container">
                                    <input id="{{ $stock->id }}" value="{{ $stock->price }}" class="radio-button price{{$project->id}}" type="radio" name="price{{$project->id}}" tabindex="0">
                                    <div class="radio-tile">
                                        {{ $stock->price }} ريال
                                    </div>
                                    </div>
                                @endforeach
                                </div>
                            <a href="#" class="btn hero-btn mt-4 show_pop_up" data-animation="fadeInUp" data-delay=".8s" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id-popup="{{ $project->id }}" data-title-popup="{{ $project->title }}" data-image-popup="{{ $project->image }}"><i class="fas fa-gift"></i> الإهداء السريع </a>
                            </div>
                        </div>
                        <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="hero-caption text-right rtl_dir">
                            <img src="{{asset('img/bg_slider2.png')}}" alt="" class="image_slider" data-animation="fadeInLeft" data-delay=".10s">
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            @endforeach
         </div>
         <div class="container footer footer_bottom rtl_dir d-flex justify-content-between flex-wrap align-items-center" id="footer_all">
            <div class="footer_all">
               <a href="#" class="btn hero-btn"  data-animation="fadeInUp" data-delay=".8s"><i class="far fa-question-circle"></i> الدعم</a>
            </div>
            <div class="footer_text">
               <span>{{ setting('site.footer') }}</span>
            </div>
           <div class="footer-social">
             <a href="{{ setting('site.facebook') }}"><i class="fab fa-facebook-f"></i></a>
             <a href="{{ setting('site.twitter') }}"><i class="fab fa-twitter"></i></a>
             <a href="{{ setting('site.instagram') }}"><i class="fab fa-instagram"></i></a>
             <a href="{{ setting('site.youtube') }}"><i class="fab fa-youtube"></i></a>
           </div>
         </div>
      </div>
         <!-- donation -->
         <form id="add-to-cart" action="" method="POST">
            @csrf
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-body text-center rtl_dir" id="step_one">
                  <div class="quick_card_info">الاهداء السريع</div>
                  <div class="quick_card_title mb-4">
                    تعليم القران الكريم
                    <p class="model_price"> <label for="" class="price_type">فئة السهم : </label> <span class="price_stock">100 ريال</span></p>
                  </div>
                  <div class="alert alert-danger alert-message">

                  </div>
                  <div class="alert alert-success success-message">

                  </div>
                  <div class="form-group">
                    <input type="text" id="giver-name" name="giver_name" class="form-control border_raduis_25" required placeholder="اسم المهدي"/>
                  </div>
                  <div class="form-group">
                     <input type="tel" id="giver-number" name="giver_number" class="form-control border_raduis_25" required placeholder="رقم جوال المهدي"/>
                   </div>
                   <div class="form-group">
                     <input type="email" id="giver-email" name="giver_email" class="form-control border_raduis_25" required placeholder="البريد الالكتروني"/>
                   </div>
                   <div class="form-group">
                     <input type="text" id="receiver-name" name="receiver_name" class="form-control border_raduis_25" required placeholder="اسم المهدى له"/>
                   </div>
                   <div class="form-group">
                     <input type="tel" id="receiver-number" name="receiver_number" class="form-control border_raduis_25" placeholder="رقم الجوال المهدى له"/>
                   </div>
                   <div class="form-group">
                     <input type="email" id="receiver-email" name="receiver_email" class="form-control border_raduis_25" required placeholder="بريده الالكتروني"/>
                   </div>

                  <button class="btn btn-return" type="button" data-bs-dismiss="modal"> رجوع </button>
                  <button type="button" class="btn btn-charity" id="next_step">التالي</button>
               </div>
               <div class="modal-body text-center rtl_dir hide" id="step_two">
                  <div class="quick_card_info">الاهداء السريع</div>
                  <div class="quick_card_title mb-4">
                    تعليم القران الكريم
                    <p class="model_price"> <label for="" class="price_type">فئة السهم  </label> <span class="price_stock">100 ريال</span></p>
                  </div>
                    <div class="alert alert-danger alert-message">

                    </div>
                    <div class="alert alert-success success-message">

                    </div>
                  <div class="row radio-tile-group cards_div">
                  </div>
                  <div class="mini-loading">
                     <img src="/img/mini-loading.gif">
                  </div>
               <div style="display: inline-flex">
                  <button class="btn btn-return" id="button_return" type="button"> رجوع </button>
                     @csrf
                     <input type="hidden" name="id_cart" id="id-cart" value="">
                     <input type="hidden" name="name_cart" id="name-cart" value="">
                     <input type="hidden" name="stock_cart" id="stock-cart" value="">
                     <input type="hidden" name="image_cart" id="image-cart" value="">
                     <button class="btn btn-charity submit-cart" type="button">اضافة للسلة</button>

               </div>
               </div>
            </div>
            </div>
         </div>
      </form>
@stop
