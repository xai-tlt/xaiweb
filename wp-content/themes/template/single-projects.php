<?php

get_header();
?>



		<?php while ( have_posts() ) : the_post(); 
			get_template_part('template-parts/header-info'); 
		 	get_template_part('template-parts/modules'); 
			get_template_part('template-parts/related-projects'); 

		endwhile;?>
		


<?php
get_footer();