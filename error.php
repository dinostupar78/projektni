<?php  if (count($errors) > 0) : ?>
	<div class="card border-danger mb-3" style="width: 20.5rem;">
  <div class="card-header text-danger">Error</div>
  <div class="card-body text-danger">
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>