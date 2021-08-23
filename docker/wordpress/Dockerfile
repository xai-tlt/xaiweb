FROM reg.xailabs.com/xailabs/wordpress:latest
LABEL Francesco Fano <francesco.fano@xailabs.de>

RUN apt-get update && apt-get upgrade -y && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -o duplicate-post.zip -fSL "https://downloads.wordpress.org/plugin/duplicate-post.3.2.3.zip" \
    && unzip -o duplicate-post.zip -d /var/www/html/wp-content/plugins
RUN curl -o duplicate-post_de_DE.zip -fSL "https://downloads.wordpress.org/translation/plugin/duplicate-post/3.2.3/de_DE.zip" \
    && unzip -o duplicate-post_de_DE.zip -d /var/www/html/wp-content/languages/plugins

RUN curl -o w3-total-cache.zip -fSL "https://downloads.wordpress.org/plugin/w3-total-cache.0.9.7.5.zip" \
    && unzip -o w3-total-cache.zip -d /var/www/html/wp-content/plugins

RUN curl -o intuitive-custom-post-order.zip -fSL "https://downloads.wordpress.org/plugin/intuitive-custom-post-order.3.1.2.zip" \
    && unzip -o intuitive-custom-post-order.zip -d /var/www/html/wp-content/plugins

RUN curl -o wordpress-seo.zip -fSL "https://downloads.wordpress.org/plugin/wordpress-seo.11.9.zip" \
    && unzip -o wordpress-seo.zip -d /var/www/html/wp-content/plugins

RUN curl -o wordpress-seo_de_DE.zip -fSL "https://downloads.wordpress.org/translation/plugin/wordpress-seo/11.9/de_DE.zip" \
    && unzip -o wordpress-seo_de_DE.zip -d /var/www/html/wp-content/languages/plugins

RUN curl -o acf-image-crop-add-on.zip -fSL "https://downloads.wordpress.org/plugin/acf-image-crop-add-on.1.4.12.zip" \
    && unzip -o acf-image-crop-add-on.zip -d /var/www/html/wp-content/plugins

RUN curl -o wonderm00ns-simple-facebook-open-graph-tags.zip -fSL "https://downloads.wordpress.org/plugin/wonderm00ns-simple-facebook-open-graph-tags.2.2.6.1.zip" \
    && unzip -o wonderm00ns-simple-facebook-open-graph-tags.zip -d /var/www/html/wp-content/plugins

RUN curl -o classic-editor.zip -fSL "https://downloads.wordpress.org/plugin/classic-editor.1.6.zip" \
    && unzip -o classic-editor.zip -d /var/www/html/wp-content/plugins

RUN curl -o force-refresh.zip -fSL "https://downloads.wordpress.org/plugin/force-refresh.2.2.0.zip" \
    && unzip -o force-refresh.zip -d /var/www/html/wp-content/plugins



RUN curl -o acf-rgba-color-picker.zip -fSL "https://downloads.wordpress.org/plugin/acf-rgba-color-picker.1.2.2.zip" \
    && unzip -o acf-rgba-color-picker.zip -d /var/www/html/wp-content/plugins    

RUN curl -o ajax-load-more.zip -fSL "https://downloads.wordpress.org/plugin/ajax-load-more.zip" \
    && unzip -o ajax-load-more.zip -d /var/www/html/wp-content/plugins  





RUN rm -rf wp-content/themes/
COPY wp-content/themes/ /var/www/html/wp-content/themes/
COPY wp-content/plugins/advanced-custom-fields-pro/ /var/www/html/wp-content/plugins/advanced-custom-fields-pro/

COPY docker/wordpress/favicon.ico /var/www/html/favicon.ico

#RUN cp /var/www/html/wp-content/plugins/w3-total-cache/wp-content/advanced-cache.php /var/www/html/wp-content/advanced-cache.php
#RUN mkdir /var/www/html/wp-content/cache
#RUN chmod 777 /var/www/html/wp-content/cache
COPY docker/wordpress/w3tc-config /var/www/html/wp-content/w3tc-config
RUN chmod 777 /var/www/html/wp-content/w3tc-config

RUN chown -R www-data:www-data /var/www/html
