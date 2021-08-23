<?php
    if( get_field('header_image')):
        echo "<section class='header-image-infos shadow-container'>";
            echo "<div class='shadow'>";
        
                echo wp_get_attachment_image(get_field('header_image'),'');

                echo "<section class='infos'>";
                    if(get_field('info_column_1')){
                        echo "<article class='text col1'>".wpautop(get_field('info_column_1'))."</article>";
                    }
                    if(get_field('info_column_2')){
                        echo "<article class='text col2'>".wpautop(get_field('info_column_2'))."</article>";
                    }
                    if(get_field('info_column_3')){
                        echo "<article class='text col3'>".wpautop(get_field('info_column_3'))."</article>";
                    }
                echo "</section>";
            echo "</div>";
        
        echo "</section>";
    endif;
?>