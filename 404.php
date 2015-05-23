<?php
/**
 * Modified page.php template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package EBC Kings Mountain, NC
 */

get_header(); ?>


<article class="error-404 not-found">
	<header class="entry-header" aria-hidden="false">
        <h1 class="entry-title">Not Found</h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
        <p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ebckm-2014' ); ?></p>

        <?php get_search_form(); ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
