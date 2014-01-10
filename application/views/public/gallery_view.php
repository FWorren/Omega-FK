	<div id="gallery">
	<?php 
		if(isset($images) && count($images)){
			foreach($images as $image){
				echo '<div class="thumb"><a class="fancybox" rel="group" href="'.base_url('img/gallery/'.$image->imagesrc).'">'
				.img(base_url('img/gallery/thumbs/'.$image->imagesrc)).'</a></div>';
			}
		}else{
			echo 'Ingen bilder i galleriet!';
		}
	?>
	</div>
	<?php echo '<div class="pagination pagination-centered"><ul>'.$pagination.'</ul></div>';?>