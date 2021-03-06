<?php

if (have_posts()) {
    while (have_posts()) {
        the_post(  );
        wpb_set_post_views(get_the_ID());
        ?> 
        <main class="o-blog__primary">
            <article>
                <header class="m-article__header">
                    <div class="m-article__headerBlock m-article__breadcrumbs -semiBold -uppercase">
                        <div class="m-breadcrumbs"><?php the_breadcrumb(); ?></div>
                    </div>
                    <time class="m-article__headerBlock m-article__time -semiBold -uppercase" datetime="<?php echo get_the_date( 'c' ); ?>"> <?php the_date( 'F d, Y g:iA', '', '' ); ?> </time>
                    <h1 class="m-article__headerRow m-article__title -bold -condensed"><?php the_title( );?></h1>
                    <h2 class="m-article__headerRow m-article__excerpt -semiBoldCondensed -semiBold"><?php the_excerpt(  ); ?></h2>
                    <div class="m-article__headerBlock m-article__byLine">
                        <div class="m-byLine">
                            <div class="m-byLine__authors">
                                <em class="m-byLine__by">Por</em>
                                <div class="m-byLine__author"><?php the_author_posts_link(); ?></div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Esperando arreglar -->
                <?php
                if ( is_singular( 'video' )) {
                    $iframe = get_field('video_url');

                    preg_match('/src="(.+?)"/', $iframe, $matches);
                    $src = $matches[1];

                    $params = array(
                        'controls'  => 0,
                        'hd'        => 1,
                        'autohide'  => 1
                    );
                    $new_src = add_query_arg($params, $src);
                    $iframe = str_replace($src, $new_src, $iframe);

                    $attributes = 'frameborder="0"';
                    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

                    ?>
                        <figure class="m-picture m-picture__video m-picture__noCaption">
                            <div class="m-picture__frame">
                                <div class="m-crop m-crop__video m-crop__ratioVideo"><div><?php echo $iframe; ?></div></div>
                            </div>
                        </figure>
                <?php } else { ?>
                    <figure class="m-picture">
                        <div class="m-picture__frame">
                            <div class="m-crop m-crop__ratio3x2"><?php the_post_thumbnail('large', ['class' => 'm-crop__img']); ?></div>
                        </div>
                        
                        <div class="m-picture__caption">
                            <p class="m-picture__source -semiBold"><?php the_post_thumbnail_caption( ); ?></p>
                        </div>
                    </figure>
                <?php } ?>
                    
                <div class="m-article__content">
                    <div class="m-content -copy">
                        <div class="-modifier"><?php the_content( ); ?></div>
                    </div>

                    <footer>
                        <div class="m-tags">
                            <p class="-semiBold"><?php the_tags( 'En este artículo: ', ', ' ); ?></p>
                        </div>
                    </footer>
                </div>
            </article>
        </main>
        
    <?php }
} ?>