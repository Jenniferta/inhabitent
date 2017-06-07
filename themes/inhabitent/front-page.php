<?php get_header();?>
  <div class="hero-background">
    <div class = "hero-banner">
      <img src="<?php echo get_template_directory_uri() ?>/images/inhabitent-logo-full.svg" alt="inhabitentlogo">
    </div>
  </div>
  <div class="container">
    <h1> SHOP STUFF </h1>
    <section class="product-info container">
      <?php $product_types = get_terms(array ('taxonomy'=>'product-type','hide_empty'=>false));
          if (!empty($product_types)&& !is_wp_error($product_type)) :?>
            <?php foreach ( $product_types as $product_type ): ?>
              <div class="single-product-type">
                <img src="<?php echo get_template_directory_uri() ?>/images/product-type-icons/<?php echo $product_type->slug ?>.svg " alt="<p><?php echo $term->description; ?></p>">
                <p><?php echo $product_type->description ?></p>
                <h2><a href="<?php echo get_term_link($product_type) ?>"><?php echo $product_type->name?> stuff</a></h2>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
      </section>
  </div>

  <div class="container">
    <h1> INHABITENT JOURNAL </h1>
      <div class = "featured">
      <?php query_posts('posts_per_page=3');
        if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <div class="post">
            <img src="<?php echo the_post_thumbnail_url(); ?>">
            <div class="post-information">
              <p><?php echo get_the_date(); ?> / <?php comments_number(); ?></p>
              <div class="title"><h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2></div>
              <div class="read-entry"><p><a href="<?php the_permalink(); ?>">Read Entry</a></p></div>
            </div>
            </div>
        <?php endwhile; ?>
       </div>
    </div>

<section class="adventure-section">
  <div>
    <h1> LATEST ADVENTURES </h1>
  </div>
 <div class="adventureposts">

  <div class="adventure-half-container">
    <div class="adventure adventure1">
      <div class="title"><h2>Getting back to nature in a canoe</h2></div>
      <div class="more-link"><p>Read More</p></div>
    </div>
  </div>

  <div class="adventure-half-container">
    <div class="vertical-half-container">
      <div class="adventure adventure2">
        <div class="title"><h2>A Night with Friend's at the beach</h2></div>
        <div class="more-link"><p>Read More</p></div>
      </div>
    </div>

    <div class="vertical-half-container">
      <div class="adventure adventure3">
        <div class="title"><h2>Taking in the view at Big Mountain</h2></div>
        <div class="more-link"><p>Read More</p></div>
      </div>


      <div class="adventure adventure4">
        <div class="title"><h2>Skygazing at the Night Sky</h2></div>
        <div class="more-link"><p>Read More</p></div>
      </div>
    </div>
  </div>

</div>

<div class="adventurelink">

<button>
  <p><a href src="#">More Adventures</a></p>
</button>
</div>
</section>

  </div>
</body>
<!--The WP_Query task -->


<?php get_footer();?>
