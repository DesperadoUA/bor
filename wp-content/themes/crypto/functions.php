<?php
include 'helpers/index.php';
autoloadFilesInDirectory(__DIR__."/constants/");
autoloadFilesInDirectory(__DIR__."/interfaces/");
autoloadFilesInDirectory(__DIR__."/models/");
autoloadFilesInDirectory(__DIR__."/traits/");
$files = scandir(__DIR__."/inc/");
foreach($files as $file) {
    $path = __DIR__.'/inc/'.$file;
    if(is_dir($path) and isDirLoad($file)) autoloadFilesInDirectory($path.'/');
}
const ROOT_DIR = __DIR__;
define('ALL_POST_TYPES', array_merge(['posts', 'page'], [GAME_POST_TYPE, CASINO_POST_TYPE]));
const ALL_TAXONOMIES = [];
define('HOST_URL', get_site_url( null, '', 'https' ));
const DEFAULT_IMG = HOST_URL.'/wp-content/themes/crypto/assets/img/default.jpg';
add_theme_support( 'post-thumbnails' );
add_theme_support('menus');
add_filter('wp_insert_post_data', function ($data, $postarr) { 
    $data['post_content'] = wpautop($data['post_content']); 
    return $data; }, 
    10, 2);
const APP_DIR = __DIR__ . '/app/';
$builder = is_amp() ? new AmpBuilder() : new DefaultBuilder();