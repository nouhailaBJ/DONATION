<!doctype html>
<html class="no-js" lang="ar">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>جمعية تحفيظ الليث</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/icon/favicon.png')}}">
      <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/slicknav.css')}}">
      <link rel="stylesheet" href="{{asset('css/progressbar_barfiller.css')}}">
      <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
      <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
      <link rel="stylesheet" href="{{asset('css/slick.css')}}">
      <link rel="stylesheet" href="{{asset('css/style.css')}}">
      @csrf
   </head>
   <body>
        <div class="preloader" style="background-image: url({{asset('img/loader.gif')}});"></div>
      <header class="header_main">
         <div class="header-area">
            <div class="main-header ">
               <div class="header-bottom  header-sticky">
                  <div class="container-fluid">
                     <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                           <div class="logo">
                              <a href="{{ route('home') }}"> <img class="logo_image" src="{{asset('img/logo/logoo.png')}}" alt=""></a>
                           </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                           <div class="main-menu f-left d-none d-lg-block">
                              <nav>
                                 <ul id="navigation">
                                    <li><a href="{{route('home')}}">الرئيسية</a></li>
                                    <li><a href="{{route('about-us')}}">عن هديتي</a></li>
                                    <li><a href="{{route('cases')}}">مشاريع الاهداء</a></li>
                                    <li><a href="{{route('faq')}}">الأسئلة الشائعة</a></li>
                                    <li><a href="{{route('contact')}}">اتصل بنا</a></li>
                                    <li><a href="{{route('terms')}}">الشروط والأحكام</a></li>
                                    <li><a href="{{route('profile')}}"><i class="fa fa-bars"></i> <i class="far fa-user"></i></a>
                                      <ul class="submenu">
                                        <li><a href="{{route('profile')}}">بروفايلي</a></li>
                                        <li><a href="">تسجيل الخروج</a></li>
                                      </ul>
                                    </li>
                                    <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i><span class="badge badge_shopping">0</span></a></li>
                                 </ul>
                              </nav>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>

      <main>
        @yield('content')


      <div class="container footer rtl_dir d-flex justify-content-between flex-wrap align-items-center" id="footer_all">
               <div class="footer_all">
                  <a href="#" class="btn hero-btn"  data-animation="fadeInUp" data-delay=".8s"><i class="far fa-question-circle"></i> الدعم</a>
               </div>
               <div class="footer_text">
                  <span>جميع الحقوق محفوظة لموقع هديتي | تحفيظ الليث 2021</span>
               </div>
              <div class="footer-social">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
              </div>
            </div>
         </div>
      </main>
   
      <!-- <div id="back-top">
         <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
      </div> -->
      <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>
      <script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
      <script src="{{asset('js/popper.min.js')}}"></script>
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
      <script src="{{asset('js/owl.carousel.min.js')}}"></script>
      <script src="{{asset('js/slick.min.js')}}"></script>
      <script src="{{asset('js/jquery.slicknav.min.js')}}"></script>
      <script src="{{asset('js/wow.min.js')}}"></script>
      <script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
      <!-- <script src="{{asset('js/jquery.nice-select.min.js')}}"></script> -->
      <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
      <script src="{{asset('js/waypoints.min.js')}}"></script>
      <script src="{{asset('js/barfiller.js')}}"></script>
      <script src="{{asset('js/contact.js')}}"></script>
      <script src="{{asset('js/jquery.form.js')}}"></script>
      <script src="{{asset('js/jquery.validate.min.js')}}"></script>
      <script src="{{asset('js/mail-script.js')}}"></script>
      <script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
      <script src="{{asset('js/plugins.js')}}"></script>
      <script src="{{asset('js/main.js')}}"></script>
      <script>
         
      </script>
   </body>
</html>