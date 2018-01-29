<?php

require_once(plugin_dir_path(__FILE__) . '/partials/header.php');

?>

<div class="col-lg-12">
<?php var_dump($_POST); ?>
<?php if($juxtapose_upload_successful): ?>
	<div class="alert alert-success alert-dismissable">
		Your file was uploaded successfully.
	</div>

<?php endif; ?>

<?php if($juxtapose_upload_error): ?>
	<div class="alert alert-danger alert-dismissable">
		There was an error uploading your file.
		Details: <?php echo $juxtapose_upload_error ?>
	</div>

<?php endif; ?>
	<h2>Create a Juxtapose</h2>
	<p>You can either link to images from the wider web, or upload and select images from the site's media library. Click on the media icon to open the library.
	Either way, the only two required elements are valid urls for the right and left image.
	</p>
	<div class="row">
	<form id="add-juxtaposition" name="add-juxtaposition" method="post" enctype="multipart/form-data">
	<h3>Images</h3>
	<div class="col-lg-6">
		<h5>Left Image</h5>
		<div class="form-group">
			<div class="input-group">
			<span class="input-group-addon">URL</span>
				<input type="text" name="left-image" id="left-image" class="form-control">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-picture"></span></button>
				</span>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">Label</span>
						<input type="text" name="left-image-label" id="left-image-label" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">Credit</span>
						<input type="text" name="left-image-credit" id="left-image-credit" class="form-control">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<h5>Right Image</h5>
		<div class="form-group">
			<div class="input-group">
			<span class="input-group-addon">URL</span>
				<input type="text" name="right-image" id="right-image" class="form-control">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-picture"></span></button>
				</span>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">Label</span>
						<input type="text" name="right-image-label" id="right-image-label" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">Credit</span>
						<input type="text" name="right-image-credit" id="right-image-credit" class="form-control">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3">
			<h3>Options</h3>
			<div class="form-group">
				<label for="slider-start">Slider start position</label>
				<div class="input-group">
					<input type="number" name="slider-start" min="0" max="100" placeholder="50" value="50" id="slider-start" class="form-control">
					<span class="input-group-addon">%</span>
				</div>
			</div>
			<div class="form-group">
					<input type="checkbox" name="show-labels" id="show-labels" value="true" checked>
					<label for="show-labels">Show Labels</label>
			</div>
			<div class="form-group">
					<input type="checkbox" name="show-credits" id="show-credits" value="true" checked>
					<label for="show-credits">Show Credits</label>
			</div>
			<div class="form-group">
					<input type="checkbox" name="animate" id="animate" value="true" checked>
					<label for="animate">Animate</label>
			</div>
		</div>
		<div class="col-lg-9">
			Preview
		</div>
	</div>
	<input type="hidden" name="is-uploaded-juxtaposition" value="Y">
	<?php submit_button('Upload') ?>

	</form>
</div>
</div>
<script>
	jQuery(document).ready( function($) {

      jQuery('button.btn-default').click(function(e) {

             e.preventDefault();
			 var button = e;
			 console.log(image_frame)
             var image_frame;
             if(image_frame){
                 image_frame.open();
             }
             // Define image_frame as wp.media object
            image_frame = wp.media({
                title: 'Select Media',
                multiple : false,
                library : {
                    type : 'image',
                }
            });

			image_frame.on('close',function() {
				// On close, get selections and save to the hidden input
				// plus other AJAX stuff to refresh the image preview
				var selection =  image_frame.state().get('selection');
				if (selection.length > 0){
					console.log(selection.toJSON())
					$(e.currentTarget).parents('.input-group').find('input').val(selection.toJSON()[0].url);
				}
			});

			// image_frame.on('open',function() {
			// // On open, get the id from the hidden input
			// // and select the appropiate images in the media manager
			// var selection =  image_frame.state().get('selection');
			// ids = jQuery('input#myprefix_image_id').val();
			// ids.forEach(function(id) {
			// 	attachment = wp.media.attachment(id);
			// 	attachment.fetch();
			// 	selection.add( attachment ? [ attachment ] : [] );
			// });

			// });

			image_frame.open();
     });

});


</script>



<?php
require_once(plugin_dir_path(__FILE__) . '/partials/footer.php');
?>