<?php global $builder; ?>
<?php get_header(); ?>
<?php 
    include 'components/main_banner/dal.php';
    include 'components/game_info/dal.php';
    include 'components/h1/dal.php';
?>
<section class="section_padding">
<?php
    include 'components/content/dal.php';
?>
</section>
<?php get_footer(); ?>