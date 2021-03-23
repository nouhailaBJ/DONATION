@extends('layouts.app')
@section('title')
 الشروط والأحكام 
@endsection
@section('content')
<div class="section-padding mt-4 rtl_dir">
  <div class="container">
     <div class="row align-items-center justify-content-center">
       <div class="col-md-10">
         <p>
           {!! setting('site.terms_conditions') !!}
         </p>
       </div>
     </div>
  </div>
</div>
@stop