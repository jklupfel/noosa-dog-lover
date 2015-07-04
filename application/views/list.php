<?php $this->load->view('modules/header'); ?>


<p>This is the list page.</p>
<div class="list_location row location-beach">
	<div class="col-xs-3 col-sm-2 list-img">
		<img class="img-responsive" src="/img/dog-icon-512.png">
		<div class="list_rating">
			<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
		</div>
		
	</div>
	<div class="col-xs-9 col-sm-8 list-desc">
		<h2>Title</h2>
		<h4>Beach Access</h4>
		<p class="locatio-address">23 Beach Rd</p>
		
	</div>
	<div class="col-xs-12 col-sm-2 list-more">
		<div class="list-more-inner">
			<p class="distance">.2km</p>
			<button class="btn-map">MAP</button>
			<button class="bth-more">MORE</button>
		</div>
	</div>
	<?php foreach($markers as $marker): ?>
	
	<h1><?php echo $marker['name']; ?></h1>
	
	<?php echo_array($marker); ?>
	
	<?php endforeach ?>
</div>



<?php $this->load->view('modules/footer'); ?>