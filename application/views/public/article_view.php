<?php
	if($article->imagesrc != ''){
		$image_properties = array(
				'src' => 'img/articles/'.$article->imagesrc,
				'alt' => $article->title,
				'width' => '80%',
				'height' => 'auto'
		);
		echo img($image_properties);
	}
	echo '<h2>'.$article->title.'</h2>';
	echo '<div class="article-about"><p class="by">Av '.ucwords($article->author).'</br></p><p class="published">Publisert: '.$article->published.'</p></div>';
	echo $this->typography->auto_typography($article->content);
?>