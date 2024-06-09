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
                        <li><a href="{{url('/')}}" >Home</a></li>
                        <li><a href="{{url('explore')}}" class="active">Explore</a></li>
                        <li><a href="{{ route('showBorrow') }}">Book Borrowing</a></li>
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
 
  <div class="currently-market">
    <div class="container">
      <div class="row">
        

        @if(session()->has('message'))
<div class="alert alert-success">
  <button class="close" type="button" data-bs-dismiss="alert" aria-hidden="true" >X</button>
        {{session()->get('message')}}
</div>
        @endif

        <div class="col-lg-12" style="margin-top: 50px;">
          <div class="filters">
            <ul>
              <li data-filter="*"  class="active">All Books</li>
              @foreach($categories as $category)
    <li><a href="javascript:void(0)" onclick="filterCategory('{{ $category }}')">{{ $category }}</a></li>
@endforeach
              
            </ul>
          </div>
        </div>

        <form action="{{url('search')}}" method="get">
            @csrf
        <div class="row" style="margin: 30px;">
                <div class="col-md-9">
                    <input type="search" class="form-control" name="search" placeholder="Enter book title, author">
                </div>
                <div class="col-md-3">
                    <input type="submit" value="Search" class="btn btn-primary">
                </div>
            
        </div>
        </form>

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
        <a href="{{url('book_details',$book->id)}}">View Details</a>
      </div>
      <br>
      <div class="">
      <a class="btn btn-primary" href="{{ url('borrow_books', $book->id) }}">Borrow</a>
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
  <script>
    function filterCategory(category) {
    const url = new URL(window.location.href);
    url.pathname = '/filter';
    url.searchParams.set('category', category);
    window.location.href = url;
}
</script>
  </body>
</html>
