<?php
/**
 * The template for displaying archive pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header>

<section class="product-types-list">
  <?php $product_types = get_terms(array ('taxonomy'=>'product-type','hide_empty'=>false));
      if (!empty($product_types)&& !is_wp_error($product_type)) :?>
        <?php foreach ( $product_types as $product_type ): ?>
          <div class="product-type-links">
            <h3><a href="<?php echo get_term_link($product_type) ?>"><?php echo $product_type->name?></a></h3>
          </div>
    		<?php endforeach; ?>
     <?php endif; ?>
 </section>

<div class="shop-grid">
			<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
			<div class="shop-item">
				<?php the_post_thumbnail( 'large' ); ?>
				<div class="shop-detail">
					<?php the_title(); ?>
					<?php echo CFS()->get( 'price' ); ?>
				</div>
			</div>
			<?php endwhile; ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/product-content', 'none' ); ?>
		<?php endif; ?>
</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>