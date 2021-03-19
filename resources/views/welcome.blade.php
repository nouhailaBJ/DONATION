@extends('layouts.app')

@section('content')
   <main>
      <div class="slider-area position-relative">
         <div class="slider-active dot-style">
            <div class="single-slider hero-overly01  slider-height slider-bg2 d-flex align-items-center ">
               <div class="container">
                  <div class="row justify-content-end rtl_dir">
                     <div class="col-xxl-7 col-xl-5 col-lg-6 col-md-6 col-sm-10">
                        <div class="hero-caption text-right rtl_dir">
                           <h1 data-animation="fadeInUp" data-delay=".2s">لأنك غالي ....</h1>
                           <p class="mb-4" data-animation="fadeInUp" data-delay=".4s">إهدائك غالي وبخطوات سهلة
                           </p>
                           <a href="{{ route('cases') }}" class="btn hero-btn2 mt-4" data-animation="fadeInUp" data-delay=".8s">استعراض مشاريع الاهداء</a>
                        </div>
                     </div>
                     <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-6 col-sm-10">
                        <div class="hero-caption text-right rtl_dir">
                           <img src="{{asset('img/Scroll Group 1.png')}}" alt="" data-animation="fadeInLeft" data-delay=".10s" class="image_slider">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @foreach ($projects as $project)
            <div class="single-slider hero-overly01  slider-height slider-bg2 d-flex align-items-center ">
               <div class="container">
                  <div class="row justify-content-end rtl_dir">
                     <div class="col-xxl-7 col-xl-5 col-lg-6 col-md-6 col-sm-10">
                        <div class="hero-caption text-right rtl_dir">
                           <h1 data-animation="fadeInUp" data-delay=".2s">{{ $project->title }}</h1>
                           <P data-animation="fadeInUp" data-delay=".4s">{{ $project->desc }}</P>
                           <div class="radio-tile-group">
                              <label for="" class="price_type">فئة السهم : </label>
                              @foreach ($project->stocks as $stock)
                                 <div class="input-container">
                                 <input id="{{ $stock->price }}" value="{{ $stock->price }}" class="radio-button price{{$project->id}}" type="radio" name="price{{$project->id}}" tabindex="0">
                                 <div class="radio-tile">
                                    {{ $stock->price }} ريال
                                 </div>
                                 </div>
                              @endforeach
                              </div>
                           <a href="#" class="btn hero-btn mt-4 show_pop_up" data-animation="fadeInUp" data-delay=".8s" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id-popup="{{ $project->id }}"><i class="fas fa-gift"></i> الإهداء السريع </a>
                        </div>
                     </div>
                     <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-6 col-sm-10">
                        <div class="hero-caption text-right rtl_dir">
                           <img src="{{asset('img/Scroll Group 1.png')}}" alt="" class="image_slider" data-animation="fadeInLeft" data-delay=".10s">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
         <!-- donation -->
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-body text-center rtl_dir" id="step_one">
                  <div class="quick_card_info">الاهداء السريع</div>
                  <div class="quick_card_title mb-4">
                    تعليم القران الكريم
                    <p class="model_price"> <label for="" class="price_type">فئة السهم : </label> <span class="price_stock">100 ريال</span></p>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control border_raduis_25" placeholder="اسم المهدي"/>
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control border_raduis_25" placeholder="رقم جوال المهدي"/>
                   </div>
                   <div class="form-group">
                     <input type="text" class="form-control border_raduis_25" placeholder="البريد الالكتروني"/>
                   </div>
                   <div class="form-group">
                     <input type="text" class="form-control border_raduis_25" placeholder="اسم المهدى له"/>
                   </div>
                   <div class="form-group">
                     <input type="text" class="form-control border_raduis_25" placeholder="رقم الجوال المهدى له"/>
                   </div>
                   <div class="form-group">
                     <input type="text" class="form-control border_raduis_25" placeholder="بريده الالكتروني"/>
                   </div>
      
                  <button class="btn btn-return" type="button" data-bs-dismiss="modal"> رجوع </button>
                  <button class="btn btn-charity" id="next_step">التالي</button>
               </div>
               <div class="modal-body text-center rtl_dir hide" id="step_two">
                  <div class="quick_card_info">الاهداء السريع</div>
                  <div class="quick_card_title mb-4">
                    تعليم القران الكريم
                    <p class="model_price"> <label for="" class="price_type">فئة السهم  </label> <span class="price_stock">100 ريال</span></p>
                  </div>
                  <div class="row radio-tile-group cards_div">
                     {{-- <div class="col-md-6">
                        <div class="input-container">
                           <input id="100" value="1" class="radio-button" type="radio" name="price">
                               <div class="radio-tile radio-tile2">
                                   <img src="{{asset('img/1.jpg')}}" class="image_card">
                               </div>
                       </div>
                     </div> --}}
                     <div style="background-image: url('/img/loader.gif');"></div>
                  </div> 
               <button class="btn btn-return" id="button_return"> رجوع </button>
               <button class="btn btn-charity" >اضافة للسلة</button>
               </div>
            </div>
            </div>
         </div>
@stop