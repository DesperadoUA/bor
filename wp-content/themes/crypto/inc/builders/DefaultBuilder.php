<?php
class DefaultBuilder implements Builder {
    use UI;
    use Game;
    use Header;
    use Casino;
    private $ampPrefix = PREFIX_AMP;
    private $translate = TRANSLATE;
    private $lang = LANG;
    private $siteUrl = SITE_URL;
    private $url = URL;
    public function wp_head(HeadData $data):string {
        wp_head();
        return "<title>{$data->title}</title>
              <meta name='description' content='{$data->description}'>";
    }
    public function styles($str):string {
        return "<style>{$str}</style>";
    }
    public function canonical():string {
        $link = get_site_url() . URL;
        return "<link rel='canonical' href='{$link}'>";
    }
    public function wp_footer():string {
        wp_footer();
        global $post;
        $template = getTemplate($post);
        $postType = getPostType($post);
        $fileName = '.js';
        $filePath = TEMPLATE_DIR_URI."/dist/".TEMPLATES_DI_STYLE[$postType][$template].$fileName;
        return "
        <div class='c-footer w-gap-ftr-alt js-affix-stop'>
<div class='c-footer__content w-center'>
<div class='grid'>
<div class='grid__c-12 grid__c-xmd-9'>
<ul class='c-footer__menu'>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/book-of-ra-fixed/' aria-label='Book of Ra Fixed' title='Book of Ra Fixed'>Book of Ra Fixed</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/book-of-ra-um-echtgeld-spielen/' aria-label='Book Of Ra Echtgeld' title='Book Of Ra Echtgeld'>Book Of Ra Echtgeld</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/50-freispiele-ohne-einzahlung/' aria-label='50 Freispiele Ohne Einzahlung' title='50 Freispiele Ohne Einzahlung'>50 Freispiele Ohne Einzahlung</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/uber-uns/' aria-label='Über uns' title='Über uns'>Über uns</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/book-of-ra-2-gratis-spielen/' aria-label='Book Of Ra 2' title='Book Of Ra 2'>Book Of Ra 2</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/novoline-casino-spiele/' aria-label='Novoline Spiele' title='Novoline Spiele'>Novoline Spiele</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/casino-mit-5-euro-einzahlung/' aria-label='5 Euro Einzahlung' title='5 Euro Einzahlung'>5 Euro Einzahlung</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/datenschutzerklaerung/' aria-label='Datenschutzerklärung' title='Datenschutzerklärung'>Datenschutzerklärung</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/book-of-ra-deluxe/' aria-label='Book of Ra Deluxe' title='Book of Ra Deluxe'>Book of Ra Deluxe</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/book-of-dead-kostenlos/' aria-label='Book of Dead' title='Book of Dead'>Book of Dead</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/10-euro-bonus-ohne-einzahlung-casino/' aria-label='10 Euro Bonus ohne Einzahlung' title='10 Euro Bonus ohne Einzahlung'>10 Euro Bonus ohne Einzahlung</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/contact-us/' aria-label='Kontaktformular' title='Kontaktformular'>Kontaktformular</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/book-of-ra-classic/' aria-label='Book of Ra Classic' title='Book of Ra Classic'>Book of Ra Classic</a>
 </li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/book-of-ra-6/' aria-label='Book of Ra 6' title='Book of Ra 6'>Book of Ra 6</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/casino-20-euro-bonus-ohne-einzahlung/' aria-label='20 Euro Bonus ohne Einzahlung' title='20 Euro Bonus ohne Einzahlung'>20 Euro Bonus ohne Einzahlung</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/category/artikel/' aria-label='Artikel und Nachrichten' title='Artikel und Nachrichten'>Artikel und Nachrichten</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/book-of-ra-magic-kostenlos-spielen/' aria-label='Book of Ra Magic' title='Book of Ra Magic'>Book of Ra Magic</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/book-of-ra-deluxe-6/' aria-label='Book of Ra Deluxe 6' title='Book of Ra Deluxe 6'>Book of Ra Deluxe 6</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/casino-25-euro-bonus-ohne-einzahlung/' aria-label='25 Euro Bonus ohne Einzahlung' title='25 Euro Bonus ohne Einzahlung'>25 Euro Bonus ohne Einzahlung</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/verantwortungsvolles-spielen/' aria-label='Verantwortungsvolles Spielen' title='Verantwortungsvolles Spielen'>Verantwortungsvolles Spielen</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/book-of-ra-mobile/' aria-label='Book Of Ra Mobile' title='Book Of Ra Mobile'>Book Of Ra Mobile</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/online-casino-einzahlung-per-telefonrechnung/' aria-label='Casino Einzahlung per Telefonrechnung' title='Casino Einzahlung per Telefonrechnung'>Casino Einzahlung per Telefonrechnung</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/online-casino-echtgeld/' aria-label='Echtgeld Casino' title='Echtgeld Casino'>Echtgeld Casino</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/online-casino-mit-hoher-gewinnchance/' aria-label='Casino mit hoher Gewinnchance' title='Casino mit hoher Gewinnchance'>Casino mit hoher Gewinnchance</a>
</li>
<li class='c-footer__menu-el'>
<a class='c-footer__link' href='/casino-schnelle-auszahlung/' aria-label='Casino schnelle Auszahlung' title='Casino schnelle Auszahlung'>Casino schnelle Auszahlung</a>
</li>
 <li class='c-footer__menu-el'>
<a class='c-footer__link' href='/slots-mit-hoher-auszahlung/' aria-label='Slots mit hoher Auszahlung' title='Slots mit hoher Auszahlung'>Slots mit hoher Auszahlung</a>
</li>
</ul>
</div>
<div class='grid__c-12 grid__c-xmd-3'>
<div class='c-footer__bttm-box'>
<div class='c-footer__nav-box'>
<div class='c-social '>
<span class='js-share' style='display:none;' data-id='footer62386246d6e2a' data-link='/stargames-book-of-ra/'></span>
<div class='c-social__content' id='footer62386246d6e2a'>
<div class='c-social__title'>Teilen:</div>
<div class='c-social__btn-box'>
<div class='c-social__btn-item'>
<button class='c-social__btn c-social__btn--tw js-share-item' aria-label='Twitter button' data-share='tw'></button>
</div>
<div class='c-social__btn-item'>
<button class='c-social__btn c-social__btn--fb js-share-item' aria-label='Facebook-Button' data-share='fb'></button>
</div>
</div>
</div>
</div>
<div class='c-lng'>
<button class='c-lng__btn' id='drop-lng' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' aria-label='switch language'>
<picture><source srcset='/wp-content/uploads/2024/07/de.png.webp' type='image/webp'>
<img src='/wp-content/uploads/2024/07/de.png.webp' alt='de' class=' webpexpress-processed'></picture>
<span>DE</span>
</button>
<div class='c-lng__drop dropdown-menu' aria-labelledby='drop-lng'>
<ul class='c-lng__drop-list js-scroll-bar mCustomScrollbar _mCS_4 mCS_no_scrollbar'><div id='mCSB_4' class='mCustomScrollBox mCS-light mCSB_vertical mCSB_inside' tabindex='0' style='max-height: 0px;'><div id='mCSB_4_container' class='mCSB_container mCS_y_hidden mCS_no_scrollbar_y' style='position:relative; top:0; left:0;' dir='ltr'>
<li class='c-lng__drop-el'>
<a class='c-lng__drop-btn' href='https://book-of-ra-play.com/it/'>
<picture>
<source srcset='/web/20220321113221im_//static/img/general/lng-cork.png' 
data-srcset='https://web.archive.org/web/20220321113221im_//wp-content/webp-express/webp-images/static/img/general/it.png.webp' type='image/webp'><source srcset='/web/20220321113221im_//static/img/general/lng-cork.png' data-srcset='/web/20220321113221im_//static/img/general/it.png' type='image/png'><img class='lazyload webpexpress-processed mCS_img_loaded' src='/web/20220321113221im_//static/img/general/lng-cork.png' data-src='/static/img/general/it.png' alt='it'></picture>
<span>IT</span>
</a>
</li>
<li class='c-lng__drop-el'>
<a class='c-lng__drop-btn' href='https://bookofra-slot.fr/stargames-book-of-ra/'>
<picture><source srcset='/web/20220321113221im_//static/img/general/lng-cork.png' data-srcset='https://web.archive.org/web/20220321113221im_//wp-content/webp-express/webp-images/static/img/general/fr.png.webp' type='image/webp'><source srcset='/web/20220321113221im_//static/img/general/lng-cork.png' data-srcset='/web/20220321113221im_//static/img/general/fr.png' type='image/png'><img class='lazyload webpexpress-processed mCS_img_loaded' src='/web/20220321113221im_//static/img/general/lng-cork.png' data-src='/static/img/general/fr.png' alt='fr'></picture>
<span>FR</span>
</a>
</li>
<li class='c-lng__drop-el'>
<a class='c-lng__drop-btn' href='https://bookofra-slot.es/'>
<picture><source srcset='/web/20220321113221im_//static/img/general/lng-cork.png' data-srcset='https://web.archive.org/web/20220321113221im_//wp-content/webp-express/webp-images/static/img/general/es.png.webp' type='image/webp'><source srcset='/web/20220321113221im_//static/img/general/lng-cork.png' data-srcset='/web/20220321113221im_//static/img/general/es.png' type='image/png'><img class='lazyload webpexpress-processed mCS_img_loaded' src='/web/20220321113221im_//static/img/general/lng-cork.png' data-src='/static/img/general/es.png' alt='es'></picture>
 <span>ES</span>
</a>
</li>
<li class='c-lng__drop-el'>
<a class='c-lng__drop-btn' href='https://book-of-ra-play.com/book-of-ra-stargames/'>
<picture><source srcset='/web/20220321113221im_//static/img/general/lng-cork.png' data-srcset='https://web.archive.org/web/20220321113221im_//wp-content/webp-express/webp-images/static/img/general/en.png.webp' type='image/webp'><source srcset='/web/20220321113221im_//static/img/general/lng-cork.png' data-srcset='/web/20220321113221im_//static/img/general/en.png' type='image/png'><img class='lazyload webpexpress-processed mCS_img_loaded' src='/web/20220321113221im_//static/img/general/lng-cork.png' data-src='/static/img/general/en.png' alt='en'></picture>
<span>EN</span>
</a>
</li>
</div><div id='mCSB_4_scrollbar_vertical' class='mCSB_scrollTools mCSB_4_scrollbar mCS-light mCSB_scrollTools_vertical' style='display: none;'><div class='mCSB_draggerContainer'><div id='mCSB_4_dragger_vertical' class='mCSB_dragger' style='position: absolute; min-height: 30px; top: 0px;'><div class='mCSB_dragger_bar' style='line-height: 30px;'></div></div><div class='mCSB_draggerRail'></div></div></div></div></ul>
</div>
</div>
</div>
<div class='c-footer__protects-box'>
<a class='c-footer__protects-link' target='_blank' rel='nofollow' 
href='//web.archive.org/web/20220321113221/https://www.dmca.com/Protection/Status.aspx?ID=690fdb5f-9db1-40ee-9841-da141f2af25d' 
title='DMCA.com-Schutzstatus' aria-label='DMCA.com-Schutzstatus'>
<picture>
<source srcset='/wp-content/uploads/2024/07/dmca.png.webp' type='image/webp'>
<img class='webpexpress-processed lazyloaded' width='121' height='24' src='/wp-content/uploads/2024/07/dmca.png.webp' 
alt='DMCA.com-Schutzstatus'></picture>
</a>
<a class='c-footer__protects-link' href='https://www.egba.eu/' rel='nofollow' 
aria-label='European Gaming and Betting Association (EGBA)' 
title='European Gaming and Betting Association (EGBA)'>
<picture>
<source srcset='/wp-content/uploads/2024/07/egba.png.webp' type='image/webp'>
<img class='webpexpress-processed lazyloaded' width='144' height='21' src='/wp-content/uploads/2024/07/egba.png.webp' 
alt='European Gaming and Betting Association (EGBA)'></picture>
</a>
<a class='c-footer__protects-link' href='https://about.gambleaware.org/' rel='nofollow' aria-label='GambleAware' title='GambleAware'>
<picture><source srcset='/wp-content/uploads/2024/07/gamble-aware.png.webp' type='image/webp'>
<img class='webpexpress-processed lazyloaded' width='116' height='28' src='/wp-content/uploads/2024/07/gamble-aware.png.webp' alt='GambleAware'></picture>
</a>
<span class='c-footer__protects-link'>
<span>Hergestellt in</span>
<picture>
<source srcset='/wp-content/uploads/2024/07/country.png-1.webp' type='image/webp'>
<img class='webpexpress-processed lazyloaded' width='23' height='20' 
src='/wp-content/uploads/2024/07/country.png-1.webp' alt='Hergestellt in Deutschland' title='Hergestellt in Deutschland'></picture>
<picture><source srcset='/wp-content/uploads/2024/07/austria.png.webp' type='image/webp'>
<img class='webpexpress-processed lazyloaded' width='23' height='20' src='/wp-content/uploads/2024/07/austria.png.webp'
 alt='Hergestellt in Österreich' title='Hergestellt in Österreich'></picture>
</span>
<a class='c-footer__protects-link' href='https://certify.gpwa.org/verify/bestbettingcasinos.com/' target='_blank' rel='nofollow' alt='gpwa' title='gpwa'>
<picture><source srcset='/wp-content/uploads/2024/07/gpwa.png.webp' type='image/webp'>
<img class='webpexpress-processed lazyloaded' width='67' height='25' src='/wp-content/uploads/2024/07/gpwa.png.webp' alt='gpwa'></picture>
</a>
<span class='c-footer__protects-link'>
<picture><source srcset='/wp-content/uploads/2024/07/18.png.webp' type='image/webp'>
<img class='webpexpress-processed lazyloaded' width='32' height='33' src='/wp-content/uploads/2024/07/18.png.webp' alt='18+' title='18+'></picture>
</span>
</div>
</div>
<p class='c-footer__copy'>Gumpendorfer Str 142 1060, Wien, Österreich © 2022</p>
</div>
</div>
</div>
</div>
        <script type='text/javascript' src='{$filePath}' ></script>";
    }
    public function ampAttrHead():string {
        return "";
    }
    public function header(ImgItem $logo, MenuData $menuData, SocialLinks $social):string {
        $logoHtml = $this->logo($logo);
        $menuHtml = $this->menu($menuData);
        $modalMenuHtml = $this->modalMenu($menuData);
        $socialHtml = $this->social($social);
        return "<header class='c-header js-header'>
                    <div class='c-header__content w-center'>
                        <div class='c-header__top js-header-top'>
                            {$logoHtml}
                            {$menuHtml}
                        </div>
                        <div class='c-header__modal js-header-modal'>
                            {$modalMenuHtml}
                            {$socialHtml}
                        </div>
                    </div>
                </header>";
    }
    public function footer():string {
        return "<footer>Default Footer</footer>";
    }
    public function content($content):string {
        return "<section class='default_cms'>
                    <div class='container'>
                        <article class='cms'>
                            {$content}
                        </article>
                    </div>
                </section>";
    }
    public function getTranslate($key):string {
        return array_key_exists($key, $this->translate) ? $this->translate[$key][$this->lang] : "";
    }
    public function headerMenu(MenuData $data):string {
        if(empty($data->posts)) return "";
        $html = "<menu><nav class='header_nav' id='container-menu'>
                    <button class='menu_close' type='button' id='burger-close'></button>
                    <ul class='menu'>";
        foreach ($data->posts as $item) {
            $html .= "<li class='menu_item'>
                                  <a href='{$item->url}'>{$item->title}</a>";
            if(!empty($item->children)) {
                $html .= '<div class="drop_menu">';
                foreach ($item->children as $item_children) {
                    $html .= "<a class='drop_menu_item' href='{$item_children->url}'>{$item_children->title}</a>";
                }
                $html .= '</div>';
            }
            $html .= "</li>";
        }
        $html .= "</ul></nav></menu>";
        return $html;
    }
    public function h1($str):string {
        return "<section class='section_heading'>
                   <div class='container'>
                      <h1 class='c-h1'>$str</h1>
                   </div>
               </section>";
    }
    public function mainBanner():string {
        return "<div class='c-game w-gap-from-lg js-skrollr'>
                    <div class='w-center'>
                        <div class='c-game__inner js-game-container'>
                            <button class='c-game__full js-full' aria-label='Vollbild'>
                            <img class='lazyloaded' 
                            src='/wp-content/themes/crypto/assets/img/sprite.svg#i-fullscreen' 
                            data-src='/wp-content/themes/crypto/assets/img/sprite.svg#i-fullscreen' width='100%' height='100%' alt='Vollbild' title='Vollbild'>
                            </button>
                        <div class='c-game__container'>
                            <div class='c-game__img-cap js-show-game'>
                                <div class='c-game__img'>
                                    <picture>
                                        <source srcset='/wp-content/themes/crypto/assets/img/2IsSGgLDsY6rjeRs.webp' 
                                            media='(min-width: 0px)' type='image/webp'>
                                        <img src='/wp-content/themes/crypto/assets/img/2IsSGgLDsY6rjeRs.jpg' 
                                            alt='Book of Ra kostenlos 2022 online spielen!' 
                                            title='Book of Ra kostenlos 2022 online spielen!' 
                                            class='webpexpress-processed'>
                                    </picture> 
                                </div>
        <div class='c-game__btn-box'>
            <button class='c-game__btn-demo js-iframe-btn'>
                Demo <img class='c-game__btn-demo-bg' 
                        src='/wp-content/themes/crypto/assets/img/sprite.svg#btn-play' 
                        width='97%' 
                        height='97%' 
                        alt='Demo' 
                        title='Demo'>
                    <img class='c-game__btn-demo-bd' 
                        src='/wp-content/themes/crypto/assets/img/sprite.svg#btn-play-bd' 
                        width='100%' 
                        height='100%' 
                        alt='Demo' 
                        title='Demo'>
            </button>
                <a href='#' data-href='' 
                    rel='nofollow'
                    class='c-btn c-btn--secondary c-game__btn-money is-hide-to-sm' title='Um Geld spielen'>10 Euro Bonus ohne Einzahlung</a> 
            </div>
            </div>
            <div class='c-game__window-game js-window-game' style='height: 682px;'>
            <div class='c-game__embed c-embed-resp js-iframe'></div>
            </div>
            </div>
            </div>
                <a href='#' 
                    data-href='' 
                    rel='nofollow'
                    class='c-btn c-btn--primary c-btn--lg c-game__btn-money-bttm is-hide-from-sm' title='Um Geld spielen'>
                        10 Euro Bonus ohne Einzahlung
                </a> 
            </div>
            <div class='c-game__bg-decor c-game__bg-decor--left skrollable skrollable-between'>
                    <picture>
                    <source srcset='/wp-content/themes/crypto/assets/img/img-left-382х639.png.webp' 
                    data-srcset='/wp-content/themes/crypto/assets/img/img-left-382х639.png.webp' 
                    type='image/webp'>
                    <source srcset='/wp-content/themes/crypto/assets/img/img-left-382х639.png' 
                    data-srcset='/wp-content/themes/crypto/assets/img/img-left-382х639.png' 
                    type='image/png'>
                    <img class='webpexpress-processed lazyloaded' 
                    width='382' 
                    height='639' 
                    src='/wp-content/themes/crypto/assets/img/img-left-382х639.png' 
                    data-src='/wp-content/themes/crypto/assets/img/img-left-382х639.png' alt='decor left' title='decor left'>
                    </picture>
            </div>
            <div class='c-game__bg-decor c-game__bg-decor--right skrollable skrollable-between'>
                <picture>
                    <source srcset='/wp-content/themes/crypto/assets/img/img-right-354х557.png.webp' 
                        data-srcset='/wp-content/themes/crypto/assets/img/img-right-354х557.png.webp' 
                        type='image/webp'>
                    <source srcset='/wp-content/themes/crypto/assets/img/img-right-354х557.png' 
                        data-srcset='/wp-content/themes/crypto/assets/img/img-right-354х557.png' 
                        type='image/png'>
                        <img class='webpexpress-processed lazyloaded' width='354' height='557' 
                        src='/wp-content/themes/crypto/assets/img/img-right-354х557.png' 
                        data-src='/wp-content/themes/crypto/assets/img/img-right-354х557.png' 
                        alt='decor right' title='decor right'>
                    </picture>
            </div>
            </div>";
    }
    public function gameInfo(GameInfoList $list):string {
        $listHtml = $this->gameInfoLoop($list);
        return "<div class='w-center'>
        <div class='c-game-info w-gap w-gap--sm-mob'>
            <div class='c-game-info__col c-game-info__col--double'>
                <div class='c-game-info__box'>
                    <div class='c-game-info__header'>Spieleigenschaften</div>
                        <a href='#' class='c-btn c-btn--primary c-game-info__btn is-hide-to-sm' title='Um Geld spielen'>
                            10 Euro Bonus ohne Einzahlung
                        </a> 
                    </div>
                    <div class='c-game-info__slider-arrows js-game-info-arrows c-slider-arrows'>
                        <button class='swiper-button-prev swiper-arrow' aria-label='Previous' type='button' style=''>Previous</button>
                        <button class='swiper-button-next swiper-arrow' aria-label='Next' type='button' style=''>Next</button></div>
                    </div>
                    {$listHtml}
            </div>
        </div>";
    }
    public function asideCasinoLoop(CasinoAsideList $list) {
        $list = $this->casinoAsideLoop($list);
        return "<div class='c-columns__col-inner js-affix-box'>
                    <div class='c-columns__content c-columns__content--author-bttm js-affix-column affix-bottom'>
                        <div class='c-side-box c-side-box--alt w-no-indent-mob'>
                            <div class='c-side-box__title'>Top 5 Echtgeld Casinos</div>
                            <div class='c-side-box__content'>
                                {$list}
                                <div class='c-side-box__btn-box'>
                                    <a class='c-btn c-btn--more c-btn--full' href='/category/casino/' title='Alle Casinos'>Alle Casinos</a>
                                </div>
                            </div>
                        </div>
                </div>";
    }
}