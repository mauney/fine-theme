<?php

get_header();

date_default_timezone_set( 'America/New_York' );
$dates = [];
$numTabs = 11;
for ($i = 0; $i < $numTabs; $i++) {
    $dates[] = time() + ( ($i-7) * 24 * 60 * 60 );
}

?>

<!-- TABS -->
<ul class="tabs" id="tabs">
    
    <?php
    
    for ($i = 0; $i < $numTabs; $i++) :
        
        ?>
        
        <li class="tab <?php if ( $i === 0 ) echo 'current'; ?>" data-tab="tab<?php echo $i; ?>">
            <span><?php echo date( 'D', $dates[$i] ); ?></span><br>
            <span><?php echo date( 'M', $dates[$i] ); ?></span><br>
            <span><?php echo date( 'j', $dates[$i] ); ?></span>
        </li>
        
        <?php
        
    endfor;
    
    ?>
    
</ul>
<!-- /Tabs -->

<?php

foreach ( $dates as $index => $day ) {
    
    if (have_posts()) :
        $posts_to_show = []; // posts for the date in question
        
        // loop over posts for showtimes on date
        while ( have_posts() ) : the_post();
            $showtimes = get_post_meta( get_the_ID(), "all_show_times", true );
            
            if ( is_array ( $showtimes ) ) {
                foreach ( $showtimes as $showtime ) {
                    if ( date('ymd', $showtime["time"] ) === date( 'ymd', $day ) ) {
                        $posts_to_show[] = array (
                            "earliest-time" => $showtime[ "time" ],
                            "post-id" => get_the_ID()
                        );
                        break; // stop after the first match on date
                    }
                }
            }
        
        endwhile;
        
        // sort the date's posts by earliest showtime
        usort( $posts_to_show, function ($a, $b) {
            return strnatcmp( $a[ "earliest-time" ], $b[ "earliest-time" ] );
        } );
        
        wp_reset_postdata();
        
        ?>
        
        <div class="movie-day<?php if ( $index === 0 ) echo ' current'; ?>" id="tab<?php echo $index; ?>">
        
        <?php
        
        if ( $posts_to_show ) {
            // now that we have an order for the posts, cycle through them
            foreach ( $posts_to_show as  $post_to_show ) {
                
                // loop through the posts to find the one we are looking for
                while ( have_posts() ) : the_post();
                    
                    // display the post
                    if ( get_the_ID() === $post_to_show[ "post-id" ] ) {
                        
                        $movie_meta = get_post_meta( get_the_ID() );
                        
                        $showtimes = get_post_meta( get_the_ID(), "all_show_times", true );
                        
                        ?>
                        
                            <article class="movie-feature">
                                <?php if ($movie_meta[ "headline" ] && $movie_meta[ "headline" ][0] !== "") echo '<h2 class="special-tag">' . $movie_meta[ "headline" ][0] . '</h2>'; ?>
                                <section class="movie-main">
                                  
                                    <h2 class="movie-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                  
                                    <div class="poster-times-container">
                                        <div class="poster-container"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
                                  
                                        <ul class="times-container">
                                            
                                        <?php
                                            foreach ( $showtimes as $showtime ) :
                                                if ( date( 'ymd', $showtime[ "time" ] ) === date( 'ymd', $day ) ) :
                                                    ?>
                                                    <li>
                                                        <span class="time"><?php echo date( 'g:i a', $showtime[ "time" ] ); ?></span><br>
                                                        <span class="location"><?php echo $showtime[ "location" ]; ?></span>
                                                    </li>
                                                    <?php
                                                endif;
                                            endforeach;
                                        ?>
                                            
                                        </ul>
                                    </div>

                                    <div class="button-container">
                                        <div class="btn"><?php echo $movie_meta[ "rating" ][0]; ?></div>
                                        <div class="btn"><?php echo $movie_meta[ "running_time" ][0]; ?> min</div>
                                    </div>
                                    
                                    
                                </section>
                                
                                <p class="toggle">view movie info and preview &#9660;</p>
                                <section class="movie-extra">
                                    <p class="starring">Starring: <?php echo $movie_meta[ "starring" ][0]; ?></p>
                                    <p class="directed-by">Directed By: <?php echo $movie_meta[ "directed_by" ][0]; ?></p>
                                    <p class="trailer-reviews">
                                        <a class="watch-trailer" href="<?php echo $movie_meta[ "preview" ][0]; ?>">watch trailer</a>
                                        <a class="read-reviews" href="<?php echo $movie_meta[ "reviews" ][0]; ?>">read reviews</a>
                                    </p>
                                    <p class="description"><?php the_content(); ?></p>
                                </section>
                            </article>
                            
                        <?php
                    }
            
                endwhile;
                
                wp_reset_postdata();
                
            }
        } else {
            echo '<h3 class="no-sched">No schedule for ' . date('l, j F Y', $day) . '. Please check back later.</h3>';
        }
        
        echo '</div><!-- /.movie-day #tab' . $index . '  -->';
        
    else :
        echo '<p>No content found</p>';
            
    endif;
    
}

get_footer();
