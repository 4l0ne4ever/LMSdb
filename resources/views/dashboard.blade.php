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

TemplateMo 577 Liberty Market

https://templatemo.com/tm-577-liberty-market

-->
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
                        <li><a href="{{url('/')}}" class="active">Home</a></li>
                        <li><a href="explore.html">Explore</a></li>
                        <li><a href="details.html">Item Details</a></li>
                        <li><a href="author.html">Author</a></li>
                        <li><a href="{{url('donate')}}">Donate</a></li>
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
    <!-- ***** Main Banner Area Start ***** -->
<div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="header-text">
            <h6>Book is Knowledge</h6>
            <h2>Knowledge is Power</h2>
            <p>Library is a really cool and professional design for your websites. This HTML CSS template is based on Bootstrap v5 and it is designed for related web portals. Liberty can be freely downloaded from github</p>
            <div class="buttons">
              <div class="border-button">
                <a href="explore.html">Explore Top Books</a>
              </div>
              <div class="main-button">
                <a href="" target="_blank">Watch Our Videos</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <div class="">
            <div class="item">
              <img src="assets/images/banner.png" alt="">
            </div>
            <div class="item">
              <img src="assets/images/banner2.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Main Banner Area End ***** -->
  <div class="categories-collections">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="categories">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <div class="line-dec"></div>
                  <h2>Browse Through Book <em>Categories</em> Here.</h2>
                </div>
              </div>
              <div class="col-lg-2 col-sm-6">
                <div class="item">
                  <div class="icon">
                    <img src="assets/images/icon-01.png" alt="">
                  </div>
                  <h4>Motivational</h4>
                  
                </div>
              </div>
              <div class="col-lg-2 col-sm-6">
                <div class="item">
                  <div class="icon">
                    <img src="assets/images/icon-02.png" alt="">
                  </div>
                  <h4>Money</h4>
                  
                </div>
              </div>
              <div class="col-lg-2 col-sm-6">
                <div class="item">
                  <div class="icon">
                    <img src="assets/images/icon-03.png" alt="">
                  </div>
                  <h4>Psychological</h4>
                  
                </div>
              </div>
              <div class="col-lg-2 col-sm-6">
                <div class="item">
                  <div class="icon">
                    <img src="assets/images/icon-04.png" alt="">
                  </div>
                  <h4>Story</h4>
                  
                </div>
              </div>
              <div class="col-lg-2 col-sm-6">
                <div class="item">
                  <div class="icon">
                    <img src="assets/images/icon-05.png" alt="">
                  </div>
                  <h4>Fictional</h4>
                  
                </div>
              </div>
              <div class="col-lg-2 col-sm-6">
                <div class="item">
                  <div class="icon">
                    <img src="assets/images/icon-06.png" alt="">
                  </div>
                  <h4>Romance</h4>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <div class="currently-market">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2><em>Items</em> Currently In The Market.</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="filters">
            <ul>
              <li data-filter="*"  class="active">All Books</li>
              <li data-filter=".msc">Popular</li>
              <li data-filter=".dig">Latest</li>
              
            </ul>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="row grid">
          @foreach($books as $book)
<div class="col-lg-6 currently-market-item all msc">
  <div class="item">
    <div class="left-image">
      <img src="{{$book->image_link}}" alt="" style="border-radius: 20px; min-width: 195px;">
    </div>
    <div class="right-content">
      <h4>{{ strlen($book->title) > 20 ? substr($book->title, 0, 20) . '...' : $book->title }}</h4>
      <span class="author">
        <img src="assets/images/author.jpg" alt="" style="max-width: 50px; border-radius: 50%;">
        <h6>{{$book->author}}</h6>
      </span>
      <div class="line-dec"></div>
      <span class="bid">
        Current Available<br><strong>{{$book->quantity}}</strong><br> 
      </span>
      <span class="ends">
        Rating<br><strong>{{$book->rating}}</strong><br>
      </span>
      <span class="bid">
        Category<br><strong>{{$book->category}}</strong><br> 
      </span>
      <div class="text-button">
        <a href="{{url('book_details',$book->id)}">View Details</a>
      </div>
      <br>
      <div class="">
        <a class="btn btn-primary" href="{{url('borrow_books',$book->id)}">Borrow</a>
      </div>
    </div>
  </div>
</div>
@endforeach
            </div>
            

            
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2024 <a target="_blank" href="https://www.youtube.com/channel/UCVBdwet972DJR_AjMzu6duw">Christopher
          &nbsp;&nbsp;
          Designed by <a title="HTML CSS Templates" rel="sponsored" href="https://www.youtube.com/channel/UCVBdwet972DJR_AjMzu6duw" target="_blank">Christopher</a></p>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>

  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>
  </body>
</html>
