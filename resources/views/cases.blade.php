@extends('layouts.app')

   @section('content')

   <main>
        <section class="section-padding rtl_dir">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title text-center mb-4">مشاريع الاهداء </h2>
                    </div>
                    <div class="col-lg-12 mt-4">
                        <div class="row">
                            @foreach($projects as $project)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="card_donation_padd">
                                            <div class="card card_donation">
                                                <div class="img_donation" style="background-image: url('{{ $project->image }}');">
                                                    <div class="donation_category">
                                                        <div class="propose-tabs">
                                                            <button type="button" class="propose-tabs__btn"> cat </button>
                                                        </div>
                                                    </div>                                       
                                                </div> 
                                                <div class="wrap-wrapper">
                                                    <div class="properties-caption">
                                                        <h3 class="text-center">
                                                            <a href="#" tabindex="-1" >{{ $project->name }}</a>
                                                        </h3>
                                                        <p>
                                                            {{ $project->desc }}
                                                        </p>
                                                    </div>
                                                    <div class="properties-footer d-flex justify-content-between align-items-center">
                                                        <div class="class-day">
                                                            <a href="#" class="button_case" tabindex="-1"><i class="fas fa-gift"></i></a>
                                                        </div>
                                                        <div class="class-day">
                                                            <a href="#" class="button_case" tabindex="-1"><i class="fas fa-share-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                
                                    </div>
                            @endforeach
                    </div>
                </div>
                {{ $projects->links() }}
            </div>
        </section>

    @stop