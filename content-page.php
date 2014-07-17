<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package EBC Kings Mountain, NC
 */
?>

<?php
if ( has_post_thumbnail() ) {
    the_post_thumbnail( 'page_header' );
}
?>
<div id="content" class="site-content">
<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'ebckm-2014' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'ebckm-2014' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
