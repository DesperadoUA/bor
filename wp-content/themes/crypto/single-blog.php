<?php get_header(); ?>
<div class="w-outer">
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
</div>
<?php get_footer(); ?>