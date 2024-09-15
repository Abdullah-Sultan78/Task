

<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <li><a href="{{route('profile.show')}}"><i class="fa fa-user"></i> My Account</a></li>
                        <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                        <li><a href="{{route('show_cart')}}"><i class="fa fa-user"></i> My Cart</a></li>
                        <li><a href="{{route('checkout')}}"><i class="fa fa-user"></i> Checkout</a></li>
                        <li><a href="{{route('login')}}"><i class="fa fa-user"></i> Login</a></li>
                        <li><a href="{{route('register')}}"><i class="fa fa-user"></i> Register</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="header-right">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">BDT</a></li>
                            </ul>
                        </li>

                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">Bangla</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="{{url('/')}}"><img src="{{asset('/')}}frontend-assets/img/logo 1.jpg"></a></h1>
                </div>
            </div>
            @auth
            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="cart.html">Cart - <span class="cart-amunt">$000</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">0</span></a>
                </div>
            </div>

            @endauth

        </div>
    </div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{url('/')}}">Home</a></li>
                    <li><a href="shop.html">Shop page</a></li>
                    {{-- <li><a href="single-product.html">Single product</a></li> --}}
                    <li><a href="{{route('show_cart')}}">Cart</a></li>
                    {{-- <li><a href="checkout.html">Checkout</a></li> --}}

                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">Category</span><b class="caret"></b></a>
                             <ul class="dropdown-menu">
                                     @foreach ($categories as $category)
                                    <li><a href="#">{{$category->name}}</a></li>
                                    @endforeach
                                {{-- <li><a href="#">Mobile</a></li> --}}


                            </ul>
                        </li>

                    <li><a href="{{route('contact')}}">Contact</a></li>
                    @auth
                    {{-- <li><a href="#">Name : {{Auth::user()->name}}</a></li> --}}

                    <li class="dropdown dropdown-small">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle"
                            href="#"><span class="key">Name:</span><span class="value">{{Auth::user()->name}}
                            </span><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('profile.show')}}">Profile</a></li>
                            <li>

                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf

                                    <button type="submit" class=" ">
                                     Logout
                                    </button>
                                </form>
                                {{-- <a href="#">Logout</a> --}}
                            </li>
                        </ul>
                    </li>

                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</div>
