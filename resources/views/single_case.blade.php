@extends('layouts.app')
@section('title')
مشاريع الاهداء
@endsection

@section('content')
<main>
    <section class="blog_area single-post-area section-padding rtl_dir mt-4 ">
       <div class="container">
          <div class="row">
             <div class="col-md-12">
                <a href="{{ url()->previous() == Request::url() ? route('cases') : url()->previous() }}" class="btn return_btn mb-4" data-animation="fadeInUp" data-delay=".2s" ><i class="fas fa-arrow-right"></i> عودة </a>
             </div>
          </div>
       </div>
       <div class="container single-card">
          <div class="row">
             <div class="col-lg-8 posts-list">
                <div class="single-post">
                   <div class="blog_details">
                      <h2 style="color: #2d2d2d;">{{ $project->title }}</h2>
                      <ul class="blog-info-link mt-3 mb-4">
                         <li><a href="#"><i class="fas fa-map-marker-alt"></i> {{ $project->city->name }} </a></li>
                         <li><a href="#"><i class="far fa-clock"></i> {{ setLocale(LC_TIME, 'ar_SA') }} {{ Carbon\Carbon::now()->formatLocalized($project->created_at) }} </a></li>
                      </ul>
                      <p class="excert">
                        {{ $project->desc }}
                      </p>

                   </div>
                </div>
                <div class="navigation-top">
                   <div class="d-sm-flex justify-content-between text-center">
                      <p class="like-info"><span class="align-middle"><i class="fas fa-share-alt"></i></span> شاركها واكسب الأجر
                      </p>
                      <div class="col-sm-4 text-center my-2 my-sm-0"></div>
                      <ul class="social-icons">
                         <li><button class="a-link" data-sharer="facebook" data-hashtag="hashtag" data-url="{{ Request::url() }}"><i class="fab fa-facebook-f"></i></button></li>
                         <li><button class="a-link" data-sharer="twitter" data-title="" data-url="{{ Request::url() }}"><i class="fab fa-twitter"></i></button></li>
                         {{-- <li><button class="a-link"><i class="fab fa-instagram"></i></button></li> --}}
                         <li><button class="a-link"><i class="fab fa-telegram-plane" data-sharer="telegram" data-title="" data-url="{{ Request::url() }}"></i></button></li>
                      </ul>
                   </div>
                </div>
             </div>
             <div class="col-lg-4 text-center">
                <div class="blog_right_sidebar">
                   <aside class="single_sidebar_widget newsletter_widget">
                      <h4 class="mb-4" style="color: #2d2d2d;">عدد التبروعات المتبقي</h4>
                      <h4 class="price_project">{{ $project->required_donations }}</h4>
                      <div class="single-skill mt-4">
                           <div class="bar-progress">
                               <div id="bar1" class="barfiller">
                                   <div class="tipWrap">
                                       <span class="tip"></span>
                                   </div>
                                   <span class="fill" data-percentage="{{ $project->donations->count() / $project->required_donations * 100 }}"></span>
                               </div>
                           </div>
                       </div>
                       <h4 class="price_volonter_check">حدد مبلغ التبرع</h5>
                           <div class="radio-tile-group text-center mt-4">
                            @foreach ($project->stocks as $stock)
                                <div class="input-container">
                                    <input id="{{ $stock->price }}" value="{{ $stock->price }}" class="radio-button" type="radio" name="price">
                                    <div class="radio-tile radio_tile2">
                                        {{ $stock->price }} ريال
                                    </div>
                                </div>
                            @endforeach
                            </div>
                           <a href="#" class="btn btn-primary mt-4" data-animation="fadeInUp" data-delay=".8s" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-gift"></i> اهداء </a>
                           <a href="#" class="btn btn-dark  mt-4" data-animation="fadeInUp" data-delay=".8s" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-share"></i> تبرع </a>
                           <div class="frmaster-payment-credit-card-type">
                               <img src="https://demo.goodlayers.com/chariti/demo3/wp-content/plugins/fundraisemaster/images/payment/visa.png" alt="visa">
                               <img src="https://demo.goodlayers.com/chariti/demo3/wp-content/plugins/fundraisemaster/images/payment/master-card.png" alt="master-card">
                               <img src="https://demo.goodlayers.com/chariti/demo3/wp-content/plugins/fundraisemaster/images/payment/american-express.png" alt="american-express">
                               <img src="https://demo.goodlayers.com/chariti/demo3/wp-content/plugins/fundraisemaster/images/payment/jcb.png" alt="jcb">
                           </div>
                   </aside>
                </div>
             </div>
          </div>
       </div>
    </section>
    @if (count($similar) > 0)
        <div class="services-area1 mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-2">
                            <h5>مشاريع اهداء  مشابهة</h5>
                        </div>
                    </div>
                </div>
                <div class=" services1-active pt-0 mt-0">
                    @foreach ($similar as $item)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card_donation_padd">
                                <div class="card card_donation card_donation_single">
                                    <div class="img_donation" style="background-image: url('{{ $item->image }}');">
                                        <div class="donation_category">
                                            <div class="propose-tabs">
                                                <button type="button" class="propose-tabs__btn"> {{ $item->category->name }} </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-wrapper">
                                        <div class="properties-caption">
                                            <h3 class="text-center">
                                                <a href="#" tabindex="-1" >{{ $item->title }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
   <div class="container footer2 rtl_dir " id="footer_all">
       <div class="footer_all text-left">
          <a href="#" class="btn hero-btn"  data-animation="fadeInUp" data-delay=".8s"><i class="far fa-question-circle"></i> الدعم</a>
       </div>
    </div>
 </main>
@stop
