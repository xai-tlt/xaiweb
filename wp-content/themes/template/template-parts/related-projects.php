<?php

 if( have_rows('related_projects') ):

    echo "<section class='related-projects equalize'>";

        echo "<article class='related-project-text eq'>";
            echo "<header>";
                echo "<h4>".get_field('related_projects_text','options')."</h4>";
            echo "</header>";
        echo "</article>";

    
        while( have_rows('related_projects') ) : the_row();
            echo "<article class='related-project eq'>";
                $related_project = get_sub_field('project');
                
                echo "<a href='".get_permalink($related_project->ID) ."'></a>";
                echo "<figure>".wp_get_attachment_image(get_field('teaser_image',$related_project->ID),'')."</figure>";

                echo "<header>";
                    echo "<h4>".get_field('teaser_title',$related_project->ID)."</h4>";
                    echo "<h5>".get_field('teaser_subtitle',$related_project->ID)."</h5>";
                echo "</header>";
    
            echo "</article>";

        endwhile;

    echo "</section>";
endif;

?>
