@extends('layouts.app')
@section('title')
عن هديتي
@endsection

   @section('content')
   <div class="support-company-area section-padding rtl_dir">
      <div class="container">
         <div class="row align-items-center justify-content-between">
            <div class="col-xl-6">
               <div class="support-location-img text-center">
                  <img src="assets/img/logo/Asset-14x-8.png" alt="" >
                  <div class="right-caption">
                     <div class="section-tittle">
                        <h2>عن هديتي</h2>
                     </div>
                     <div class="support-caption">
                        <p>
                          {{ setting('site.about_hadyati') }}
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-6">
               <div class="support-location-img text-center">
                  <img src="assets/img/logo/Asset-14x-8.png" alt="" >
                  <div class="right-caption">
                     <div class="section-tittle">
                        <h2>الهدف </h2>
                     </div>
                     <div class="support-caption">
                        <p>
                           {{ setting('site.goals') }}
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div> 
   @include('includes.footer')
   @stop