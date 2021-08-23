
<?php /* Template Name: Page Filters */ ?>
<?php

get_header('');
?>


	
		
		<?php while ( have_posts() ) : the_post(); ?>
		<article class="module text-intro  ">
			<h1><?php echo get_the_title(); ?></h1>
		<div class="categories">
			<section class="alm-filter-nav">
			<?php 
				$posts_per_page = 100;
				$postType = get_field('select_post_type');
			
				$categories = get_categories([
					'hide_empty'   => 1
				]);

				$exclude = null;
				echo '<button href="#" data-category="" data-posts-per-page="'.$posts_per_page.'"  >Alle</button>';
				foreach ($categories as $cat):
			
					$catquery = new WP_Query( 'cat=' .$cat->cat_ID. '&post_type='.$postType.'&posts_per_page=1' );
					if($cat->slug == "nicht-gelistet" || !$catquery->have_posts() ) :
						$exclude = $cat->term_taxonomy_id;
						continue;
					endif;
					
					echo '<button href="#" data-category="'.$cat->slug.'"  data-posts-per-page="'.$posts_per_page.'" >'.$cat->name.'</button>';
				endforeach;

			?>

			</section>   
			
		</div>
		</article> 
		<div class="grid" class="responsive-margin equalize">
        <?php
            //echo do_shortcode('[ajax_load_more repeater="template_8" post_type="artikel, event, video" posts_per_page="8"  label="Weitere Beiträge laden"]');
            echo do_shortcode('[ajax_load_more transition="masonry" masonry_selector=".grid-item" post_type="'.$postType.'" posts_per_page="'.$posts_per_page.'" scroll_distance="1" button_loading_label="" scroll="false" button_label="'.$btn_label.'"]');

        
        ?>
    </div>


		<?php endwhile; ?>
		</section>

		
		
	
		
		</main><!-- #main -->
	


<?php
get_footer('');