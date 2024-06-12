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
                    <a href="{{ route('home') }}" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                    <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('manager.borrow_requests') }}" >Borrow Requests</a></li>
                        <li><a href="{{ route('manager.return_requests') }}">Return Requests</a></li>
                        <li><a href="{{ route('showLost') }}">Report Lost Books</a></li>
                        <li><a href="{{ route('manager.books.pending') }}" class="active">Contribution Requests</a></li>
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
  <div class="currently-market" style="margin-top:50px; height: 100vh;">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2><em>Items</em> Currently Holding.</h2>
          </div>
        </div>

        @if(session()->has('message'))
        @foreach($borrowedBooks as $book)
<div class="alert alert-success">
  <button class="close" type="button" data-bs-dismiss="alert" aria-hidden="true" >X       {{ strlen($book->title) > 20 ? substr($book->title, 0, 20) . '...' : $book->title }}</button>
  @endforeach
        {{session()->get('message')}}
</div>
        @endif
        <div class="col-lg-12">
          <div class="row grid">
          @foreach ($books as $book)
    <div class="d-inline-flex border border-primary" style="margin-bottom: 30px;">
        <h2>{{ $book->title }}</h2>
        <p>{{ $book->author }}</p>
        @foreach ($book->contributions as $contribution)
            @if($contribution->reader)
                <p style="padding-right:10px;">Contributed by: {{ $contribution->reader->name }}</p>
            @else
                <p style="padding-right:10px;">Contributed by: Unknown</p>
            @endif
            <p style="padding-right:10px;">Quantity: {{ $contribution->quantity }}</p>
            <p style="padding-right:10px;">Category: {{ $book->category }}</p>
            <p style="padding-right:10px;">Contributed At: {{ $contribution->contributed_at }}</p>
        @endforeach
        <form method="POST" action="{{ route('manager.books.handle', ['id' => $book->id, 'action' => 'approve']) }}" style="padding-right:10px;">
            @csrf
            <button type="submit" class="btn btn-primary">Approve</button>
        </form>
        <form method="POST" action="{{ route('manager.books.handle', ['id' => $book->id, 'action' => 'reject']) }}">
            @csrf
            <button type="submit" class="btn btn-primary">Reject</button>
        </form>
    </div>
@endforeach
<a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



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

