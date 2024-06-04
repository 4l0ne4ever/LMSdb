<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.css');
</head>
<body>
    @include('user.header');
    
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