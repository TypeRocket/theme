<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php get_header(); ?>

<main role="main">

    <section class="main-content">
        <?php while(have_posts()) : the_post() ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <?php the_content(); ?>
                <div class="tags"><?php the_tags(); ?></div>
                <?php wp_link_pages(); ?>
                <?php comments_template(); ?>
            </div>
        <?php endwhile; ?>
        <?php posts_nav_link(); ?>
    </section>

</main>

<?php wp_footer(); ?>

</body>
</html>