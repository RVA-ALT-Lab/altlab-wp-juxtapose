<?php

require_once(plugin_dir_path(__FILE__) . '/partials/header.php');

?>
<div class="wrap">
<div class="list-group">
<?php if(isset($juxtapositions)): ?>
	<?php if(count($juxtapositions) == 0): ?>
	<h2>Get started, and maybe are a few quick directions blah blah blah;</h2>


	<?php else: ?>
	<link rel="stylesheet" href="https://cdn.knightlab.com/libs/juxtapose/latest/css/juxtapose.css">
	<?php foreach($juxtapositions as $juxtapose): ?>

	<div class="list-group-item">
		<div class="row">
			<div class="col-lg-6">
				<p>ID: <?php echo $juxtapose['id']; ?></p>
				<p>Shortcode: [juxtapose id=<?php echo $juxtapose['id']; ?>]</p>
				<?php echo sprintf('<a class="btn btn-primary" href="%s/wp-admin/admin.php?page=altlab_wp_juxtapose&action=edit&id=%s"><span class="glyphicon glyphicon-pencil"></span> Edit</a>', get_site_url(), $juxtapose['id']) ?>
				<?php echo sprintf('<a class="btn btn-danger" href="%s/wp-admin/admin.php?page=altlab_wp_juxtapose&action=delete&id=%s"><span class="glyphicon glyphicon-trash"></span> Delete</a>', get_site_url(), $juxtapose['id']) ?>
			</div>
			<div class="col-lg-6">
				<div class="juxtapose"
					data-startingposition="<?php ?>"
					data-showlabels="<?php ?>"
					data-showcredits="<?php ?>"
					data-animate="<?php ?>"
					data-makeresponsive="true"
					>

				<img src="<?php echo $juxtapose['left-image'] ?>" data-label="<?php echo $juxtapose['left-image-label']; ?>" data-credit="<?php echo $juxtapose['left-image-credit']; ?>" />
				<img src="<?php echo $juxtapose['right-image'] ?>" data-label="<?php echo $juxtapose['right-image-label']; ?>" data-credit="<?php echo $juxtapose['right-image-credit']; ?>"  />
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
	<script src="https://cdn.knightlab.com/libs/juxtapose/latest/js/juxtapose.js"></script>
	<?php endif;?>
<?php endif; ?>

</div>
</div>


<?php require_once(plugin_dir_path(__FILE__) . '/partials/footer.php'); ?>