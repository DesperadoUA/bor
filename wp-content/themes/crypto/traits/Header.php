<?php
trait Header {
    public function logo(ImgItem $logo) {
        $str = " <a class='c-header__logo' href='/' aria-label='{$logo->title}'>
                <picture>
                    <source srcset='{$logo->mediumSettings[0]}' type='image/webp'>
                    <img width='239' height='41' src='{$logo->mediumSettings[0]}' alt='{$logo->alt}' class='webpexpress-processed'>
                </picture>
            </a>";
        return $str;
    }
    public function menu(MenuData $menu) {
        $list = '';
        foreach($menu->posts as $item) {
            $list .= "<li class='c-header__main-menu-el'>
                        <a class='c-header__main-menu-link c-header__main-menu-link--bonus' href='{$item->url}' 
                            title='{$item->title}'>{$item->title}
                        </a>
                    </li>";
        }
        $str = "<div class='c-header__main-menu-box'>
                <ul class='c-header__main-menu is-hide-to-md'>
                    {$list}
                </ul>
                <button class='c-header__hamburger-btn js-header-modal-btn'>
                    <span class='c-header__hamburger-icon'>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                    <span class='c-header__hamburger-text'>Menü</span>
                </button>
            </div>";
        return $str;
    }
    public function modalMenu(MenuData $menu) {
        $list = '';
        foreach($menu->posts as $item) {
            $list .= "<div class='c-header__menu-el panel'>
                        <a class='c-header__menu-link' href='{$item->url}' title='{$item->title}'>
                            {$item->title}
                        </a>";
            if(count($item->children)) {
                $list .= "<button class='c-header__menu-btn-collapse' 
                            type='button' 
                            data-toggle='collapse' 
                            aria-expanded='1' 
                            role='button'>
                        </button>"; 
            }
            if(count($item->children)) {
                $list .= "<div class='c-header__submenu-drop collapse' data-parent='#menu-accordion'>";
                $list .= "<ul class='c-header__submenu'>";
            }
            foreach($item->children as $children) {
                $list .= "<li class='c-header__submenu-el'>
                            <a class='c-header__submenu-link' 
                                href='{$children->url}' 
                                title='{$children->title}'>
                                {$children->title}
                            </a>
                        </li>";
            }           
            if(count($item->children)) {
                $list .= "</ul>"; 
                $list .= "</div>";
            }        
        $list .= "</div>";
        }
        $str =  "<div class='c-header__dialog'>
                    <div class='c-header__navigation'>
                        <div class='c-header__menu accordion js-scroll-bar mCustomScrollbar _mCS_23' id='menu-accordion'>
                            <div id='mCSB_23_container' class='mCSB_container' dir='ltr'>";
        $str .= $list;
        $str .= "</div>
                            </div>
                        </div>
                    </div>";
        return $str;
    }
    public function social(SocialLinks $social) {
        $str = "<div class='c-header__soc-box'>
                    <div class='c-social'>
                        <div class='c-social__content'>
                            <div class='c-social__title'>Teilen:</div>
                            <div class='c-social__btn-box'>";
        if(!empty($social->tw)) {
            $str .= "<div class='c-social__btn-item'>
                        <a href='{$social->tw}' class='c-social__btn c-social__btn--tw js-share-item' aria-label='Twitter button' data-share='tw'></a>
                    </div>";
        }
         if(!empty($social->fb)) {
            $str .= "<div class='c-social__btn-item'>
                       <a href='{$social->fb}' class='c-social__btn c-social__btn--fb js-share-item' aria-label='Facebook-Button' data-share='fb'></a>
                    </div>";
        }
        $str .=             "</div>
                        </div>
                    </div>
                </div>";
        return $str;
    }
}