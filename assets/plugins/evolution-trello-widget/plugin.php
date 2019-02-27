<?php
if (!defined('MODX_BASE_PATH')) {die('What are you doing? Get out of here!');}
$e = &$modx->Event;
if ($e->name == 'OnManagerWelcomeHome') {
    $position = isset($position) ? $position : 20;
	$width = isset($width) ? $width : 12;
    $boardUrls = isset($boardUrls) ? $boardUrls : 'https://trello.com/b/nC8QJJoZ';
    $boardUrlsArr = explode(',', $boardUrls);
    foreach ($boardUrlsArr as $key => $value) {
        $boardUrlsArr[$key] = '<blockquote class="trello-card"><a href="'.$value.'">Trello Card</a></blockquote>';
    }
    $widgets['trello_widget'] = array(
        'menuindex' => $position,
        'id' => 'trello_widget',
        'cols' => 'col-sm-' . $width,
        'icon' => 'fa-trello',
        'title' => 'Trello',
        'body' => implode(' ', $boardUrlsArr).'<script src="https://p.trellocdn.com/embed.min.js"></script>', );
    $e->output(serialize($widgets));
}
