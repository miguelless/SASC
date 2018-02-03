<!DOCTYPE html>
<html>

<head>

  <title>Servicios a Su Hogar</title>
  <meta charset="utf-8">

  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head();?>
  </head>

  <body <?php body_class(); ?>>

    <!-- Menu Navigation -->
    <!-- <nav class="navbar navbar-inverse"> -->

      <!-- Header Frame -->
      <div class="HeaderFrame" style="background: #000; border-top: 16px solid #e46c0a; "> </div>

      <nav class="navbar navbar-default " style="font-size: 15px;font-weight: bold;background: black;color: white;border-color: #000;">  
        <div class="container">
          <div class="navbar-header ">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand">
              <img src="<?php echo get_template_directory_uri(); ?>/img/logo_header.png" alt="" class="img-responsive" style="width: 50px;margin-top:-15px;"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <?php wp_nav_menu( 
                  array(
                    'menu' => 'main',
                    'theme_location' => 'Primary',
                    'depth' => 2,
                    'container' => '',
                    'container_class' => 'navbar-right',
                    'menu_class' => 'nav navbar-nav',
                    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                    'walker' => new wp_bootstrap_navwalker())
                  );?>
                </ul>
              </div>
            </div>
          </nav>

          <!--    Fin Menu Navigation     -->

