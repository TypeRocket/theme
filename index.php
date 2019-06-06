<?php get_header(); ?>

  <section role="main">

    <section class="main-content">
      <?php while(have_posts()) : the_post() ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <?php the_content(); ?>
          <div class="tags"><?php the_tags(); ?></div>
          <?php wp_link_pages(); ?>
          <?php comments_template( '', true ); ?>
        </div>
      <?php endwhile; ?>
      <?php posts_nav_link(); ?>
    </section>

    <aside class="sidebar-content">
      <?php get_template_part('parts/sidebars/main'); ?>
    </aside>

  </section>

<?php get_footer(); ?>
