<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package EBC Kings Mountain, NC
 */

get_header(); ?>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					if ( is_category() ) :
						single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( esc_html__( 'Author: %s', 'ebckm-2014' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( esc_html__( 'Day: %s', 'ebckm-2014' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( esc_html__( 'Month: %s', 'ebckm-2014' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'ebckm-2014' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( esc_html__( 'Year: %s', 'ebckm-2014' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'ebckm-2014' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							esc_html_e( 'Asides', 'ebckm-2014' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							esc_html_e( 'Galleries', 'ebckm-2014' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							esc_html_e( 'Images', 'ebckm-2014' );

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							esc_html_e( 'Videos', 'ebckm-2014' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							esc_html_e( 'Quotes', 'ebckm-2014' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							esc_html_e( 'Links', 'ebckm-2014' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							esc_html_e( 'Statuses', 'ebckm-2014' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							esc_html_e( 'Audios', 'ebckm-2014' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							esc_html_e( 'Chats', 'ebckm-2014' );

						elseif ( is_post_type_archive( 'wpfc_sermon' ) ) :
							esc_html_e( 'Sermon Archives', 'ebckm-2014' );

						else :
							esc_html_e( 'Archives', 'ebckm-2014' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
				if ( ! empty( $term_description ) ) :
					printf( wp_kses_post( '<div class="taxonomy-description">%s</div>', $term_description ) );
					endif;

					// Show sermon sorting
				if ( strpos( get_post_type(), 'wpfc' ) !== false ) {
					render_wpfc_sorting();
				}
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php
			while ( have_posts() ) :
				the_post();
				?>

				<?php

					/*
					 Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where esc_html___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php ebckm_2014_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

<?php get_footer(); ?>
