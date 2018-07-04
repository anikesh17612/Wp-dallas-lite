<?php
/**
 * The sidebar containing the Footer widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dallas Lite
 */

if ( is_active_sidebar( 'bottom-a' ) || is_active_sidebar( 'bottom-b' ) || is_active_sidebar( 'bottom-c' ) || is_active_sidebar( 'bottom-d' ) ) { ?>
// Create bottom postion of theme.
<section id="bottom-section">
	<div class="container">
		<div class="row">
			<?php if ( is_active_sidebar( 'bottom-a' ) ) {
				echo '<div class="col-md-3">';
				 dynamic_sidebar( 'bottom-a' );
					echo '</div>';
}
if ( is_active_sidebar( 'bottom-b' ) ) {
	echo '<div class="col-md-3">';
	dynamic_sidebar( 'bottom-b' );
	echo '</div>';
}
if ( is_active_sidebar( 'bottom-c' ) ) {
	echo '<div class="col-md-3">';
	dynamic_sidebar( 'bottom-c' );
	echo '</div>';
}
if ( is_active_sidebar( 'bottom-d' ) ) {
	echo '<div class="col-md-3">';
	dynamic_sidebar( 'bottom-d' );
	echo '</div>';
} ?>
		</div>
	</div>
</section>
<?php }
