<?php 
/**
 * Template Name: Magazine
 */
get_header();
?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php 
			$magazines = new WP_Query( array ( 
				'post_type' => 'magazine',
				'posts_per_page' => 1,
				'order_by' => 'ID',
				'order' => 'ASC'
			) );
			if($magazines->have_posts()){
				?>
				<div class="container magazine-lists">
					<?php
					while($magazines->have_posts()){
						$magazines->the_post();
						echo"<h1>". get_the_title(). "</h1>";
						if(has_post_thumbnail()){
							the_post_thumbnail();
						}
						the_content();
					}
					wp_reset_postdata();
					?>
				</div>
				<?php
			}
			?>
			<div class="container text-center load-posts" data-page="1">
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
<?php
get_footer();
