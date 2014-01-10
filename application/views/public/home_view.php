      	<div class="hero-unit">
	        <div id="slides">
	            	<img alt="" src="<?php echo base_url('img/slideshow/header1.jpg');?>">
	            	<img alt="" src="<?php echo base_url('img/slideshow/header2.jpg');?>">
	            	<img alt="" src="<?php echo base_url('img/slideshow/header3.jpg');?>">
	            	<img alt="" src="<?php echo base_url('img/slideshow/header4.jpg');?>">
	            	<img alt="" src="<?php echo base_url('img/slideshow/header5.jpg');?>">
			</div>
		</div>
        <?php 
	        $count = 0;
	        if(isset($posts) && count($posts)){
	        	foreach ($posts as $post){
	        		if ($post->cathegory == 'article') {
		        		if($count % 2 == 0){
		        			echo '<div class="row-fluid">';
		        		}
						echo '<div class="span6">';
		        		if($post->imagesrc != ''){
							$image_properties = array(
									'src' => 'img/articles/thumbs/'.$post->imagesrc,
									'alt' => $post->title,
									'class' => 'image'
							);
							echo img($image_properties);
						}
						echo '<h2>'.$post->title.'</h2>';
						echo '<p>'.word_limiter($post->content,40).'</p>';
						echo anchor('article/'.url_title(strtolower($post->title)),'Les mer').'</div>';
						if($count % 2 != 0){
							echo '</div>';
						}
						$count++;
	        		}
	        	}
	        	echo '<div class="pagination pagination-centered"><ul>'.$pagination.'</ul></div>';
	        }
        ?>