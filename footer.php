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
            <p>Valletta, Malta</p>
            <p>event@events.com</p>
            <p>+356 9946 9146</p>
            <!-- Add more content or elements here -->
        </div>
    </div>
</footer>

