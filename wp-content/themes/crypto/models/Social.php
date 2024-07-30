<?php
class SocialLinks {
    public $fb = '';
    public $tw = '';
    function __construct(string $fb = '', string $tw = '') {
        $this->fb = $fb;
        $this->tw = $tw;
    }
}