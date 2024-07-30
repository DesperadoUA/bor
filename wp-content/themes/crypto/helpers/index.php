<?php
function autoloadFilesInDirectory($dirPath):void {
    $files = scandir($dirPath);
    if (!$files) return;
    foreach ($files as $file) {
        if (str_ends_with($file, '.php') and !str_starts_with($file, '_')) {
            include $dirPath . $file;
        }
    }
}
function is_amp():bool {
    $url = $_SERVER['REQUEST_URI'];
    return strpos($url, 'amp') === false ? false : true;
}
function isDirLoad($dirName):bool {
    return (str_starts_with($dirName, '.') or str_starts_with($dirName, '_')) ? false : true;
}
function parseAmpContent($content) {
    if (is_amp()) {
        $parseImages = preg_match_all('/<img.*?src="([^"]+)".*?(?:data-original="([^"]+)".*?)?>/i', $content, $contentImagesData);
        $ampImageArr = [];
        foreach ($contentImagesData[0] as $key => $contentImageData) {
            $imageSrc = !empty($contentImagesData[1][$key]) ? $contentImagesData[1][$key] : '';
            $imageSrc = !empty($contentImagesData[2][$key]) ? $contentImagesData[2][$key] : $imageSrc;
            $imageInfo = getimagesize($imageSrc);
            $imageSize = !empty($imageInfo[3]) ? $imageInfo[3] : 'width="520" height="180"';
            $imageAlt = preg_match('/<img.*?alt="([^"]+).*?>/i', $contentImageData, $parseAlt);
            $imageAlt = !empty($parseAlt[1]) ? 'alt="' . $parseAlt[1] . '"' : '';
            $ampImage = '<amp-img layout="responsive" ';
            $ampImage .= $imageSize;
            $ampImage .= ' src="' . $imageSrc . '"';
            $ampImage .= $imageAlt;
            $ampImage .= '></amp-img>';
            $replaceString = htmlentities($contentImageData);
            $content = str_replace($contentImageData, $ampImage, $content);
        }
        $parsedLinks = preg_match_all('/<a.*?href="([^"]+)".*?>.*?<\/a>/i', $content, $contentLinksData);
        foreach ($contentLinksData[0] as $key => $linkData) {
            if (strpos($contentLinksData[1][$key], '#') !== 0 && !strpos($contentLinksData[1][$key], 'amp')) {
                if (strpos($contentLinksData[1][$key], 'http') !== 0 && $contentLinksData[1][$key] !== '/go/') {
                    $content = str_replace('href="' . $contentLinksData[1][$key] . '"', 'href="' . rtrim($contentLinksData[1][$key], '/') . '/amp/"', $content);
                }
            }
        }
        $content = str_replace('<iframe', '<amp-iframe', $content);
        $content = str_replace('</iframe', '</amp-iframe', $content);
        $content = str_replace("100%", '300px', $content);
        $content = preg_replace('/xml:lang=".*?"/i', '', $content);
        return $content;
    }
    return $content;
}
function getTemplate($post):string {
    if (is_page() or $post->ID === ID_FRONT) {
        switch ($post->ID) {
            case ID_FRONT:
                $template = 'FRONT_PAGE';
                break;
            default:
                $template = 'DEFAULT';
        }
    } else if (is_single()) {
        switch ($post->post_type) {
            case GAME_POST_TYPE:
                $template = 'GAME';
                break;
            default:
                $template = 'DEFAULT';
        }
    } else if (is_category()) {
        $category = get_queried_object();
        switch ($category->cat_ID) {
            default:
                $template = 'DEFAULT';
        }
    } else if (is_tax()) {
        $tax = get_queried_object();
        switch ($tax->taxonomy) {
            default:
                $template = 'DEFAULT';
        }
    } else {
        $template = 'DEFAULT';
    }
    return $template;
}
function getPostType($post):string {
    if (is_page() or $post->ID === ID_FRONT) return 'PAGES';
    else if (is_single()) return 'POSTS';
    else if (is_category()) return 'CATEGORY';
    else if (is_tax()) return 'TAX';
    else return 'POSTS';
}
function url_to_post_id($url, $post_type):int {
    $query = new WP_Query( array(
        'post_type'         => $post_type,
        'name'              => $url,
        'post_status'       => 'publish'
    ));
    if(!isset($query->post)) return 0;
    else return $query->post->ID;
}