@extends('layouts.app')

@section('title')
التسجيل
@endsection

@section('content')
<section class=" rtl_dir text-center section-padding ">
    <form class="autorization-wrap form-contact contact_form" method="POST" action="{{ route('register') }}" >
        @csrf
        <div class="row pt-4">
            <div class="col-sm-12">
                <div class="section-tittle mb-4">
                    <h4>انضم الينا</h4>
                 </div>
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div>
            <div class="col-sm-12 mt-4">
                <div class="form-group">
                    <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = ' اسم العضو'" placeholder="اسم العضو" required>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <input class="form-control valid" name="number" id="number" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = ' رقم الجوال '" placeholder=" رقم الجوال" required>
                </div>
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
            <div class="col-sm-12 ">
                <div class="form-group">
                    <input class="form-control valid" name="password_confirmation" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = ' تأكيد كلمة المرور  '" placeholder="تاكيد كلمة المرور ">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <button type="submit" class="button button-contactForm boxed-btn ">تسجل</button>
                </div>
            </div>
        </div>
    </form>
</section>  
@stop