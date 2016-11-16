<?php

get_header();

if (have_posts()):
    while (have_posts()): the_post(); ?>
    
    <article class="page">
        <h2><?php the_title(); ?></h2>
        <h3>page-coming-soon template test</h3>
        <?php the_content(); ?>
    </article>
    
    
    <?php endwhile;
    
    else:
        
        echo '<p>No content found</p>';
        
    endif;

get_footer();