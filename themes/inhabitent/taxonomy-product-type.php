<?php
/*
Template Name: Archives
*/
get_header(); ?>

<div id="container">
	<div id="content" role="main">

<?php if ( have_posts() ): ?>
	<header class="page-header">
		<?php
		the_archive_title('<h1>' , '</h1>');
		the_archive_description('<div>', '</div>');
		?>
	</header>

<section class="product-types-list">
	<?php while( have_posts() ): the_post();?>
	<?php if ( has_post_thumbnail() ) : ?>
			<a class="product-image-link" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'large' ); ?>
			</a>
	<?php endif; ?>
</section>

	<div class="post-info">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<p>$<?php echo get_post_meta($post->ID, 'price', true); ?></p>
	</div>
	<?php endwhile; ?>

<?php endif; ?>


	</div><!-- #content -->
</div><!-- #container -->

<?php get_footer(); ?>