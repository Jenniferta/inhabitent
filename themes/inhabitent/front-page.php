
<?php get_header();?>

<section class="product-info container">
  <?php $product_types = get_terms(array (
    'taxonomy'=>'product-type',
    'hide_empty'=>false

  ));
  if (!empty($product_types)&& !is_wp_error($product_type)) :?>
  //<!--put markup here-->
  <?php foreach ( $product_types as $product_type ): ?>
  <div class="single-product-type">
    <!--<img src="php"-->
  <!-- put more markup here-->
  <!--<pre><?php print_r ($product_type); ?></pre>-->
  <a href="<?php echo get_term_link($product_type); ?>"
  <h3><?php echo $product_type->name;?> Stuff</h3>
  </a>
  </php endforeach; ?>

  <?php endforeach; ?>
  <?php endif; ?>


<!--
  <div class = "hero-banner">
    <img src=<?php echo get_template_directory_uri() . "/images/inhabitent-logo-full.svg" ?> alt="inhabitentlogo">
  </div>

  <div class="shopcontainer">
    <h1> SHOP STUFF </h1>
    <div class="stuffcategories">
      <div class="do stuff">
        <img src=<?php echo get_template_directory_uri() . "/images/do.svg" ?> alt"do icon">
        <p> Get back to nature wiht all the tools and toys you need to enjoy the great outdoors </p>
        <a><p> DO STUFF </p></a>
      </div>
      <div class="eat stuff">
        <img src=<?php echo get_template_directory_uri() . "/images/eat.svg" ?> alt"eat icon">
        <p> Nothing beats food cooked over a fire. We have all you need for good camping eats </p>
        <a><p>EAT STUFF</p></a>
      </div>
      <div class="sleep stuff">
        <img src=<?php echo get_template_directory_uri() . "/images/sleep.svg" ?> alt"sleep icon">
        <p>Get a good night's rest in the wild in a home away from home that travels well.</p>
        <a><p>SLEEP STUFF</p></a>
      </div>
      <div class="wear stuff">
        <img src=<?php echo get_template_directory_uri() . "/images/wear.svg" ?> alt"wear icon">
        <p>From flannel shirts to toques, look the part while roughing it in the great outdoors.</p>
        <a><p>WEAR STUFF</p></a>
      </div>
    </div>
  </div>-->

  <!--<h1> INHABITENT JOURNAL </h1>-->-->

  <!--<div class = "featured">
        <?php
        query_posts('posts_per_page=3');
        if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <img src=<?php echo the_post_thumbnail_url(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
            <p><a href="<?php the_permalink(); ?>">Read Entry</a></p>
        <?php endwhile; ?>
    </div>-->

<!--The WP_Query task -->





<?php get_footer();?>
