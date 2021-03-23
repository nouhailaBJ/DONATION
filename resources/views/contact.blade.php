@extends('layouts.app')
@section('content')
@section('title')
 تواصل معنا
@endsection
<main>
        <section class="section-padding text-center mt-4 rtl_dir">
            <div class="container">
               @if(session()->has('success'))
                  <div class="alert alert-success">
                     {{ session()->get('success') }}
                  </div>
               @endif
               @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                     </ul>
                  </div>
               @endif
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-5 col-md-6 col-12">
                        <h2 class="contact-title">اتصل بنا</h2>
                        <form class="form-contact contact_form" action="" method="post" novalidate="novalidate">
                           @csrf
                           <div class="row">
                              <div class="col-12">
                                 <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" type="text"  placeholder="الاسم كاملاً ">
                                 </div>
                              </div>
                              <div class="col-12">
                                 <div class="form-group">
                                    <input class="form-control valid" name="phone" id="name" type="text"  placeholder="رقم الجوال  ">
                                 </div>
                              </div>
                              <div class="col-12">
                                 <div class="form-group">
                                    <input class="form-control valid" name="email" id="name" type="email"  placeholder="البريد الإلكتروني  ">
                                 </div>
                              </div>
                              <div class="col-12" style="margin-bottom: 20px;">
                                 <div class="form-group">
                                    <select class="form-control" style="float: right;" name="cat" id="name" type="text" placeholder="القسم ">
                                       <option value="" >القسم</option>
                                       @foreach ($contact_cats as $contact_cat)
                                          <option value="{{ $contact_cat->id }}">{{ $contact_cat->name }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-12">
                                 <div class="form-group">
                                    <input class="form-control valid" name="subject" id="name" type="text"  placeholder="الموضوع ">
                                 </div>
                              </div>
                              <div class="col-12">
                                 <div class="form-group">
                                    <textarea class="form-control valid" rows="6" name="message" id="name" placeholder="نص الرسالة "></textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <button type="submit" class="btn hero-btn btn_contact">إرسال</button>
                           </div>
                         </form>
                    </div>
                            </div>
                        </div>
        </section>

@stop