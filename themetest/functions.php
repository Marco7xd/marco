<?php
/**
 * Displays the header for normal posts
 *
 * @param $heading
 *
 * @return string Formatted output in HTML
 */
function bornholm_the_post_header( $heading, $post ) {
    if ( has_post_thumbnail() ) {
        if ( ! is_single() ) { ?>
            <a href="<?php esc_url( the_permalink() ); ?>">
        <?php } ?>
        echo '<' . $heading . ' class="entry-title">';
        the_title();
        echo '</' . $heading . '>'; ?>
        <figure class="featured-image">
            <?php the_post_thumbnail(); ?>
        </figure>
        <?php if ( ! is_single() ) { ?>
            </a>
        <?php }
    } else {
        bornholm_post_title( $heading, $post );
    }
}
/**
 * Displays the post title
 *
 * @param $heading
 *
 * @return string Formatted output in HTML
 */
function bornholm_post_title( $heading, $post ) {
    echo '<' . $heading . ' class="entry-title">';
    if ( ! is_single() ) { ?>
        <a href="<?php esc_url( the_permalink() ); ?>">
    <?php }
    the_title();
    if ( ! is_single() ) { ?>
        </a>
    <?php }
    echo '</' . $heading . '>';
}