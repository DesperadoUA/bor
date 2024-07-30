<?php
interface Builder {
    public function ampAttrHead();
    public function wp_head(HeadData $data);
    public function styles($str);
    public function canonical();
    public function wp_footer();
    public function footer();
    public function header(ImgItem $logo, MenuData $menu, SocialLinks $social);
    public function content($content);
    public function getTranslate($key);
    public function h1(string $str);
    public function mainBanner();
    public function gameInfo();
}