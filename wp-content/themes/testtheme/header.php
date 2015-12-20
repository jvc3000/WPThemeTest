<!doctype html>
<html>
<head <?php language_attributes(); ?>>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<?php wp_head(); ?>
</head>

<?php
if (is_front_page()):
	$testtheme_classes = array('testtheme-class', 'my-class');
else:
	$testtheme_classes = array('no-testtheme-class');
endif;
?>

<body <?php body_class($testtheme_classes); ?>>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<?php /*
            ====================================================================
			Example mode code from Bootstrap https://getbootstrap.com/components/#navbar
			====================================================================
            */ ?>
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
						        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php bloginfo('url'); ?>">Test Theme</a>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'container' => false,
								'menu_class' => 'nav navbar-nav navbar-right',
								'walker' => new Walker_Nav_Primary(),
							)
						);
						?>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
			<?php /*
            ====================================================================
			End example mode code from Bootstrap https://getbootstrap.com/components/#navbar
			====================================================================
            */ ?>
		</div>
		<div class="col-xs-12">
			<div class="search-form-container">
				<div class="container">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</div>
	<?php
	if (header_image() == null){
		echo '<br>';
	}
	else{ ?>
	<img
		src="<?php header_image(); ?>"
		height="<?php echo get_custom_header()->height; ?>"
		width="<?php echo get_custom_header()->width; ?>"
		alt="new"
	/>
<?php } ?>