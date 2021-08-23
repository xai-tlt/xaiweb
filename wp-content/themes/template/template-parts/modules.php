

<?php



echo "<section class='page-modules detail'>";
    echo "<section class='title-breadcrumb'>";
        echo "<article class='breadcrumb'>UNSERE LEISTUNG > ENTWICKLUNG & PROTOTYPING > UNSER SERVICE UND PRODUKTPORTFOLIO</article>";
        if(get_field('title')){
            echo "<h1>".get_field('title')."</h1>";
        }
        if(get_field('subtitle')){
            echo "<h2>".get_field('subtitle')."</h2>";
        }
    echo "</section>";
    if( have_rows('page_modules') ):
        

            $firstText = true;
           

            echo "<section class='main'>";
            while ( have_rows('page_modules') ) : the_row();
            
                    if( get_row_layout() == 'big_letter' ):
                        echo "<section class='module '>";
                            echo "<p class='letter'>".get_sub_field('text')."</p>";
                        echo "</section>";
                    
            
                    elseif( get_row_layout() == 'text' ):
                        echo "<section class='module simple-text'>";
                        
                            echo "<article class='text '>".get_sub_field('text')."</article>";
                        
                        echo "</section>";


                    elseif( get_row_layout() == 'text_separator' ):
                            echo "<section class='module simple-text separator'>";
                                echo "<article class='text '>".wpautop(get_sub_field('text'))."</article>";
                        
                            echo "</section>";
                            

                    elseif( get_row_layout() == 'embed' ): 
                        echo "<section class='module embed'><div class='embed-container'>".get_sub_field('embed')."</div></section>";
                   
                    elseif( get_row_layout() == 'image' ):
                        echo "<section class='module image'>";
                            echo wp_get_attachment_image(get_sub_field('image'),'');
                            if(get_sub_field('text')){
                                echo "<p class='image-description'>".wpautop(get_sub_field('text'))."</p>";
                            }
                            
                        echo "</section>";

                    elseif( get_row_layout() == 'text_image' ):
                        echo "<section class='module text-image'>";
                            echo "<article class='text '>".wpautop(get_sub_field('text'))."</article>";
                            echo "<article class='image '>";
                                echo wp_get_attachment_image(get_sub_field('image'),'');
                                if(get_sub_field('image_description')){
                                    echo "<p class='image-description'>".get_sub_field('image_description')."</p>";
                                }
                            echo "</article>";
                        echo "</section>";
                        
                    endif;
                
        
            endwhile;
            echo "</section>";
        
        
    endif;
echo "<aside>";	
    echo "<section class='text'>".get_field('sidebar')."</section>";

echo "</aside>";
echo "</section>";
?>
