@extends('layouts.app')

@section('title')
تسجيل الدخول
@endsection

@section('content')
<section class=" rtl_dir text-center section-padding ">
    <form class="autorization-wrap form-contact contact_form" method="POST" action="{{ route('login') }}" >
        @csrf
        <div class="row pt-4">
            <div class="col-sm-12">
                <div class="section-tittle mb-4">
                    <h4>مرحبا بك . سجل دخولك </h4>
                 </div>
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = ' بريدك الالكتروني'" placeholder=" بريدك الالكتروني" required>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <input class="form-control valid" name="password" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'كلمة المرور '" placeholder="كلمة المرور  " required>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <button type="submit" class="button button-contactForm boxed-btn ">سجل دخولك</button>
                </div>
            </div>
        </div>
    </form>
</section>  
@stop