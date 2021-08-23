<?php
    echo "<article class='grid-item related-project eq'>";
    
    
    
    echo "<a href='".get_permalink() ."'></a>";
    echo "<figure>".wp_get_attachment_image(get_field('teaser_image'),'')."</figure>";

    echo "<header>";
        echo "<h4>".get_field('teaser_title')."</h4>";
        echo "<h5>".get_field('teaser_subtitle')."</h5>";
    echo "</header>";

    echo "</article>";

?>



