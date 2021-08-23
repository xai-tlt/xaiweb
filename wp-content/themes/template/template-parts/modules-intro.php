

<?php



echo "<section class='page-modules intro '>";


    echo "<article class='module text-intro  '>";
        
        echo "<h1>".get_field('intro_title')."</h1>";
        echo "<p class='letter'>".substr(strip_tags(get_field('intro_text')), 0, 1)."</p>";
        echo "<article class='text trim'>".get_field('intro_text')."</article>";
 
    echo "</article>";  


    if( have_rows('modules') ):
        
       
           

            echo "<section class='main equalize grid'>";
            while ( have_rows('modules') ) : the_row();
                    
                    if( get_row_layout() == 'text_link' ):
                        
                        echo "<div class='cont grid-item '><article class='module text-link  ' >";
                            echo "<a href='".get_sub_field('link')."'></a>";
                            echo "<div class='eq text-container'>";
                            echo "<h2>".get_sub_field('title')."</h2>";

                            echo "<article class='text '>".get_sub_field('text')."</article>";
                            echo "</div>";
                        echo "</article></div>";

                    elseif( get_row_layout() == 'text_image_link' ):
                      

                        echo "<div class='cont grid-item has-image grid-item--width2'><article class='module text-link  '>";
                            echo "<a href='".get_sub_field('link')."'></a>";
                            echo "<div class='eq text-container'>";
                            echo "<h2>".get_sub_field('title')."</h2>";

                            echo "<article class='text '>".get_sub_field('text')."</article>";
                            echo "</div>";
                           
                            echo"<article class='eq image-container'>".wp_get_attachment_image(get_sub_field('image'),'')."</article>";

                            
                        echo "</article></div>";

                    endif;
                
        
            endwhile;
            echo "</section>";
        
        
    endif;

echo "</section>";
?>
