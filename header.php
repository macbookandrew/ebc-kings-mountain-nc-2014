<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package EBC Kings Mountain, NC
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ebckm-2014' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/EBC-logo.svg" alt="Emmanuel Baptist Church Logo" title="Emmanuel Baptist Church" /></a>
			<button class="menu-toggle"><?php esc_html_e( 'Main Menu', 'ebckm-2014' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

<?php
if ( has_post_thumbnail() ) {
	if ( is_front_page() ) {
		the_post_thumbnail( 'page_header_tall' ); } elseif ( is_post_type_archive( 'wpfc_sermon' ) ) {
		?>
			<img width="2400" height="400" src="http://ebckingsmountain.com/wp-content/uploads/2015/05/Sermons.jpg" class="attachment-page_header wp-post-image" alt="Ministries" sizes="(max-width: 2400px) 100vw, 2400px" srcset="http://ebckingsmountain.com/wp-content/uploads/2015/05/Sermons-300x50.jpg 300w, http://ebckingsmountain.com/wp-content/uploads/2015/05/Sermons-1024x171.jpg 1024w, http://ebckingsmountain.com/wp-content/uploads/2015/05/Sermons-250x42.jpg 250w, http://ebckingsmountain.com/wp-content/uploads/2015/05/Sermons-2400x400.jpg 2400w, http://ebckingsmountain.com/wp-content/uploads/2015/05/Sermons-600x100.jpg 600w, http://ebckingsmountain.com/wp-content/uploads/2015/05/Sermons.jpg 2400w">
		<?php
		} else {
			the_post_thumbnail( 'page_header' ); }
		$thumbnail_test = '';
} else {
	$thumbnail_test = 'no-thumbnail'; }
?>
<div id="content" class="site-content <?php echo esc_attr( $thumbnail_test ); ?>">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

