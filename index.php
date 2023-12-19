<?php
// Query the 'Events' custom post type
$events_query = new WP_Query(array(
    'post_type' => 'event',
    'posts_per_page' => 5,
));
$page_id = 6;
$page = get_post($page_id);
$page_title = $page->post_title;
$page_content = $page->post_content;
?>

<?php get_header(); ?>

<section class="home-banner">

    <img src="<?php echo esc_url('/wp-content/uploads/2023/12/header-bg-scaled.jpg'); ?>" alt="Header Image" class="background-img">
        <div class="innner-sec">
            <h1 class="event-title"><?= $page_title; ?></h1>
        </div>
</section>

<section class="page-content">
    <?= $page_content ?>
</section>

<section class="events-section">
    <h1 class="event-titles">Upcoming events</h1>

    <div class="event-slider">
        <?php if ($events_query->have_posts()) : ?>
            <?php while ($events_query->have_posts()) : $events_query->the_post(); ?>
                <div class="events">
                    <?php
                    $post_title = get_the_title();
                    $post_description = get_the_excerpt();

                    if (has_block("core/image", get_the_content())) {
                        $post_blocks = parse_blocks(get_the_content());
                        foreach ($post_blocks as $post_block) {
                            if ("core/image" === $post_block["blockName"]) {
                                $image_id = $post_block["attrs"]["id"];
                                $image_url = wp_get_attachment_image_url($image_id, 'full');
                                ?>
                                <img src="<?= esc_url($image_url) ?>" class="event-img">
                                <?php
                            }
                        }
                    }
                    ?>
                    <h2 class="slider-title"><?= $post_title ?></h2>
                    <p class="slider-desc"><?= $post_description ?></p>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p>No events found.</p>
        <?php endif; ?>
    </div>
</section>

<section class="speakers">
    <h3 class="speakers-title">Speakers from API</h3>
    <div class="spekers-sliders">
    </div>
</section>
<?php get_footer();?>