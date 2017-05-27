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
                   <header class=“about-header”>
                       <?php the_title( '<h1 class=“about-title”>','</h1>' ); ?>
                   </header><!-- .entry-header -->
                                   <p><?php echo CFS()->get( 'our_story' ); ?></p>
                                   <p><?php echo CFS()->get( 'our_team' ); ?></p>
       </main><!-- #main -->
   </div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>