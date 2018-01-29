<?php

$juxtapose_upload_successful = null;
$juxtapose_upload_error = null;


if(isset($_POST['is-uploaded-juxtaposition'])){
	var_dump($_POST);

	$options = get_option('altlab_wp_juxtapose');


	$left_image = $_POST['left-image'];
	$left_image_label = $_POST['left-image-label'];
	$left_image_credit = $_POST['left-image-credit'];

	$right_image = $_POST['right-image'];
	$right_image_label = $_POST['right-image-label'];
	$right_image_credit = $_POST['right-image-credit'];


	$id = time();

	$new_juxtapose = array(
		'id' => $id,
		'left-image-credit' => $left_image_credit,
		'left-image-label' => $left_image_label,
		'left-image' => $left_image,
		'right-image-credit' => $right_image_credit,
		'right-image-label' => $right_image_label,
		'right-image' => $right_image
		);

	if($options){

		array_push($options, $new_juxtapose);
		update_option('altlab_wp_juxtapose', $options);
	} else {
		$new_options = array();
		array_push($new_options, $new_juxtapose);
		update_option('altlab_wp_juxtapose', $new_options);
	}

	$juxtapose_upload_successful = true;
}

require_once(plugin_dir_path(__DIR__) . '/views/add-view.php');

?>