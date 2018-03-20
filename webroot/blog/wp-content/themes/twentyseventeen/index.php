<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="my-tab">
        <div class="container">
          <h2 class="text-center text-white mt-5 pt-5 pb-3">What are <span class="text-theme">YOU</span> looking for?</h2>
          <div class="my-tab-innr">
            <div class="">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" href="#tab1" role="tab" data-toggle="tab">Yoga Studio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#tab2" role="tab" data-toggle="tab">Healthy Restaurants</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#tab3" role="tab" data-toggle="tab">Healthy Deliveries</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#tab4" role="tab" data-toggle="tab">Eco-resorts</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#tab5" role="tab" data-toggle="tab">Gyms</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#tab6" role="tab" data-toggle="tab">Organic Shops</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active show" id="tab1">
                <div class="d-flex">
                  <input type="text" name="" value="" >
                  <button type="button" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab2">2</div>
              <div role="tabpanel" class="tab-pane fade" id="tab3">3</div>
              <div role="tabpanel" class="tab-pane fade" id="tab4">4</div>
              <div role="tabpanel" class="tab-pane fade" id="tab5">5</div>
              <div role="tabpanel" class="tab-pane fade" id="tab6">6</div>
              <div role="tabpanel" class="tab-pane fade" id="tab7">7</div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
      <div class="flexslider">
        <ul class="slides">
          <li>
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/6.png" />
          </li>
          <li>
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/7.png" />
          </li>
          <li>
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/8.png" />
          </li>
          <li>
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/9.png" />
          </li>
          <li>
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/6.png" />
          </li>
          <li>
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/7.png" />
          </li>
          <li>
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/8.png" />
          </li>
          <li>
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/9.png" />
          </li>
        </ul>
      </div>
    </div
    >
    </section>
    <section class="map">
      <img src="<?php bloginfo('template_directory'); ?>/assets/images/bg-2.png" alt="">
    </section>

    <section class="pt-5 pb-5">
      <div class="container text-center">
        <h3>Make part of the Jimja's Family</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <div class="row">
          <div class="offset-lg-1 col-lg-10">
            <div class="ferch-div">
              <input type="text" name="" value="" placeholder="Eamil Id">
              <button type="button" name="button" class="btn btn-success">I‘m In</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="pt-5 pb-5 bg-green">
      <div class="container">
        <div id="demo" class="carousel slide" data-ride="carousel">

          <!-- The slideshow -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-md-6">
                  <img src="<?php bloginfo('template_directory'); ?>/assets/images/img-1.png" alt="" class="crslImg">
                </div>
                <div class="col-md-6">
                  <h4 class="text-white">Advertisement: Digital Nomad Seeks Meaning To Life. Will Work For Food.</h4>
                  <div class="prof-img-src-warp">
                    <div class="prof-img-src">
                      <div class="img" style="background-image: url('image/pp.jpg')"></div>
                    </div>
                    <div class="prof-img-txt text-white">
                      <span>by Alina  Chatterton</span>
                      <span>-</span>
                      <span>30 days ago</span>
                      <span>-</span>
                      <span>in Faces</span>
                    </div>
                  </div>
                  <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                  <button class="btn btn-defult btn-white">Read More</button>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col-md-6">
                  <img src="<?php bloginfo('template_directory'); ?>/assets/images/img-1.png" alt="" class="crslImg">
                </div>
                <div class="col-md-6">
                  <h4 class="text-white">Advertisement: Digital Nomad Seeks Meaning To Life. Will Work For Food.</h4>
                  <div class="prof-img-src-warp">
                    <div class="prof-img-src">
                      <div class="img" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/images/pp.jpg')"></div>
                    </div>
                    <div class="prof-img-txt text-white">
                      <span>by Alina  Chatterton</span>
                      <span>-</span>
                      <span>30 days ago</span>
                      <span>-</span>
                      <span>in Faces</span>
                    </div>
                  </div>
                  <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                  <button class="btn btn-defult btn-white">Read More</button>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col-md-6">
                  <img src="<?php bloginfo('template_directory'); ?>/assets/images/img-1.png" alt="" class="crslImg">
                </div>
                <div class="col-md-6">
                  <h4 class="text-white">Advertisement: Digital Nomad Seeks Meaning To Life. Will Work For Food.</h4>
                  <div class="prof-img-src-warp">
                    <div class="prof-img-src">
                      <div class="img" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/images/pp.jpg')"></div>
                    </div>
                    <div class="prof-img-txt text-white">
                      <span>by Alina  Chatterton</span>
                      <span>-</span>
                      <span>30 days ago</span>
                      <span>-</span>
                      <span>in Faces</span>
                    </div>
                  </div>
                  <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                  <button class="btn btn-defult btn-white">Read More</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
      </div>
    </section>

    <!-- .wrap -->

<?php get_footer();
