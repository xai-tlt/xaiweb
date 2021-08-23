<?php /* Template Name: Page Preview */ ?>
<?php

get_header('');
?>


	
		
		<?php while ( have_posts() ) : the_post(); 


 			get_template_part('template-parts/modules-intro'); 



		endwhile; ?>
		</section>
		
	
		
		</main><!-- #main -->
	


<?php
get_footer('');