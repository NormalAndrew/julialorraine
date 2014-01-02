<?php get_header(); ?>

	<!-- This is a typical Twitter Bootstrap Carousel -->
	<!-- Carousel -->
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Indicators 
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>-->

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
	      	<?php 
	      		$the_query = new WP_query(array(
	      			'category_name' => 'Home Slider',
	      			'posts_per_page' => 1));
	      		while ( $the_query->have_posts()):
	      			$the_query->the_post();
	      		?>	

	        <div class="item active">
	          <?php the_post_thumbnail('');?>
	          <div class="carousel-caption">
	          	<!-- <h4><?php the_title();?></h4>
	          	<p><?php the_excerpt();?></p> -->
	          </div>
	        </div> <!-- item active -->

		    <?php endwhile; wp_reset_postdata(); ?>
		    
		    <?php
			    $the_query = new WP_query(array(
			    	'category_name' => 'Home Slider',
			    	'offset' => 1,
			    	'posts_per_page' => 5));
			    while ( $the_query->have_posts()):
			    	$the_query->the_post();
			   ?>  

			<div class="item">
	          <?php the_post_thumbnail('large');?>
	          <div class="carousel-caption">
	          	<!-- <h4><?php the_title();?></h4>
	          	<p><?php the_excerpt();?></p> -->
	          </div>   
	        </div> <!-- item -->
		    <?php endwhile; wp_reset_postdata(); ?>
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>
	</div>
	<?php
		/*query_posts('posts_per_page=1');
			while(have_posts()) : the_post(); ?>
			<div class="jumbotron">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p><?php the_excerpt(); ?></p>
			</div>
	<?php endwhile; wp_reset_query(); */?>



<?php get_footer(); ?>