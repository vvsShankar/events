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

    <img src="<?php echo esc_url('http://events.local/wp-content/uploads/2023/12/header-bg-scaled.jpg'); ?>" alt="Header Image" class="background-img">
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


<script>
    // Function to fetch data from the API and handle errors
    const fetchData = () => {
        fetch('https://jsonplaceholder.typicode.com/users')
        .then(res => {
        if (!res.ok) {
            throw new Error('*** Failed to fetch data');
        }
        return res.json();
        })
        .then(data => {
        const userDetails = data.map(user => {
            const nameMarkup = `<h4 class="name">${user.name}</h4>`;
            const emailMarkup = `<p class="email">${user.email}</p>`;
            return `<div class="list">${nameMarkup}${emailMarkup}</div>`;
        });
        document.querySelector('.spekers-sliders').innerHTML = userDetails.join('');

        // Cache the fetched data in the browser's local storage
        localStorage.setItem('cachedUserData', JSON.stringify(data));
        })
        .catch(error => {
        console.log('Error:', error.message);
        const errorMessage = `<p>Failed to fetch data. Please try again later.</p>`;
        document.querySelector('.spekers-sliders').innerHTML = errorMessage;
        
        // Attempt to retrieve cached data and display it if available
        const cachedData = localStorage.getItem('cachedUserData');
        if (cachedData) {
            const data = JSON.parse(cachedData);
            const userDetails = data.map(user => {
            const nameMarkup = `<h4 class="name">${user.name}</h4>`;
            const emailMarkup = `<p class="email">${user.email}</p>`;
            return `<div class="list">${nameMarkup}${emailMarkup}</div>`;
            });
            document.querySelector('.spekers-sliders').innerHTML = userDetails.join('');
        }
        });
    };

    // Fetch data when the DOM content is loaded
    document.addEventListener('DOMContentLoaded', fetchData);
</script>


<?php get_footer();?>