<!DOCTYPE html>
<html  <?php language_attributes();?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(' :: ', true, 'right'); ?></title>

    <!-- Bootstrap -->
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn`t work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
  </head>
  <body <?php $class="bluer"; body_class( $class ); ?>>
 <?php if ( ! isset( $content_width ) ) $content_width = 900; ?>
 <div class="container">

		<nav class="navbar navbar-default" role="navigation">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="/">Home</a>
		    </div>
		
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php
				wp_nav_menu(array(
						'theme_location' => 'top-menu', 
						'depth' => 2, 
						'menu_class' => 
						'nav navbar-nav', 
						'fallback_cb' => 'wp_bootstrap_navwalker::fallback', 
						'walker' => new wp_bootstrap_navwalker()
					)
				);
		        ?>
		    </div><!-- /.navbar-collapse  -->
		  </div><!-- /.container-fluid -->
		</nav> 		

	    	<div class="row">
	    		<div class="col-md-4">
				<?php if ( get_theme_mod( 'blueronald_logo' ) ) : ?>				
				        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'blueronald_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
				<?php else : ?>
						Please login, click on Appearance -&gt; Customize add logo in section 'Theme Options'.
				<?php endif; ?>
	    		</div>
	    		<div class="col-md-8">
				        <h1><?php bloginfo('name'); ?></h1>
				        <h3><?php bloginfo('description'); ?></h3>
                       <!-- <h4>Translated text to spanish with _e(), po and  mo files  _e('Hello', 'blueronald'); </h4>  -->
				              
		      </div><!-- /.col-md  -->		      
	      </div> <!-- /.row  -->

		    <div class="row">
				<div class="col-md-12">	    	
					<nav class="navbar navbar-inverse" role="navigation">
					  <div class="container-fluid">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					    </div>
					
					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
							<?php
							wp_nav_menu(array(
										'theme_location' => 'bottom-menu', 
										'depth' => 2, 
										'menu_class' => 'nav navbar-nav', 
										'fallback_cb' => 'wp_bootstrap_navwalker::fallback', 
										'walker' => new wp_bootstrap_navwalker()
									)
							);
					        ?>
					    </div><!-- /.navbar-collapse  -->
					  </div><!-- /.container-fluid -->
					</nav> 
				</div> <!-- /.col-md-12  -->		    	
		    </div>  <!-- /.row  -->