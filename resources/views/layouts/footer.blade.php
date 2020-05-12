  <!-- Site footer -->
  <footer class="mt-5 site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">bidcol.tk <i>@lang('navbar.legend') </i> @lang('navbar.message')</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>@lang('list.category')</h6>
            <ul class="footer-links">
              <li><a href="{{ route('item.index', ['option' => 'category', 'id' => 1]) }}">@lang('categories.glasses')</a></li>
              <li><a href="{{ route('item.index', ['option' => 'category', 'id' => 2]) }}">@lang('categories.electronics')</a></li>
              <li><a href="{{ route('item.index', ['option' => 'category', 'id' => 3]) }}">@lang('categories.vehicles')</a></li>
              <li><a href="{{ route('item.index', ['option' => 'category', 'id' => 4]) }}">@lang('categories.clothes')</a></li>
              <li><a href="{{ route('item.index', ['option' => 'category', 'id' => 5]) }}">@lang('categories.antiques')</a></li>
              <li><a href="{{ route('item.index', ['option' => 'category', 'id' => 6]) }}">@lang('categories.art')</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="{{ route('home.about') }}">About Us</a></li>
              <li><a href="{{ route('home.contact') }}">Contact Us</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by 
         <a href="#">bidscol</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>