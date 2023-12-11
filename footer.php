<?php 
$events_query = new WP_Query(array(
    'post_type' => 'event', 
    'posts_per_page' => 3, 
));
?>
<footer class="footer">
    <div class="footer-columns">
        <div class="footer-column">
            <h4>Upcoming Events</h4>
       
            <?php
                if ($events_query->have_posts()) {
                    while ($events_query->have_posts()) {
                        $events_query->the_post();

                        $post_title = get_the_title();
                        $post_link = get_permalink();  
                    ?>
                            <p>
                                <a class="post-title"
                                href="<?= $post_link; ?>"
                            ><?= $post_title ?></a>
                            </p>

                        <?php
                    }
                    wp_reset_postdata();
                } else {
                    echo 'No events found.';
                }
            ?>
        </div>
        <div class="footer-column">
            <h4>About</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla commodo blandit quam non convallis.</p>
            <!-- Add more content or elements here -->
        </div>
        <div class="footer-column">
            <h4>Contact</h4>
            <p>1234 Street Name, City, Country</p>
            <p>Email: example@example.com</p>
            <p>Phone: +1234567890</p>
            <!-- Add more content or elements here -->
        </div>
    </div>
</footer>

<script type="text/javascript"  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
$(document).ready(function() {
    $('.event-slider').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: false,
        arrows: true,
        variablewidth: true,
        dots: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                }
            }
        ],
        prevArrow: '<button type="button" class="prev"><i class="fa-sharp fa-solid fa-arrow-left"></i></button>',
        nextArrow: '<button type="button" class="next"><i class="fa-sharp fa-solid fa-arrow-right"></i></button>',

    });

});
</script>
