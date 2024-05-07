<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package first-theme
 */

get_header();
?>

<main id="primary" class="site-main">

    <div class="container postcontainer" style="background-color: <?php echo '#' . substr(md5(rand()), 0, 6); ?>;color: <?php echo '#' . substr(md5(rand()), 0, 6); ?>;">
        <div class="row">
            <div class="col-md-8">
			<div class="breadcrumb">
                    <?php
                    if (function_exists('breadcrumb_trail')) {
                        breadcrumb_trail(array(
                            'separator' => '&nbsp;&#47;&nbsp;',
                            'before' => '',
                            'show_browse' => false,
                            'singular_post_taxonomy' => 'category'
                        ));
                    }
                    ?>
                </div>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title post-title">', '</h1>' ); ?>
                        <div class="entry-meta">
                            <?php
                            echo '<span class="posted-on postedtame">' . esc_html__( 'Posted on', 'first-theme' ) . ' <a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><time class="entry-date published" datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time></a></span>';

                            if ( 'post' === get_post_type() ) {
                                echo '<span class="byline"> ' . esc_html__( 'by', 'first-theme' ) . ' <span class="author vcard">' . esc_html( get_the_author() ) . '</span></span>';
                            }
                            ?>
                        </div><!-- .entry-meta -->
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages(
                            array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'first-theme' ),
                                'after'  => '</div>',
                            )
                        );
                        ?>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer">
                        <?php
                        if ( 'post' === get_post_type() ) {
                            echo '<div class="entry-categories">' . esc_html__( 'Categories: ', 'first-theme' ) . get_the_category_list( ', ' ) . '</div>';
                            echo '<div class="entry-tags">' . esc_html__( 'Tags: ', 'first-theme' ) . get_the_tag_list( '', ', ' ) . '</div>';
                        }
                        ?>
                    </footer><!-- .entry-footer -->
                </article><!-- #post-<?php the_ID(); ?> -->

                <?php
                the_post_navigation(
                    array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'first-theme' ) . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'first-theme' ) . '</span> <span class="nav-title">%title</span>',
                    )
                );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            </div><!-- .col-md-8 -->

            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div><!-- .col-md-4 -->
        </div><!-- .row -->
    </div><!-- .container -->
</main><!-- #main -->

<?php
get_footer();
