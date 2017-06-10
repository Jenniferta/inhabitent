<?php
/**
* The template for displaying all pages.
* Template Name: About template
* @package RED_Starter_Theme
*/
get_header(); ?>
   <div id=“primary” class=“content-area”>
    <main id=“main” class=“site-main” role=“main”>
        <article id=“post-<?php the_ID(); ?>” <?php post_class(); ?>>
        <header class="entry-header hero-banner">
         <?php the_title( '<h1 class=about-title>','</h1>' ); ?>
        </header>
        <section class="entry-container">
            <h1> our story </h1>
            <div class="our-story"><?php echo CFS()->get( 'our_story' ); ?></div>
            <h1> our team </h1>
             <div class="our-team"><?php echo CFS()->get( 'our_team' ); ?></div>
         </section>
    </main>
   </div>
<?php get_footer(); ?>