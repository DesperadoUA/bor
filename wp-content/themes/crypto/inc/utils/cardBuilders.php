<?php

function casinoAsideCard($arr_id) {
    $data = [];
    foreach ($arr_id as $item) {
        $currentPost = get_post( $item );
        $rating = carbon_get_post_meta($currentPost->ID, FIELDS_KEY['RATING']);
        $ref = carbon_get_post_meta($currentPost->ID, FIELDS_KEY['REF']);
        $thumbnail = get_img_item(get_post_thumbnail_id($currentPost));
        $data[] = new CasinoAsideItem(
            $currentPost->post_title,
            $ref,
            $rating,
            $thumbnail
        );
    }
    return new CasinoAsideList($data);
}