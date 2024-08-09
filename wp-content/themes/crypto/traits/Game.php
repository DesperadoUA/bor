<?php
trait Game {
    public function gameCard(GameCardItem $post) {
        $str = "";
        return $str;
    }
    public function gameLoop(GameCardList $list) {
        $str = "<div class='game_loop_row'>";
        foreach ($list->posts as $item) $str .= $this->gameCard($item);
        $str .= "</div>";
        return $str;
    }
    public function gameCardTop(GameCardTop $data) {
        $str =  "";
        return $str;
    }
    public function gameInfoCard(GameInfoItem $post) {
        $str = "<div class='c-game-info__slide swiper-slide ' style='width: 257px;'>
                    <div class='c-game-info__item'>
                        <div class='c-game-info__icon'>
                            <svg>
                                <use xlink:href='/wp-content/themes/crypto/assets/img/sprite.svg#{$post->iconId}'></use>
                            </svg>
                        </div>
                        <div class='c-game-info__title'>{$post->title}</div>
                        <p class='c-game-info__text'>{$post->text}</p>
                        <p class='c-game-info__num'>{$post->num}</p>
                    </div>
                </div>";
        return $str;
    }
    public function gameInfoLoop(GameInfoList $list) {
        $str = " <div class='c-game-info__slider c-slider js-game-info-slider game-info-wrapper'>
                        <div class='swiper-wrapper'>";
        foreach ($list->posts as $item) $str .= $this->gameInfoCard($item);
        $str .= "</div></div>";
        return $str;
    }
}