@extends('layouts.app')

@section('content')
<div  class="site-cover site-cover-sm same-height overlay single-page" style="margin-top: -25px; background-image: url('{{ asset('assets/images/white.jpg')}}')">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-6">
                <div class="post-entry text-center">
                    <h1 class="mb-4">About Us</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section sec-halfs py-0">
    <div class="container">
        <div class="half-content d-lg-flex align-items-stretch">
            <div class="img" style="background-image: url('{{ asset('assets/images/hero_4.jpg')}}')" data-aos="fade-in" data-aos-delay="100">
                
            </div>
            <div class="text">
                <h2 class="heading text-primary mb-3">Resources for makers and creatives</h2>
                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                <p><a href="#" class="btn btn-outline-primary py-2">Read more</a></p>
            </div>
        </div>

        <div class="half-content d-lg-flex align-items-stretch">
            <div class="img order-md-2" style="background-image: url('{{ asset('assets/images/hero_1.jpg')}}')" data-aos="fade-in">
                
            </div>
            <div class="text">
                <h2 class="heading text-primary mb-3">We are trusted by more than 5,000 clients</h2>
                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                <p><a href="#" class="btn btn-outline-primary py-2">Read more</a></p>
            </div>
        </div>
    </div>

</div>

<div class="section sec-features">
    <div class="container">
        <div class="row g-5">
            <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
               
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
             
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
             
            </div>
        </div>
    </div>
</div>


<div class="section">
    <div class="container">
        
        <div class="row mb-5">
            <div class="col-lg-5 mx-auto text-center" data-aos="fade-up">
                <h2 class="heading text-primary">Our Team</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 mb-4 text-center" data-aos="fade-up" data-aos-delay="0">
                <img src="{{ asset('assets/images/person_1.jpg')}}" alt="Image" class="img-fluid w-50 rounded-circle mb-3">
                <h5 class="text-black">James Griffin</h5>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
            </div>
         
        </div>

    </div>
</div>



<div class="section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <img src="images/img_7_sq.jpg" alt="Image" class="img-fluid rounded
                ">
            </div>
         

        </div>
    </div>
</div>
@endsection