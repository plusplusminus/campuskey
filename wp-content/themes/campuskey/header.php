<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<?php global $tpb_options; ?>
		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons ?>
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons/manifest.json">
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons/favicon.ico">
		<meta name="msapplication-TileColor" content="#00aba9">
		<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons/mstile-144x144.png">
		<meta name="msapplication-config" content="<?php echo get_stylesheet_directory_uri();?>/library/images/favicons/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">
		
		
		<link href="http://fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">

		<?php wp_head(); ?>

		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
		
		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		document,'script','//connect.facebook.net/en_US/fbevents.js');

		fbq('init', '853543851419352');
		fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=853543851419352&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->
	</head>

	<body <?php body_class(); ?>>
		<div class="wrapper">
			<div id="preloader">
			 	<div id="status">
			 		<?php $preloader_image = $tpb_options['preloader_image']['url']; ?>

          			<img src="<?php echo $preloader_image;?>" title="Loading" width="32px"/>

			  	</div>
			</div>
			<header id="main-header">
				<div id="header">
				  	<div class="main">
						<div class="header-main">
							<div class="logo"> 
								<?php if ( ( '' != $tpb_options['site_logo']['url'] ) ) {
									$logo_url = $tpb_options['site_logo']['url'];
									$site_url = get_bloginfo('url');
									$site_name = get_bloginfo('name');
									$site_description = get_bloginfo('description');
									if ( is_ssl() ) $logo_url = str_replace( 'http://', 'https://', $logo_url );
									echo '<a href="' . esc_url( $site_url ) . '" title="' . esc_attr( $site_description ) . '"><img data-pin-no-hover="true" src="'.$logo_url.'" alt="'.esc_attr($site_name).'"/></a>' . "\n";
									
								} // End IF Statement */
								?> 
							</div>
						  	<div class="header-right">
								<div class="header-right-top">
									<div class="header-social header-top-main"> 

										<?php if ($tpb_options['twitter_url']) : ?>
										<a title="Twitter" target="_blank" href="<?php echo $tpb_options['twitter_url'];?>"><i class="fa fa-twitter"></i></a> </li>
										<?php endif; ?>
										<?php if ($tpb_options['facebook_url']) : ?>
										<a title="Facebook" target="_blank" href="<?php echo $tpb_options['facebook_url'];?>"><i class="fa fa-facebook"></i></a> </li>
										<?php endif; ?>
										<?php if ($tpb_options['instagram_url']) : ?>
										<a title="Instagram" target="_blank" href="<?php echo $tpb_options['instagram_url'];?>"><i class="fa fa-instagram"></i></a> </li>
										<?php endif; ?>
								
									</div>
								  	<div class="header-contact header-top-main"> 
								  		<?php $text_tel = $tpb_options['campuskey_phone_text']; ?>
								  		<?php $number_tel = $tpb_options['campuskey_phone']; ?>
								  		<a href="tel:<?php _e($number_tel,'campuskey');?>" title="Call Us"><i class="fa fa-phone"></i><?php _e($text_tel,'campuskey');?></a> 
								  	</div>
								  	<div class="header-nav header-top-main">
								  		<?php secondary_nav('secondary-nav','top-nav'); ?>
								  	</div>
								</div>
								<div class="header-right-bottom">
							  		<div class="navigation-main">
										<div class="enumenu_container">
											<div class="menu-icon">MENU <i class="demo-icon icon-menu2"></i></div>
											<?php secondary_nav('main-nav','enumenu_ul desk'); ?>
										</div>
							  		</div>
							  		<div class="book-now"> 
							  			<?php $booknow_image = $tpb_options['booknow_image']['url']; ?>
							  			<?php $booknow_link = $tpb_options['campuskey_booknow']; ?>
							  			<a href="<?php echo $booknow_link;?>" title="Book now!">
							  				<img class="img-responsive" src="<?php echo $booknow_image;?>" alt="Book Now!"/>
							  			</a> 
							  		</div>
								</div>
						  	</div>
						</div>
				  	</div>
				</div>
			</header>


