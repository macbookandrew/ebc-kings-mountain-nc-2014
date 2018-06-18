<?php

/**
 * Add soundboard role.
 *
 * @return void Adds custom role.
 */
function add_soundboard_role() {
	// Add the new role.

	// Create if necessary.
	$role = get_role( 'soundboard' );
	if ( ! $role ) {
		$role = add_role('soundboard', 'Soundboard');
	}

	// Add theme-specific roles.
	$role->add_cap('delete_posts');
	$role->add_cap('delete_others_posts');
	$role->add_cap('delete_published_posts');
	$role->add_cap('edit_posts');
	$role->add_cap('edit_others_posts');
	$role->add_cap('edit_published_posts');
	$role->add_cap('publish_posts');
	$role->add_cap('read');
	$role->add_cap('upload_files');

	$role->add_cap('manage_wpfc_categories');

}
add_action( 'admin_init', 'add_soundboard_role');

/**
 * Remove some admin pages for soundboard user.
 *
 * @return void Modifies admin menu.
 */
function soundboard_remove_menu_pages() {
	if ( ! current_user_can( 'manage_options' ) ) {
		remove_menu_page('upload.php'); // Media
		remove_menu_page('edit-comments.php'); // Comments
		remove_menu_page('edit.php?post_type=slide'); // Slides
		remove_menu_page('options-general.php'); // Settings
		remove_menu_page('tools.php'); // Tools
		remove_menu_page('edit.php'); // Posts
	}
}
add_action( 'admin_menu', 'soundboard_remove_menu_pages' );
