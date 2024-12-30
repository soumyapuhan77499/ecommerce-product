<div class="header-margin"></div>
<header data-add-bg="" class="header shadow-3 js-header" data-x="header" data-x-toggle="is-menu-opened" style="    background-color: #fff !important;">
  <div data-anim="" class="header__container header__container-1500 mx-auto px-30 sm:px-20">
    <div class="row justify-between items-center">

      <div class="col-auto">
        <div class="d-flex items-center">
          <a href="{{url('/')}}" class="header-logo mr-50" data-x="header-logo" data-x-toggle="is-logo-dark">
            <img src="{{asset('front-assets/img/brand/Logo_Black.png')}}" alt="image" >
            <img src="{{asset('front-assets/img/brand/Logo_Black.png')}}" alt="image" >
          </a>


          <div class="header-menu " data-x="mobile-menu" data-x-toggle="is-menu-active">
            <div class="mobile-overlay"></div>

            <div class="header-menu__content">
              <div class="mobile-bg js-mobile-bg"></div>

              <div class="menu js-navList">
                <ul class="menu__nav -is-active" style="color:#000">
                 
                  <li>
                    <a data-barba href="https://www.33crores.com/">
                      <span class="mr-10">Home</span>
                    </a>
                  </li>
                  <li>
                    <a data-barba href="https://pandit.33crores.com/">
                      <span class="mr-10">Book Pandit</span>
                    </a>
                  </li>
                  <li>
                    <a data-barba href="https://podcast.33crores.com/">
                      <span class="mr-10">Podcast</span>
                    </a>
                  </li>
                  <li>
                    <a data-barba href="https://poojastore.33crores.com/">
                      <span class="mr-10">Shop</span>
                    </a>
                  </li>


                  {{-- <li>
                    <a data-barba href="{{url('pandit-list')}}">
                      <span class="mr-10">Book Pandit</span>
                    </a>
                  </li>
                     <li>
                    <a data-barba href="{{url('pooja-list')}}">
                       Pooja List
                    </a>
                  </li> --}}
                  {{-- <li class="d-none xl:d-flex">
                    <a href="{{route('panditlogin')}}" class="button px-10 fw-300 -blue-1 h-50 " style="   font-size: 15px;
                  color: #000;
                 text-transform: uppercase;" ><i class="d-flex items-center icon-user text-inherit text-21 mx-10" style="margin-right: 7px;"></i> Pandit Login</a>
          
                  </li> --}}
                  {{-- <li>
                    <a href="book-temple-sevayat-name.html">
                       Panji
                    </a>
                  </li> --}}
          
                  {{-- <li>
                    <a href="{{url('about-us')}}">About Us</a>
                  </li>
                  
                  <li>
                    <a href="{{url('contact')}}">Contact</a>
                  </li> --}}
                  {{-- <li class="menu-item-has-children">
                    <a data-barba href="#">
                      <i class="d-flex items-center icon-user text-inherit text-18 mx-10" style="margin-right: 7px;"></i>
                      Dashboard
                      <i class="icon icon-chevron-sm-down" style="margin-left: 7px;"></i>
                    </a>

                    <ul class="subnav">
                      <li class="subnav__backBtn js-nav-list-back">
                        <a href="#"><i class="icon icon-chevron-sm-down"></i></a>
                      </li>

                      <li><a href="{{url('my-profile')}}">My profile</a> </li>

                      <li><a href="{{url('order-history')}}">Manage Address</a></li>

                      <li><a href="{{url('manage-address')}}">Orders</a></li>

                      <li><a href="{{url('coupons')}}">Coupons</a></li>

                      <li><a href="#">Logout</a></li>

                      

                    </ul>
                    

                  </li> --}}

                 
                </ul>

              </div>

              <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer">
              </div>
            </div>
          </div>

          



        </div>
      </div>


      <div class="col-auto" >
        <div class="d-flex items-center">
          <div class="d-flex items-center ml-20 is-menu-opened-hide md:d-none">
            <div class="searchMenu-loc js-form-dd js-liverSearch">
              @auth('users')
              <div data-x-dd-click="searchMenu-loc">
                  <div class="button px-10 fw-300 -blue-1 h-50" style="font-size: 15px; color: #000; text-transform: uppercase;">
                      <i class="d-flex items-center icon-user text-inherit text-21 mx-10" style="margin-right: 7px;"></i>
                      {{ Auth::guard('users')->user()->name ?: Auth::guard('users')->user()->mobile_number }} <i class="icon-chevron-sm-down text-7 ml-10"></i>
                  </div>
              </div>
              <div class="searchMenu-loc__field shadow-2 js-popup-window" data-x-dd="searchMenu-loc" data-x-dd-toggle="-is-active" style="margin-left: -76px;">
                  <div class="bg-white sm:px-0 sm:py-15 rounded-4 text-center">
                      <div class="y-gap-5 js-results">
                         
                          <div class="text-center js-search-option">
                            <a href="{{ route('subscription.history') }}">Manage Subscription <br>History</a>
                          </div>
                          <div class="text-center js-search-option">
                              <a href="{{ url('manage-user-address') }}">Manage Address</a>
                          </div>
                          <div class="text-center js-search-option">
                            <a href="{{ route('user.userprofile') }}">My Account</a>
                          </div>
                          <div class="text-center js-search-option">
                              <a href="{{ route('userlogout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                              <form id="logout-form" action="{{ route('userlogout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          @else
              <div data-x-dd-click="searchMenu-loc">
                  <a href="{{ route('userlogin') }}">
                      <div class="button px-10 fw-300 -blue-1 h-50" style="font-size: 15px; color: #000; text-transform: uppercase;">
                          <i class="d-flex items-center icon-user text-inherit text-21 mx-10" style="margin-right: 7px;"></i>Login
                      </div>
                  </a>
              </div>
          @endauth
          

          </div>
          
             
        
             
            </div>

          <div class="d-none xl:d-flex x-gap-20 items-center pl-30" data-x="header-mobile-icons" data-x-toggle="text-white">
            <div>
              
              <div class="dropdown">
                <button class="dropbtn">
                  
                  <a href="#" class="d-flex items-center icon-user text-inherit text-22"></a></button>
                @auth('users')
                <div class="dropdown-content">
                  <ul class="menu-list list-unstyled mb-0 text-start">
                      <li class="menu-item py-2">
                          <a href="{{ route('subscription.history') }}" class="menu-link d-block px-3 py-2 text-decoration-none text-dark rounded-2 hover:bg-light">Manage Subscription History</a>
                      </li>
                      <li class="menu-item py-2">
                          <a href="{{ url('manage-user-address') }}" class="menu-link d-block px-3 py-2 text-decoration-none text-dark rounded-2 hover:bg-light">Manage Address</a>
                      </li>
                      <li class="menu-item py-2">
                          <a href="{{ route('user.userprofile') }}" class="menu-link d-block px-3 py-2 text-decoration-none text-dark rounded-2 hover:bg-light">My Account</a>
                      </li>
                      <li class="menu-item py-2">
                          <a href="{{ route('userlogout') }}" class="menu-link d-block px-3 py-2 text-decoration-none text-danger rounded-2 hover:bg-light"
                             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                          <form id="logout-form" action="{{ route('userlogout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </li>
                  </ul>
              </div>
              
                @else
                <div class="dropdown-content">
                  <a href="{{ route('userlogin') }}">
                    <div class="button px-10 fw-300 -blue-1 h-50" style="font-size: 15px; color: #000; text-transform: uppercase;">
                        <i class="d-flex items-center icon-user text-inherit text-21 mx-10" style="margin-right: 7px;"></i>Login
                    </div>
                </a>
                </div>
                @endauth
              </div>
            </div>
            <div><button class="d-flex items-center icon-menu text-inherit text-20" data-x-click="header, header-logo, header-mobile-icons, mobile-menu"></button></div>
          </div>
        </div>
      </div>

    </div>
  </div>
</header>
