<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ); ?></span>
		<input type="search" class="search-field" name="s" 
			value="<?php echo get_search_query(); ?>"
			placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder' ) ?>"/>
		<i class="icon-search fa fa-search"></i>
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>
