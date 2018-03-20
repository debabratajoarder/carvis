<!doctype html>
<html lang="en">
  <head>
    <title>Hello, world!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <?php //wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css',false,'1.1','all'); ?>
    <?php// wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/assets/css/flexslider.css',false,'1.1','all'); ?>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/flexslider.css">
  </head>
  <body>
    <section class="hed-hdr-otr">
      <div class="hed-hdr-otr-inner">
        <div id="demo2" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/images/cover.png');">
            <div class="hed-hdr"></div>
          </div>
          <div class="carousel-item" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/images/cover.png');">
            <div class="hed-hdr"></div>
          </div>
          <div class="carousel-item" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/images/cover.png');">
            <div class="hed-hdr"></div>
          </div>
        </div>
      </div>
      </div>
      <div class="header">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent my-navbar">
          <a class="navbar-brand" href="#">
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo.png" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link text-white" href="#">Top 10 Rated</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#"> Jimja Favorites </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#"> <i class="fa fa-user-plus" aria-hidden="true"></i> Sign In </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">  <i class="fa fa-user"></i> Sign up </a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <button type="button" name="button" class="btn btn-success btn-lg">Add your Favorite Place</button>
              <button class="btn btn-link my-2 my-sm-0 bg-transparent text-white" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
          </div>
        </nav>
        </div>
      </div><!-- #masthead -->

	
