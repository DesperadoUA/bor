<?php
trait Casino {
    public function casinoAsideCard(CasinoAsideItem $item) {
        $rating = $item->rating/10;
        $str = "<div class='c-side-casinos__item'>
                    <div class='c-side-casinos__top'>
                    <div class='c-side-casinos__name is-hide-to-xxs'>{$item->title} Bewertung</div>
                    <div class='c-side-casinos__rate'>
                    <div class='c-rating' data-rating='{$rating}'>
                    <div class='c-rating__rate'>
                    <span class='c-rating__title'>Rating: </span> <span>{$rating}</span>
                    <span class='c-rating__maxrate'>/&nbsp;5</span>
                    </div>
                    <div class='c-rating__box'>
                    <div class='c-rating__elem'></div>
                    <div class='c-rating__elem'></div>
                    <div class='c-rating__elem'></div>
                    <div class='c-rating__elem'></div>
                    <div class='c-rating__elem'></div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class='c-side-casinos__bttm'>
                    <div class='c-side-casinos__logo-box'>
                    <picture>
                        <source srcset='{$item->thumbnail->fullSettings[0]}' type='image/webp'>
                        <img class='webpexpress-processed lazyloaded' width='266' height='114' src='{$item->thumbnail->fullSettings[0]}' 
                        title='{$item->thumbnail->title}' alt='{$item->thumbnail->alt}'>
                    </picture> 
                    </div>
                <a href='#' rel='nofollow' onclick='window.open('{$item->ref}');' class='c-btn c-btn--primary c-btn--play c-side-casinos__bt' title='Besuchen'>Besuchen</a> </div>
                </div>";
        return $str;
    }
    public function casinoAsideLoop(CasinoAsideList $list) {
        $str = " <div class='c-side-casinos'>";
        foreach ($list->posts as $item) $str .= $this->casinoAsideCard($item);
        $str .= "</div>";
        return $str;
    }
}