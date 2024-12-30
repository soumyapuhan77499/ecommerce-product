@extends('product.layouts.front-product')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<style>

.product-card {
    height: 100%;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
}
.product-image-container {
    overflow: hidden;
    border-bottom: 1px solid #f1f1f1;
}
.product-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
}
.product-image-container:hover .product-image {
    transform: scale(1.1);
}
.product-description {
    overflow: hidden;
    text-overflow: ellipsis;
    word-break: break-word;
    line-height: 1.2em;
}
.read-more {
    cursor: pointer;
}

.product-card {
    border-radius: 15px;
    overflow: hidden;
    background: linear-gradient(135deg, #ffffff, #f9f9f9);
    transition: transform 0.3s, box-shadow 0.3s;
    border: none;
    padding-bottom: 25px;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
    /* height: 770px; */
}
.product-car_cust {
    border-radius: 15px;
    overflow: hidden;
    background: linear-gradient(135deg, #ffffff, #f9f9f9);
    transition: transform 0.3s, box-shadow 0.3s;
    border: none;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
    padding: 40px;
}

.product-image-container {
    position: relative;
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    height: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #f0f0f0; /* Subtle background for premium feel */
}

.product-image-container img {
    max-height: 100%;
    max-width: 100%;
    object-fit: cover;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 15px;
}

.product-image-container img:hover {
    transform: scale(1.1);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

.product-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333;
}

.product-description {
    color: #555;
    font-size: 1rem;
    margin-top: 10px;
}

.product-price {
    font-size: 1.25rem;
    font-weight: bold;
    color: #28a745;
    margin-top: 15px;
}

.btn-gradient {
    background: linear-gradient(90deg, #f39c12, #f1c40f);
    color: #fff;
    border: none;
    padding: 10px 15px;
    font-size: 1rem;
    text-transform: uppercase;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.btn-gradient:hover {
    background: linear-gradient(90deg, #d35400, #e67e22);
}

.premium-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    background: linear-gradient(90deg, #f39c12, #f1c40f);
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 0.8rem;
    font-weight: bold;
    text-transform: uppercase;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
}

.text-decoration-line-through {
    text-decoration: line-through; /* Strikethrough for the MRP */
    color: #aaa; /* Light grey for the crossed-out MRP */
}

/* 
.product-card:hover {
    transform: translateY(-10px) scale(1.03);
} */


.badge-sale {
    top: 10px;
    left: 10px;
    background-color: #ff5c5c;
    color: #fff;
    padding: 5px 10px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: bold;
}

.card-body {
    padding: 20px;
}

.product-title {
    font-size: 18px;
    font-weight: bold;
    color: #333;
    margin-bottom: 15px;
}

.product-description {
    color: #777;
    font-size: 14px;
    margin-bottom: 15px;
}

.product-price {
    font-size: 20px;
    color: #B90B0B;
    font-weight: bold;
    margin-bottom: 10px;
}

.btn-gradient {
    background: linear-gradient(90deg, #B90B0B, #feb47b);
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 30px;
    transition: background 0.3s;
    letter-spacing: 1px
}
.flower-package-heading h1{
  color: #000;
  text-align: center;
 
  letter-spacing: 1px;
}
.secure-payment p {
    display: flex;
    align-items: center;
    margin: 5px 0;
    font-size: 0.9rem;
    
}

.secure-payment i {
    margin-right: 5px;
    color: #007bff;
}


</style>
@endsection

@section('content')
    

<section class="" style="margin-top: -17px;">
  <div class="">
    <!-- Home Banner Section -->
    <div class="home-banner-section">
      <div id="homeBannerCarousel" class="owl-carousel owl-theme">
        @foreach ($banners as $banner)
          <div class="item">
            <img src="{{ asset('front-assets/img/general/Website_Banner_final_3.webp')}}" class="img-fluid d-block w-100">
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row" style="margin-top: 30px;">
      <div class="col-md-12">
        <div class="flower-package-heading">
          <h1>Customized Flower</h1>
          <img src="{{ asset('front-assets/img/general/hr.png')}}" alt="" class="border-bottom-img">
        </div>
      
      </div>
    </div>
  
    <div class="row" style="margin-top: 20px; margin-bottom: 140px;">
      @if($customizedpps->isNotEmpty())
          @foreach($customizedpps as $customizedpp)
          <div class="product-car_cust row shadow-lg position-relative">
              <div class="col-md-3 mb-4">
                  <div class="product-image-container">
                      <img 
                          src="{{$customizedpp->product_image }}" 
                          alt="{{ $customizedpp->name }}" 
                          class="product-image"
                          onerror="this.onerror=null; this.src='{{ asset('front-assets/img/general/1.jpg') }}';"
                      >
                      <div class="premium-icon">Premium</div>
                  </div>
              </div>
              <div class="col-md-9">
                  <div class="card-body">
                      <h5 class="product-title">{{ $customizedpp->name }}</h5>
                      <p class="product-description">
                          <i class="premium-icon" style="font-size: 14px; vertical-align: middle;">&#9733;</i> 
                          {{ $customizedpp->description }}
                      </p>
                      <p class="product-price">{{ $customizedpp->immediate_price }}</p>
  
                      <div class="secure-payment" style="margin-bottom: 20px;">
                          <p style="margin: 0; font-size: 0.9rem; color: #28a745;">
                              <i class="fas fa-lock"></i> 100% Secure
                          </p>
                          <p style="margin: 0; font-size: 0.9rem; color: #007bff;">
                              <i class="fas fa-wallet"></i> Easy Payment
                          </p>
                      </div>
                      
                      @if(Auth::guard('users')->check())
                          <a href="{{ route('cutsomized-checkout', ['product_id' => $customizedpp->product_id]) }}" class="btn btn-gradient w-100">
                              Order Now
                          </a>
                      @else
                          <a href="{{ route('userlogin', ['referer' => urlencode(route('cutsomized-checkout', ['product_id' => $customizedpp->product_id]))]) }}" class="btn btn-gradient w-100">
                              Order Now
                          </a>
                      @endif
                  </div>
              </div>
          </div>
          @endforeach
      @else
          <p class="text-center">No products available at the moment.</p>
      @endif
  </div>
  
  </div>
</section>
 
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="flower-package-heading">
          <h1>Product Package</h1>
          <img src="{{ asset('front-assets/img/general/hr.png')}}" alt="" class="border-bottom-img">
        </div>
      </div>
    </div>
  
    <div class="row" style=" margin-bottom: 140px;">
      @if($products->isNotEmpty())
          @foreach($products as $product)
              <div class="col-md-4 mb-4">
                  <div class="product-card shadow-lg position-relative d-flex flex-column">
                    <a href="{{ route('product.productdetails', ['slug' => $product->slug]) }}" class="product-link">

                          <div class="product-image-container">
                              <img src="{{ $product->product_image }}" 
                                   alt="{{ $product->name }}" 
                                   class="product-image"
                                   onerror="this.onerror=null; this.src='{{ asset('front-assets/img/general/1.jpg') }}';">
                          </div>
                      </a>
                      <div class="card-body text-center flex-grow-1 d-flex flex-column">
                          <h5 class="product-title mb-2">{{ $product->name }}</h5>
                          <p class="product-description text-truncate" style="max-height: 3.6em;" data-description="{{ $product->description }}">
                              {{ \Illuminate\Support\Str::limit($product->description, 80) }}
                          </p>
                          <button class="btn btn-link p-0 text-primary read-more" style="display: none;">Read More</button>
                          <p class="product-price mt-auto">
                              <span class="text-decoration-line-through text-muted">₹ {{ number_format($product['mrp'], 2) }}</span> 
                              <span class="text-success">₹ {{ number_format($product['price'], 2) }}</span>
                          </p>
                          @if(Auth::guard('users')->check())
                              <a href="{{ route('checkout', ['product_id' => $product->product_id]) }}" class="btn btn-gradient w-100 mt-2">
                                  Order Now
                              </a> 
                          @else
                              <a href="{{ route('userlogin', ['referer' => urlencode(route('checkout', ['product_id' => $product->product_id]))]) }}" class="btn btn-gradient w-100 mt-2">
                                  Order Now
                              </a>
                          @endif
                      </div>
                  </div>
              </div>
          @endforeach
      @else
          <p class="text-center">No products available at the moment.</p>
      @endif
  </div>
  
  </div>
</section>

    <section class="testimonial-bg">
        <div data-anim-wrap class="container">
          <div  class="row justify-center text-center">
            <div class="col-auto">
              <div class="sectionTitle text-white">
                <h2 class="sectionTitle__title">Blessed Reviews</h2>
                <p class=" sectionTitle__text mt-5 sm:mt-0">Hear from our happy devotees who made their rituals extraordinary with 33crores!</p>
              </div>
            </div>
          </div>
  
          <div  class="overflow-hidden pt-60 lg:pt-40 sm:pt-30 js-section-slider" data-gap="30" data-slider-cols="xl-3 lg-3 md-2 sm-1 base-1">
            <div class="swiper-wrapper">
  
              <div class="swiper-slide">
                <div class="testimonials -type-1 bg-white rounded-4 pt-40 pb-30 px-40">
                  
                  <p class="testimonials__text lh-18 fw-500 text-dark-1">33crores has transformed my pooja preparations! The customized flower subscription is a blessing – fresh, vibrant, and delivered on time. It saves me the hassle of last-minute shopping and keeps my rituals stress-free. Truly a divine experience!</p>
  
                  <div class="pt-20 mt-28 border-top-light">
                    <div class="row x-gap-20 y-gap-20 items-center">
                      {{-- <div class="col-auto">
                        <img class="size-60" src="img/avatars/1.png" alt="image">
                      </div> --}}
  
                      <div class="col-auto">
                        <div class="text-15 fw-500 lh-14">— Anuradha Mohanty</div>
                        {{-- <div class="text-14 lh-14 text-light-1 mt-5">Web Designer</div> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
              <div class="swiper-slide">
                <div class="testimonials -type-1 bg-white rounded-4 pt-40 pb-30 px-40">
                  
                  <p class="testimonials__text lh-18 fw-500 text-dark-1">33crores has transformed my pooja preparations! The customized flower subscription is a blessing – fresh, vibrant, and delivered on time. It saves me the hassle of last-minute shopping and keeps my rituals stress-free. Truly a divine experience!</p>
  
                  <div class="pt-20 mt-28 border-top-light">
                    <div class="row x-gap-20 y-gap-20 items-center">
                      {{-- <div class="col-auto">
                        <img class="size-60" src="img/avatars/1.png" alt="image">
                      </div> --}}
  
                      <div class="col-auto">
                        <div class="text-15 fw-500 lh-14">— Vishal Behera</div>
                        {{-- <div class="text-14 lh-14 text-light-1 mt-5">Web Designer</div> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
              <div class="swiper-slide">
                <div class="testimonials -type-1 bg-white rounded-4 pt-40 pb-30 px-40">
                  
                  <p class="testimonials__text lh-18 fw-500 text-dark-1">33crores has transformed my pooja preparations! The customized flower subscription is a blessing – fresh, vibrant, and delivered on time. It saves me the hassle of last-minute shopping and keeps my rituals stress-free. Truly a divine experience!</p>
  
                  <div class="pt-20 mt-28 border-top-light">
                    <div class="row x-gap-20 y-gap-20 items-center">
                      {{-- <div class="col-auto">
                        <img class="size-60" src="img/avatars/1.png" alt="image">
                      </div> --}}
  
                      <div class="col-auto">
                        <div class="text-15 fw-500 lh-14">— Madhuchanda Das</div>
                        {{-- <div class="text-14 lh-14 text-light-1 mt-5">Web Designer</div> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
            
  
            </div>
          </div>
  
         
        </div>
    </section>

  {{--cta---}}
  <div class="section-cta-custom pt-0">
    <div class="container">
    <div class="section-title text-center">
    <p class="subtitle">How We Can Assist</p>
    <h4 class="title">We Are Ready To Assist    </h4>
    </div>
    <div class="row align-items-center position-relative">
      <div class="col-md-6">
        <div class="sigma_cta primary-bg">
          {{-- <img class="cta-left-img" src="{{ asset('front-assets/img/4ebcc66a-bcc1-429f-8ef1-6040ae9f369d-removebg-preview.png')}}" alt="cta"> --}}
          <div class="sigma_cta-content" style="    padding: 40px 40px 40px 148px;">
           
            <h4 class="text-white">+91 9776888887</h4>
          </div>
        </div>
      </div>
      <span class="sigma_cta-sperator d-lg-flex">or</span>
      <div class="col-md-6">
        <div class="sigma_cta primary-bg1">
          <div class="sigma_cta-content" style="padding: 40px 40px 40px 90px;">
            <h4 class="text-white">contact@33crores.com</h4>
          </div>
          {{-- <img class="cta-left-img" src="{{ asset('front-assets/img/4ebcc66a-bcc1-429f-8ef1-6040ae9f369d-removebg-preview.png')}}" alt="cta"> --}}

        </div>
      </div>
    </div>

  </div>
</div>


  
  <section class="pt-60 custmer-count">
    <div class="container">
        <div class=" pb-40">
            <div class="row justify-center text-center" style="margin-top: 30px">

                <div class="col-xl-3 col-6">
                    <img src="{{ asset('images/1.png') }}" alt="image" width="50%">
                    {{-- <div class="text-40 lg:text-30 lh-13 fw-600 counter">101</div> --}}
                    <div class="text-14 lh-14 text-light-1 mt-5 " style="text-transform: capitalize;font-size: 18px !important;
    letter-spacing: 1px; ">Freshness Guaranteed</div>
                </div>

                <div class="col-xl-3 col-6">
                  <img src="{{ asset('images/2.png') }}" alt="image" width="50%">
                    {{-- <div class="text-40 lg:text-30 lh-13 fw-600 counter">791</div> --}}
                    <div class="text-14 lh-14 text-light-1 mt-5" style="text-transform: capitalize; font-size: 18px !important;
    letter-spacing: 1px;">Customizable Plans</div>
                </div>

                <div class="col-xl-3 col-6">
                  <img src="{{ asset('images/3.png') }}" alt="image" width="50%">
                    {{-- <div class="text-40 lg:text-30 lh-13 fw-600 counter">121</div> --}}
                    <div class="text-14 lh-14 text-light-1 mt-5" style="text-transform: capitalize;font-size: 18px !important;
    letter-spacing: 1px; ">Timely Delivery</div>
                </div>

                <div class="col-xl-3 col-6">
                  <img src="{{ asset('images/4.png') }}" alt="image" width="50%">
                    {{-- <div class="text-40 lg:text-30 lh-13 fw-600 counter">1491</div> --}}
                    <div class="text-14 lh-14 text-light-1 mt-5" style="text-transform: capitalize;font-size: 18px !important;
    letter-spacing: 1px; ">Eco-Friendly Packaging</div>
                </div>

            </div>
        </div>
    </div>
</section>
    <section class="section-bg pt-80 pb-80 md:pt-40 md:pb-40">


        <div class="container">
            <div class="row y-gap-30 items-center justify-between">
                <div  class="col-xl-5 col-lg-6" data-aos="fade-up" data-aos-delay="500">
                    <h2 class="text-30 lh-15">Download the App</h2>
                    <p class="text-dark-1 pr-40 lg:pr-0 mt-15 sm:mt-5">Simplify your spiritual rituals with our Fresh Pooja Flower Subscription App! Enjoy hassle-free access to fresh, handpicked flowers delivered straight to your doorstep. Personalize your subscription, track deliveries, and stay connected to tradition with ease. Download now and bring devotion to your fingertips!</p>

                    <div class="row y-gap-20 items-center pt-30 sm:pt-10">
                        <div class="col-auto">
                            <div class="d-flex items-center px-20 py-10 rounded-8 border-white-15 text-white bg-dark-3">
                                <div class="icon-apple text-24"></div>
                                <div class="ml-20">
                                    <div class="text-14">Download on the</div>
                                    <div class="text-15 lh-1 fw-500">Apple Store</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-auto" >
                            <a href="https://play.google.com/store/apps/details?id=com.croresadmin.shopifyapp"
                                target="_blank"
                                class="d-flex items-center px-20 py-10 rounded-8 border-white-15 text-white bg-dark-3">
                                <div class="icon-play-market text-24"></div>
                                <div class="ml-20">

                                    <div class="text-14">Get in on</div>
                                    <div class="text-15 lh-1 fw-500">Google Play</div>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div  class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
                    <img src="{{ asset('images/download.png') }}" alt="image">
                </div>
            </div>
        </div>
    </section>


   
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/counterup2@1.0.4/dist/index.min.js"></script>
<script>
    $(document).ready(function(){
        $('.counter').counterUp({
            delay: 20, // increased delay
            time: 2000 // increased time
        });
    });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
      const readMoreToggle = document.querySelector('.read-more-toggle');
      const shortDescription = document.querySelector('.short-description');
      const fullDescription = document.querySelector('.full-description');
      
      readMoreToggle.addEventListener('click', function() {
          if (fullDescription.style.display === 'none') {
              fullDescription.style.display = 'block';
              readMoreToggle.textContent = 'Read less';
          } else {
              fullDescription.style.display = 'none';
              readMoreToggle.textContent = 'Read more';
          }
      });
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
  
$(document).ready(function(){
  // Initialize Owl Carousel for Home Banner
  $('#homeBannerCarousel').owlCarousel({
    loop: true,           // Enable looping
    margin: 10,           // Add margin between slides
    nav: false,            // Enable next/prev buttons
    autoplay: true,       // Enable auto slide
    autoplayTimeout: 2000, // Auto slide timeout (5 seconds)
    autoplayHoverPause: true, // Pause on hover
    items: 1,             // Display one item per slide
    dots: false,           // Enable dots navigation
    animateOut: 'fadeOut', // Add fade out effect when transitioning between slides
    animateIn: 'fadeIn'   // Add fade in effect for incoming slides
  });
});

</script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('.product-description').forEach(desc => {
          const fullText = desc.getAttribute('data-description');
          if (fullText.length > 80) {
              const readMoreBtn = desc.nextElementSibling;
              readMoreBtn.style.display = 'inline';
              readMoreBtn.addEventListener('click', () => {
                  desc.textContent = fullText;
                  readMoreBtn.style.display = 'none';
              });
          }
      });
  });
  </script>
  
@endsection