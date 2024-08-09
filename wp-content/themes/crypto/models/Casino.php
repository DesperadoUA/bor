<?php
class CasinoAsideItem {
    public $title = '';
    public $ref = '';
    public $rating = '';
    public $thumbnail = null;
    function __construct(string $title, string $ref, string $rating, ImgItem $img = null) {
        $this->title = $title;
        $this->thumbnail = $img;
        $this->ref = $ref;
        $this->rating =$rating;
    }
}
class CasinoAsideList {
    /**
     * @var CasinoAsideItem[]
     */
    public $posts = [];
    function __construct(array $posts) {
        $this->posts = $posts;
    }
}