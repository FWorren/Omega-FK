			</div>
			<div class="rightnav">
      			<ul class="side_nav">
      			<?php 
      				if ($current == 'about') {
      					echo '
      					<li class="side_nav_header">Klubben</li>
      					<li class="side_nav_element">'.anchor('about/squad','Spillerstall').'</li>
      					<li class="side_nav_element">'.anchor('about/historie','Historie').'</li>
      					<li class="side_nav_element">'.anchor('about/halloffame','Hall of Fame').'</li>
      					';
      				}
      			?>
				  <li class="side_nav_header">Aktuelle sider</li>
				  <li class="side_nav_element"><?php echo anchor('gallery','Bilder');?></li>
				  <li class="side_nav_element"><a href="http://omega.ntnu.no/">Sct. Omega Broderskap</a></li>
				  <li class="side_nav_element"><a href="http://midtnorge.bedriftsidretten.no/hovedmeny---lokal/aktiviteter-og-arrangement/fotball/fotball-trondheim/terminliste-og-resultater/0D352BC7-A85C-43B8-9B93-A367C8CA80F4/6">Bedriftsidretten</a></li>
				  <li class="side_nav_header">Neste Kamp</li>
				  <li class="side_nav_header">Treningstider</li>
				</ul>
    		</div>
		</div>
	</div>
	<!-- End wrapper for left- and rightcolumn and maincontent  -->
	<footer class="footer">
      <div class="container">
        <p>Utviklet av Fredrik Mikkelsen Worren ved bruk av <?php echo anchor('http://codeigniter.com/','Codeigniter Framework');?> og <?php echo anchor('http://twitter.github.io/bootstrap/','Bootstrap starter template');?></p>
        <p>Omega Fotball logo er designet av Olja Pehilj</p>
        <p>Copyright &copy; 2013 Omega Fotball</p>
        <ul class="footer-links">
          <li><?php echo anchor('contact','Kontakt');?></li>
          <li class="muted">&middot;</li>
          <li><?php echo anchor('facebook','Facebook');?></li>
          <li class="muted">&middot;</li>
          <li><?php echo anchor('twitter','Twitter');?></li>
        </ul>
      </div>
    </footer>
    <!-- Load javascript -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('js/bootstrap.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/jquery.slides.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/slide_config.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/fancybox/source/jquery.fancybox.pack.js?v=2.1.3'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7');?>"></script>
	<?php 
		if($current == 'gallery'){
			echo '
      			<script type="text/javascript">
					$(document).ready(function() {
						$(".fancybox").fancybox();
					});
				</script>
      		';
		}
	?>
	<!-- End -->
</body>
</html>