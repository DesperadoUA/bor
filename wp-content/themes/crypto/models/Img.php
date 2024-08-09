<?php
class ImgItem {
    public $title = '';
    public $alt = '';
    public $fullSettings = [];
    public $mediumSettings = [];
    public $largeSettings = [];
    public $description;
    function __construct(string $title, string $alt, $fullSettings, $mediumSettings, $largeSettings, $description = '') {
        $this->title = $title;
        $this->alt = $alt;
        $this->fullSettings = $fullSettings;
        $this->mediumSettings = $mediumSettings;
        $this->largeSettings = $largeSettings;
        $this->description = $description;
    }
}