<?php
class DefaultBuilder implements Builder {
    use UI;
    use Game;
    use Header;
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
        return "<script type='text/javascript' src='{$filePath}' ></script>";
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
                      <h1>$str</h1>
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
                <a href='#' data-href='https://book-of-ra-slot.com' 
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
                    data-href='https://book-of-ra-slot.com' 
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
    public function gameInfo():string {
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
                    <div class='c-game-info__slider c-slider js-game-info-slider game-info-wrapper'>
                        <div class='swiper-wrapper'>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-max-coin'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Max Münzwert pro Dreh</div>
                                        <p class='c-game-info__text'>18</p>
                                        <p class='c-game-info__num'>22</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-min-bet'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Mindesteinsatz</div>
                                        <p class='c-game-info__text'>1 pro Linie</p>
                                        <p class='c-game-info__num'>23</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-max-bet'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Maximaleinsatz</div>
                                        <p class='c-game-info__text'>200 pro Linie</p>
                                        <p class='c-game-info__num'>24</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-betting-range'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Wettbereich</div>
                                        <p class='c-game-info__text'>€ 0.02 - € 5.00</p>
                                        <p class='c-game-info__num'>25</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-max-win'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Max Gewinn</div>
                                        <p class='c-game-info__text'>x10014.1</p>
                                        <p class='c-game-info__num'>26</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-software'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Software</div>
                                        <p class='c-game-info__text'>Novomatic</p>
                                        <p class='c-game-info__num'>01</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-slot-type'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Slot-Typ</div>
                                        <p class='c-game-info__text'>Klassischer Slot</p>
                                        <p class='c-game-info__num'>02</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-year-launched'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Startjahr</div>
                                        <p class='c-game-info__text'>2009</p>
                                        <p class='c-game-info__num'>03</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-theme'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Thema</div>
                                        <p class='c-game-info__text'>Alte Zivilisationen</p>
                                        <p class='c-game-info__num'>04</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-rtp'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Rtp</div>
                                        <p class='c-game-info__text'>92%</p>
                                        <p class='c-game-info__num'>05</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-mobile-friendly'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Handyfreundlich</div>
                                        <p class='c-game-info__text'>Ja</p>
                                        <p class='c-game-info__num'>06</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-bonus-game'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Bonusspiel</div>
                                        <p class='c-game-info__text'>Ja</p>
                                        <p class='c-game-info__num'>07</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-free-spins'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Freispiele</div>
                                        <p class='c-game-info__text'>Ja</p>
                                        <p class='c-game-info__num'>08</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-progressive'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Progressiver Jackpot</div>
                                        <p class='c-game-info__text'>Nein</p>
                                        <p class='c-game-info__num'>09</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;' data-slick-index='9' aria-hidden='true' tabindex='-1'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-multiplayer'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Mehrspieler</div>
                                        <p class='c-game-info__text'>Ja</p>
                                        <p class='c-game-info__num'>10</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-gamble'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Gamble</div>
                                        <p class='c-game-info__text'>Ja</p>
                                        <p class='c-game-info__num'>11</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-wild-symbol'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Wild-Symbol</div>
                                        <p class='c-game-info__text'>Einstellbar</p>
                                        <p class='c-game-info__num'>12</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide slick-current slick-active' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-scatter-symbol'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Scatter-Symbol</div>
                                        <p class='c-game-info__text'>Ja</p>
                                        <p class='c-game-info__num'>13</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide slick-active' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-autoplay'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Autostart-Option</div>
                                        <p class='c-game-info__text'>Ja</p>
                                        <p class='c-game-info__num'>14</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide slick-active' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-adjustable'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Gewinnlinien Typ</div>
                                        <p class='c-game-info__text'>Einstellbar</p>
                                        <p class='c-game-info__num'>15</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide slick-active' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-reels'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Walzen</div>
                                        <p class='c-game-info__text'>5</p>
                                        <p class='c-game-info__num'>16</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide slick-active' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-rows'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Reihen</div>
                                        <p class='c-game-info__text'>3</p>
                                        <p class='c-game-info__num'>17</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-polylines'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Gewinnlinien</div>
                                        <p class='c-game-info__text'>9</p>
                                        <p class='c-game-info__num'>18</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-lines-pay'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Linien zahlen</div>
                                        <p class='c-game-info__text'>links nach rechts</p>
                                        <p class='c-game-info__num'>19</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                    <div class='c-game-info__icon'>
                                        <svg>
                                        <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-both-ways'></use>
                                        </svg>
                                    </div>
                                    <div class='c-game-info__title'>In beide Richtungen</div>
                                    <p class='c-game-info__text'>Nein</p>
                                    <p class='c-game-info__num'>20</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide'  style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-min-coin'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Min Münzwert pro Dreh</div>
                                        <p class='c-game-info__text'>0.02</p>
                                        <p class='c-game-info__num'>21</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-max-coin'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Max Münzwert pro Dreh</div>
                                        <p class='c-game-info__text'>18</p>
                                        <p class='c-game-info__num'>22</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-min-bet'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Mindesteinsatz</div>
                                        <p class='c-game-info__text'>1 pro Linie</p>
                                        <p class='c-game-info__num'>23</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-max-bet'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Maximaleinsatz</div>
                                        <p class='c-game-info__text'>200 pro Linie</p>
                                        <p class='c-game-info__num'>24</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-betting-range'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Wettbereich</div>
                                        <p class='c-game-info__text'>€ 0.02 - € 5.00</p>
                                        <p class='c-game-info__num'>25</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-max-win'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Max Gewinn</div>
                                        <p class='c-game-info__text'>x10014.1</p>
                                        <p class='c-game-info__num'>26</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-software'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Software</div>
                                        <p class='c-game-info__text'>Novomatic</p>
                                        <p class='c-game-info__num'>01</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-slot-type'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Slot-Typ</div>
                                        <p class='c-game-info__text'>Klassischer Slot</p>
                                        <p class='c-game-info__num'>02</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-year-launched'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Startjahr</div>
                                        <p class='c-game-info__text'>2009</p>
                                        <p class='c-game-info__num'>03</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-theme'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Thema</div>
                                        <p class='c-game-info__text'>Alte Zivilisationen</p>
                                        <p class='c-game-info__num'>04</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-rtp'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Rtp</div>
                                        <p class='c-game-info__text'>92%</p>
                                        <p class='c-game-info__num'>05</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-mobile-friendly'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Handyfreundlich</div>
                                        <p class='c-game-info__text'>Ja</p>
                                        <p class='c-game-info__num'>06</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-bonus-game'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Bonusspiel</div>
                                        <p class='c-game-info__text'>Ja</p>
                                        <p class='c-game-info__num'>07</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-free-spins'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Freispiele</div>
                                        <p class='c-game-info__text'>Ja</p>
                                        <p class='c-game-info__num'>08</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-progressive'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Progressiver Jackpot</div>
                                        <p class='c-game-info__text'>Nein</p>
                                        <p class='c-game-info__num'>09</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-multiplayer'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Mehrspieler</div>
                                        <p class='c-game-info__text'>Ja</p>
                                        <p class='c-game-info__num'>10</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-gamble'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Gamble</div>
                                        <p class='c-game-info__text'>Ja</p>
                                        <p class='c-game-info__num'>11</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-wild-symbol'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Wild-Symbol</div>
                                        <p class='c-game-info__text'>Einstellbar</p>
                                        <p class='c-game-info__num'>12</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-scatter-symbol'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Scatter-Symbol</div>
                                        <p class='c-game-info__text'>Ja</p>
                                        <p class='c-game-info__num'>13</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-autoplay'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Autostart-Option</div>
                                        <p class='c-game-info__text'>Ja</p>
                                        <p class='c-game-info__num'>14</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-adjustable'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Gewinnlinien Typ</div>
                                        <p class='c-game-info__text'>Einstellbar</p>
                                        <p class='c-game-info__num'>15</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-reels'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Walzen</div>
                                        <p class='c-game-info__text'>5</p>
                                        <p class='c-game-info__num'>16</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-rows'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Reihen</div>
                                        <p class='c-game-info__text'>3</p>
                                        <p class='c-game-info__num'>17</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-polylines'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Gewinnlinien</div>
                                        <p class='c-game-info__text'>9</p>
                                        <p class='c-game-info__num'>18</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-lines-pay'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Linien zahlen</div>
                                        <p class='c-game-info__text'>links nach rechts</p>
                                        <p class='c-game-info__num'>19</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-both-ways'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>In beide Richtungen</div>
                                        <p class='c-game-info__text'>Nein</p>
                                        <p class='c-game-info__num'>20</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-min-coin'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Min Münzwert pro Dreh</div>
                                        <p class='c-game-info__text'>0.02</p>
                                        <p class='c-game-info__num'>21</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-max-coin'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Max Münzwert pro Dreh</div>
                                        <p class='c-game-info__text'>18</p>
                                        <p class='c-game-info__num'>22</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-min-bet'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Mindesteinsatz</div>
                                        <p class='c-game-info__text'>1 pro Linie</p>
                                        <p class='c-game-info__num'>23</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-max-bet'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Maximaleinsatz</div>
                                        <p class='c-game-info__text'>200 pro Linie</p>
                                        <p class='c-game-info__num'>24</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-betting-range'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Wettbereich</div>
                                        <p class='c-game-info__text'>€ 0.02 - € 5.00</p>
                                        <p class='c-game-info__num'>25</p>
                                    </div>
                                </div>
                                <div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                                    <div class='c-game-info__item' tabindex='0'>
                                        <div class='c-game-info__icon'>
                                            <svg>
                                            <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#i-max-win'></use>
                                            </svg>
                                        </div>
                                        <div class='c-game-info__title'>Max Gewinn</div>
                                        <p class='c-game-info__text'>x10014.1</p>
                                        <p class='c-game-info__num'>26</p>
                                    </div>
                                </div>
                        </div>
                    </div>
            </div>
        </div>";
    }
}