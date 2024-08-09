<?php
global $builder;
$characters = carbon_get_theme_option( OPTIONS_KEYS['GAME_CHARACTERS']);
$list = [];
foreach($characters as $item) $list[] = new GameInfoItem($item['title'], $item['icon_id'], $item['text'], $item['num']);
echo $builder->gameInfo(new GameInfoList($list));