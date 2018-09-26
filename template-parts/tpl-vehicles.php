<?php 

/**
 * Template Name: Vehicles
 */
get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php 
			$vehicles = new WP_Query (array(
				'post_type' => 'vehicle',
				'posts_per_page' => 1,
				'order_by' => 'ID',
				'order' => 'ASC',
			));
			//var_dump($vehicles);
			?>
			<div class="container post-listing" id="vehicles">
				<?php
				if($vehicles->have_posts()){
					while($vehicles->have_posts()){
						$vehicles->the_post();
						echo get_the_title()."<br/>";
						if(has_post_thumbnail()){
							the_post_thumbnail();
						}
						the_content();
					}
					wp_reset_postdata();
				}
				?>
			</div>
			<div class="container text-center">
				<a class="btn btn-primary load-more" data-page="1">Load More</a>
			</div>
	</main>
</div>
<?php
get_footer();
