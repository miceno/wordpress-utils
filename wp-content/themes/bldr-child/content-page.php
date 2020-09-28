<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package BLDR
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bldr' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'bldr' ), '<span class="edit-link">', '</span>' ); ?>
            <span class="meta-block vcard author fn"><?php the_author(); ?></span>
            <span class="meta-block updated published"><i class="fa fa-clock-o"></i> <?php the_time( get_option('date_format') ); ?></span>
            <span class="meta-block updated published"><i class="fa fa-refresh"></i> <?php bldr_child_the_modified_date(); ?></span>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
