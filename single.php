<?php

get_header();

date_default_timezone_set( 'America/New_York' );
$dates = [];
// for ($i = 0; $i < 5; $i++) {
//     $dates[] = strtotime( '2016-09-21 11:00' ) + ( $i * 24 * 60 * 60 );
// }
for ($i = 0; $i < 5; $i++) {
    $dates[] = time() + ( ($i) * 24 * 60 * 60 );
}

?>

<!-- TABS -->
<nav class="calendar-tabs">
    <ul class="tabs">
        
    <?php
    
    for ($i = 0; $i < 5; $i++) :
    
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
</nav>

  <div class="movie-day current" id="tab1">
    <article class="movie-feature">
      <h2 class="special-tag">Ends Thursday</h2>
      <section class="movie-main">
        <div class="poster-title">
          <div class="movie-poster-small">
              <?php the_post_thumbnail() ?>
          </div>
          <div class="title">
            <h2 class="movie-title">Indignation</h2>
            <p class="rating">R</p>
            <p class="running-time">110 min</p>
          </div>
        </div><!-- /poster-title -->
        <ul class="show-times">
          <li><span class="time">1:00 pm</span><span class="location">downstairs</span></li>
          <li><span class="time">4:00 pm</span><span class="location">downstairs</span></li>
          <li><span class="time">7:00 pm</span><span class="location">downstairs</span></li>
        </ul>
      </section>
      <p class="toggle">more &#9660;</p>
      <section class="movie-extra">
        <p class="starring">Starring: Logan Lerman and Sarah Gadon</p>
        <p class="directed-by">Directed By: James Schamus</p>
        <p class="trailer-reviews">
          <span class="watch-trailer">watch trailer</span>
          <span class="read-reviews">read reviews</span>
        </p>
        <p class="description">Based on Philip Roth's late novel, Indignation takes place in 1951, as Marcus Messner (Logan Lerman), a brilliant working class Jewish boy from Newark, New Jersey, travels on scholarship to a small, conservative college in Ohio, thus exempting him from being drafted into the Korean War. But once there, Marcus's growing infatuation with his beautiful classmate Olivia Hutton (Sarah Gadon), and his clashes with the college's imposing Dean, Hawes Caudwell (Tracy Letts), put his and his family's best laid plans to the ultimate test.</p>
      </section>
    </article>
  </div> <!-- /tab1 -->

<!-- /Tabs -->