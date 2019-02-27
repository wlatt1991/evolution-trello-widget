<?php
if (!defined('MODX_BASE_PATH')) {die('What are you doing? Get out of here!');}
$e = &$modx->Event;
if ($e->name == 'OnManagerWelcomeHome') {
    $position = isset($position) ? $position : 2;
	$width = isset($width) ? $width : 12;
    $boardUrls = isset($boardUrls) ? $boardUrls : 'https://trello.com/b/nC8QJJoZ';
    $boardUrlsArr = explode(',', $boardUrls);
    foreach ($boardUrlsArr as $key => $value) {
        $boardUrlsArr[$key] = '<div style="float:left;margin:0.5rem"><blockquote class="trello-board-compact"><a href="'.$value.'">Trello Card</a></blockquote></div>';
    }
    $widgets['trello_widget'] = array(
        'menuindex' => $position,
        'id' => 'trello_widget',
        'cols' => 'col-sm-' . $width,
        'icon' => 'fa-trello',
        'title' => 'Trello',
        'body' => '<div style="padding:1rem">'.implode('', $boardUrlsArr).'<script src="https://p.trellocdn.com/embed.min.js"></script></div>', );
    $e->output(serialize($widgets));
}
