<?php get_header(); ?>
    <main role="main">
        <?php
        while ( have_posts() ) {
            the_post();

            $format = get_post_format( $post->ID ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header clearfix">
        <?php if ( $format == 'gallery' ) {
            $images = bornholm_get_gallery_images( $post->ID );
            bornholm_gallery_header( 'h1', $images, 'bornholm_large_gallery_image_for_single_view', $post );
        } else {
            bornholm_the_post_header( 'h1', $post );
        } ?>
    </header>


            comments_template( '', true );
        } ?>
    </main>
<?php if ( $format == 'gallery' ) {
} else {
    get_sidebar();
}
get_footer();