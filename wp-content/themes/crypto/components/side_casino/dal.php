<?php 
$ids = get_public_post_id_by_rating(CASINO_POST_TYPE, 5);
echo $builder->asideCasinoLoop(casinoAsideCard($ids));
?>