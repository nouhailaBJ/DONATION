@extends('layouts.app')
@section('title')
 الأسئلة الشائعة
@endsection
@section('content')
<main>
  <div class="section-padding rtl_dir">
    <div class="container">
       <div class="row align-items-center justify-content-between">
          <div class="col-xl-12">
             <div class="right-caption">
                <div class="section-tittle">
                   <h2>  الأسئلة الشائعة</h2>
                </div>
                <div class="accordion accordion_bg" id="accordionExample">
                  @foreach($faqs as $faq)
                    <div class="accordion_card">
                      <div  class="according_header">
                          <a class="text-right"  data-bs-toggle="collapse" href="#faqs-{{ $faq->id }}" role="button" aria-expanded="false" aria-controls="faqs-{{ $faq->id }}">
                            {{ $faq->title }}
                          </a>
                          <a class="float-left"  data-bs-toggle="collapse" href="#faqs-{{ $faq->id }}" role="button" aria-expanded="false" aria-controls="faqs-{{ $faq->id }}">
                            <i class="fas fa-arrow-circle-down violet_color"></i>
                          </a>
                      </div>
                  
                      <div class="collapse multi-collapse" id="faqs-{{ $faq->id }}">
                        <div class="card-body">
                          {{ $faq->desc }}
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
             </div>
          </div>
       </div>
    </div>
 </div> 
 @include('includes.footer')
    @stop