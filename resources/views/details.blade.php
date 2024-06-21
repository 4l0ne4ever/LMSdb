<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>Liberty NFT Marketplace - HTML CSS Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-liberty-market.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--
</head>
<body>
         <!-- ***** Preloader Start ***** -->
 <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{url('/')}}" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{url('/')}}" >Home</a></li>
                        <li><a href="{{url('explore')}}">Explore</a></li>
                        <li><a href="{{ route('showBorrow') }}">Book Borrowing</a></li>
                        <li><a href="author.html">Author</a></li>
                        <li><a href="{{url('donate')}}" class="active">Donate</a></li>
                        @if (Route::has('login'))
                            
                                @auth
                                  <x-app-layout></x-app-layout>
                                @else  
                                <li><a href="{{ route('login') }}">Login</a></li>
                                    @if (Route::has('register'))
                                      <li><a href="{{ route('register') }}">Register</a></li>
                                    @endif
                                @endauth
                            
                        @endif
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
    
  <div class="item-details-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>Apply For <em>Your Book</em> Here.</h2>
          </div>
        </div> 
        <div class="col-lg-12">
          <form id="contact" method="Post" action="{{ route('donate') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <div class="row">
              <div class="col-lg-4">
                <fieldset>
                  <label for="title">Book Title</label>
                  <input type="text" name="title" id="title" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-4">
                <fieldset>
                  <label for="author">Author</label>
                  <input type="text" name="author" id="author" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-4">
                <fieldset>
                  <label for="category">Category</label>
                  <input type="text" name="category" id="category" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="quantity">Quantity</label>
                  <input type="number" name="quantity" id="quantity" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-4">
                <fieldset>
                  <label for="image_link">Picture</label>
                  <input type="text" id="image_link" name="image_link" multiple />
                </fieldset>
              </div>
              <div class="col-lg-8">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Submit Your Book</button>
                </fieldset>
              </div>
            </div>
          </form> 
        </div>
        
        </div>

      </div>
    </div>

    @include('user.footer');
</body>
</html>