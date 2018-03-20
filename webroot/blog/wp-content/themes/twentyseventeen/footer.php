<section class="pt-5 pb-5">
      <div class="container">
        <div class="hdr text-center">
          <h4>Find a Place Near You</h4>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
        </div>
        <div class="row">
          <div class="col-md-3">
            <ul class="FindAPlace">
              <li>Healthy Restaurants in London</li>
              <li>Healthy Restaurants in Berlin</li>
              <li>Healthy Restaurants in Paris</li>
            </ul>
          </div>
          <div class="col-md-3">
            <ul class="FindAPlace">
              <li>Healthy Restaurants in London</li>
              <li>Healthy Restaurants in Berlin</li>
              <li>Healthy Restaurants in Paris</li>
            </ul>
          </div>
          <div class="col-md-3">
            <ul class="FindAPlace">
              <li>Healthy Restaurants in London</li>
              <li>Healthy Restaurants in Berlin</li>
              <li>Healthy Restaurants in Paris</li>
            </ul>
          </div>
          <div class="col-md-3">
            <ul class="FindAPlace">
              <li>Healthy Restaurants in London</li>
              <li>Healthy Restaurants in Berlin</li>
              <li>Healthy Restaurants in Paris</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
<footer class="pt-5 pb-5">
      <div class="container">
        <div class="ftr-prt-wth-warp">
          <div class="ftr-prt-wth">
            <h4>Help</h4>
            <ul>
              <li>
                <a href="#"> Terms of Service </a>
              </li>
              <li>
                <a href="#"> Privacy Policy </a>
              </li>
              <li>
                <a href="#"> Site Map </a>
              </li>
            </ul>
          </div>
          <div class="ftr-prt-wth">
            <h4>Follow Us</h4>
            <ul>
              <li>
                <a href="#"> <i class="fa fa-facebook" aria-hidden="true"></i> Facebook </a>
              </li>
              <li>
                <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i> Instagram </a>
              </li>
              <li>
                <a href="#"> <i class="fa fa-twitter" aria-hidden="true"></i> Twitter </a>
              </li>
            </ul>
          </div>
          <div class="ftr-prt-wth">
            <h4>Follow Us</h4>
            <ul>
              <li>
                <a href="#"> Sign In  </a>
              </li>
              <li>
                <a href="#"> LogIn </a>
              </li>
            </ul>
          </div>
          <div class="ftr-prt-wth">
            <h4>Company</h4>
            <ul>
              <li>
                <a href="#"> Blog </a>
              </li>
              <li>
                <a href="#"> FAQ </a>
              </li>
              <li>
                <a href="#"> About Us </a>
              </li>
            </ul>
          </div>
          <div class="ftr-prt-wth">
            <h4>Support</h4>
            <ul>
              <li>
                <a href="#"> <i class=""></i>Your Voice </a>
              </li>
              <li>
                <a href="#"> Add Your Place </a>
              </li>
              <li>
                <a href="#"> Contact Us </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="ftr-btn-lab pt-5 mt-5">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <p class="mb-0">All Contents Copyright © 2017 Jimja.com</p>
            </div>
            <div class="col-md-6 text-right">
              <div class="d-inline-block">
                <div class="text-center">
                  <img src="<?php bloginfo('template_directory'); ?>/assets/images/top.png" alt="">
                </div>
                <p class="mb-0">Back to Top</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
   <?php //wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array ( 'jquery' ), 1.1, true); ?>
       <?php //wp_enqueue_script( 'jquery.flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', array ( 'jquery' ), 1.1, true); ?>
    

    <script src="<?php bloginfo('template_directory'); ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery.flexslider.js"></script>
    <script type="text/javascript">
    // Can also be used with $(document).ready()
    $(window).load(function() {
      $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: false,
        controlNav: false,
        itemWidth: 210,
        itemMargin: 5,
        minItems: 2,
        maxItems: 4
      });
    });
    </script>
  </body>
</html>