		<footer id="footer"  style="background-color: grey">
			<div class="row">
				<div class="col-sm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia ducimus labore qui libero tenetur beatae sequi accusamus delectus consectetur, totam impedit veniam, ex soluta. Aliquam ratione fuga aliquid minima consequuntur.</div>
				<div class="col-sm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia ducimus labore qui libero tenetur beatae sequi accusamus delectus consectetur, totam impedit veniam, ex soluta. Aliquam ratione fuga aliquid minima consequuntur.</div>
				<div class="col-sm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia ducimus labore qui libero tenetur beatae sequi accusamus delectus consectetur, totam impedit veniam, ex soluta. Aliquam ratione fuga aliquid minima consequuntur.</div>
				<div class="col-sm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia ducimus labore qui libero tenetur beatae sequi accusamus delectus consectetur, totam impedit veniam, ex soluta. Aliquam ratione fuga aliquid minima consequuntur.</div>
			</div>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<?php
					wp_nav_menu( array(
						'menu'    			=> 'footer-menu',
						'depth'             => 2,
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'bs-example-navbar-collapse-2',
						'menu_class'        => 'navbar-nav ml-auto',
						'walker'            => new WP_Bootstrap_Navwalker()
					));
					?>
				</nav>
		</footer>
	</div><!-- end container -->

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<?php wp_footer(); ?>
  </body>
</html>