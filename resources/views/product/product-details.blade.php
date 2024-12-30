@extends('product.layouts.front-product')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<style>

.zoom-container {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    max-height: 450px;
}

.zoom-image {
    transition: transform 0.4s ease-in-out;
    cursor: pointer;
}

.zoom-container:hover .zoom-image {
    transform: scale(1.2); /* Adjust zoom level (1.2 = 120% size) */
}

    .product-container {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        padding: 30px;
    }

    .breadcrumb {
        background: transparent;
        padding: 0;
        font-size: 0.875rem;
    }

    .breadcrumb a {
        text-decoration: none;
        color: #007bff;
    }

    .product-image-container {
        border-radius: 10px;
        overflow: hidden;
        max-height: 450px;
        position: relative;
    }

    .product-title {
        font-size: 2rem;
        font-weight: bold;
        color: #222;
    }

    .product-price {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .product-price .text-decoration-line-through {
        color: #bbb;
        font-size: 1.2rem;
    }

    .product-price .text-success {
        font-size: 1.8rem;
        font-weight: bold;
        color: #28a745;
    }

    .savings {
        font-size: 1rem;
        color: #28a745;
        font-weight: bold;
        margin-top: 5px;
    }

    .product-description {
        color: #555;
        line-height: 1.6;
        margin-top: 10px;
        font-size: 1rem;
    }

    .product-highlights ul {
        list-style: none;
        padding-left: 0;
    }

    .product-highlights li {
        margin-bottom: 10px;
        color: #555;
        font-size: 0.95rem;
    }

    .product-highlights li i {
        color: #28a745;
        margin-right: 8px;
    }

    .btn-gradient {
        background: linear-gradient(90deg, #007bff, #0056b3);
        color: white;
        border: none;
        padding: 12px;
        border-radius: 50px;
        transition: all 0.3s ease-in-out;
        box-shadow: 0px 5px 15px rgba(0, 123, 255, 0.3);
    }

    .btn-gradient:hover {
        background: linear-gradient(90deg, #0056b3, #007bff);
        color: white;
    }

    .ratings {
        display: flex;
        align-items: center;
        margin-top: 10px;
    }

    .ratings i {
        color: #ffc107;
        margin-right: 3px;
    }

    .trust-badge {
        display: flex;
        align-items: center;
        margin-top: 15px;
        gap: 10px;
        font-size: 0.875rem;
        color: #555;
    }

    .trust-badge i {
        color: #28a745;
    }
</style>
@endsection

@section('content')
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>
</div>

<div class="container mt-5 mb-15">
    <div class="row justify-content-center">
        <div class="col-lg-10 product-container">
            <div class="row">
                <!-- Product Image Section -->
                <div class="col-md-6">
                    <div class="product-image-container zoom-container">
                        <img src="{{ $product->product_image }}" 
                             alt="{{ $product->name }}" 
                             class="img-fluid w-100 zoom-image" 
                             style="object-fit: cover;" 
                             onerror="this.onerror=null; this.src='{{ asset('front-assets/img/general/1.jpg') }}';">
                    </div>
                </div>
                

                <!-- Product Details Section -->
                <div class="col-md-6 d-flex flex-column justify-content-between">
                    <div>
                        <h1 class="product-title mb-3">{{ $product->name }}</h1>
                        <p class="text-muted mb-2">Category: <span class="fw-bold">{{ $product->category ?? 'N/A' }}</span></p>

                        <!-- Ratings Section -->
                        <div class="ratings">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <span class="ms-2">(120 Reviews)</span>
                        </div>

                        <!-- Pricing Section -->
                        <div class="product-price my-3">
                            <span class="text-decoration-line-through">₹{{ number_format($product->mrp, 2) }}</span>
                            <span class="text-success">₹{{ number_format($product->price, 2) }}</span>
                        </div>
                        <p class="savings">You Save: ₹{{ number_format($product->mrp - $product->price, 2) }}</p>

                        <!-- Description Section -->
                        <p class="product-description">{{ $product->description }}</p>

                        <!-- Highlights -->
                        @if($product->details)
                            <div class="product-highlights my-4">
                                <h5 class="mb-3">Highlights</h5>
                                <ul>
                                    @foreach(explode("\n", $product->details) as $detail)
                                        <li><i class="bi bi-check-circle-fill"></i>{{ $detail }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Trust Badge -->
                        <div class="trust-badge">
                            <i class="bi bi-shield-check"></i> 100% Secure Payments
                            <i class="bi bi-truck"></i> Free & Fast Delivery
                        </div>
                    </div>

                    <!-- Order Button -->
                    <div class="mt-4">
                        @if(Auth::guard('users')->check())
                            <a href="{{ route('checkout', ['product_id' => $product->product_id]) }}" class="btn btn-gradient w-100">
                                Order Now
                            </a>
                        @else
                            <a href="{{ route('userlogin', ['referer' => urlencode(route('checkout', ['product_id' => $product->product_id]))]) }}" class="btn btn-gradient w-100">
                                Order Now
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
