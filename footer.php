<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package EBC Kings Mountain, NC
 */
?>

		</main><!-- #main.site-main -->
	</div><!-- #primary.content-area -->

	<?php get_sidebar(); ?>

	</div><!-- #content.site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( esc_html__( 'http://wordpress.org/', 'ebckm-2014' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'ebckm-2014' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'ebckm-2014' ), 'EBC Kings Mountain, NC', '<a href="http://andrewrminion.com/" rel="designer">AndrewRMinion Design</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
