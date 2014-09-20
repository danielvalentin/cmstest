<h1><?php echo $page->title; ?></h1>

<?php

$content = $page->get_block_by_key('content');
if($content && $content->loaded())
{
	echo $content;
}
