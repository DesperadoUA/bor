<?php
class GameCardItem {
    public $title = '';
    public $permalink = '';
    public string $thumbnail = '';
    public string $excerpt = '';
    public string $ref = '';
    public string $bonus = '';
    public LinkItem|null $ecosystem;
    function __construct(string $title, string $permalink, string $thumbnail, string $excerpt, string $bonus, string $ref, LinkItem $ecosystem = null) {
        $this->title = $title;
        $this->permalink = $permalink;
        $this->thumbnail = $thumbnail;
        $this->excerpt = $excerpt;
        $this->ref = $ref;
        $this->bonus = $bonus;
        $this->ecosystem = $ecosystem;
    }
}
class GameCardList {
    /**
     * @var GameCardItem[]
     */
    public $posts = [];
    function __construct(array $posts) {
        $this->posts = $posts;
    }
}
class GameCardTop {
    public string $title = '';
    public ImgItem|null $thumbnail;
    public string $ref = '';
    public string $bonus = '';
    public LinkItem|null $ecosystem;
    function __construct(string $title, $thumbnail, string $bonus, string $ref, LinkItem $ecosystem = null) {
        $this->title = $title;
        $this->thumbnail = $thumbnail;
        $this->ref = $ref;
        $this->bonus = $bonus;
        $this->ecosystem = $ecosystem;
    }
}
class GameInfoItem {
    public $title = '';
    public $iconId = '';
    public string $text = '';
    public string $num = '';
    function __construct(string $title, string $iconId, string $text, string $num) {
        $this->title = $title;
        $this->iconId = $iconId;
        $this->text = $text;
        $this->num = $num;
    }
}
class GameInfoList {
    /**
     * @var GameInfoItem[]
     */
    public $posts = [];
    function __construct(array $posts) {
        $this->posts = $posts;
    }
}