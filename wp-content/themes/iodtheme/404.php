<?php get_header(); ?>
<!-- MAIN CONTENT BLOCK -->
<section id="content" class="content mainblock">
	<div class="container">

		<div class="row">

            <div class="col-md-8">
				<h1 class="error-title page-title align-center"><?php esc_html_e( '404 - Page Not Found', 'iodtheme' ); ?></h1>

				<div class="mesage-box color-3">
					<div class="description">
						<?php print sprintf( esc_html__( 'We could not find the page you are looking for. %1$s.', 'iodtheme' ), '<a href="' . esc_url( home_url('/') ) . '">'.esc_html__( 'Go back to Home', 'iodtheme' ).'</a>' ) ?>
					</div>
				</div>
				<div class="spacer30"></div>
			</div>
          <!-- Side Bar -->
          <div class="col-md-4">
	         <?php get_sidebar(); ?>
          </div>

		</div>

	</div>
</section>
<?php get_footer(); ?>