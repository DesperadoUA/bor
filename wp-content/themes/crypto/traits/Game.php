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
}