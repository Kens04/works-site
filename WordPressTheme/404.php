<?php get_header(); ?>

<?php
$paged = $_GET['pagenum'];
global $NO_IMAGE_URL;
?>


  <div class="p-404__title">
    <h2 class="cmn-title"><?php the_title(); ?></h2>
  </div>


<main class="404">

<div class="p-404__inner">
  <p class="p-404__text">お探しのページは<br class="br-pc__block">見つかりませんでした。</p>
</div>

<div class="home-back">
<a href="/" class="c-btn bgleft1"><span>TOPへ</span></a>
</div>

</main>

<?php get_footer(); ?>