<?php

$juxtapositions = get_option('altlab_wp_juxtapose');


if (!isset($juxtapositions) || ($juxtapositions == false)){
	$juxtapositions = array();
}

require_once(plugin_dir_path(__DIR__) . '/views/list-view.php');

?>