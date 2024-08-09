<?php global $builder; ?>
<?php get_header(); ?>
<?php 
    include 'components/main_banner/dal.php';
    include 'components/game_info/dal.php';
?>
<div class="w-center">
    <div class="c-columns w-gap">
        <div class="c-columns__col">
            <?php
                include 'components/h1/dal.php';
                include 'components/content/dal.php';
            ?>
        </div>
        <div class="c-columns__col--side">
            <?php
                include 'components/side/dal.php';
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>