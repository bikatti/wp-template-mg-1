<div class="o-section -sec">
    <div class="o-section__header">
        <div class="m-section__header">
            <?php 
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 1,
                    'cat' => 3,
                    'order' => 'DESC',
                    'orderby' => 'date'
                );
                $headlines = new WP_Query($args);

                if ($headlines->have_posts()) {
                    while ($headlines->have_posts()) {
                        $headlines->the_post(  );
                        foreach((get_the_category()) as $category) {
                            if(!$category->parent) { 
                                echo '<h3 class="m-section__heading -bold -condensed">';
                                echo $category->cat_name;
                                echo '</h3>';
                                echo '<a class="m-section__cta -semiBold -uppercase -loose"  href="'; 
                                echo get_category_link( $category );
                                echo '">Ver todo</a>';
                            }
                        }
                    }
                } 
            ?>
        </div>
    </div>
    <div class="o-section__content">
        <div class="m-section__grid">
            <div class="m-cards__grid">
                <?php 
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'cat' => 3,
                        'order' => 'DESC',
                        'orderby' => 'date'
                    );
                    $headlines = new WP_Query($args);

                    if ($headlines->have_posts()) {
                        while ($headlines->have_posts()) {
                            $headlines->the_post(  );
                            ?>
                                <div class="m-cards__gridItem">
                                    <article class="m-card m-card__grid">
                                        <a href="<?php the_permalink( ); ?>" class="m-card__wrap">
                                            <figure class="m-card__img">
                                                <div class="m-crop m-crop__ratio3x2"><?php the_post_thumbnail( 'medium_large', ['class' => 'm-crop__img -headline'] ); ?></div>
                                            </figure>
                                            <!-- figure.m-card__img -->
                                            <header class="m-card__header">
                                                <h3 class="m-card__heading -bold"><?php the_title(); ?></h3>
                                                <div class="m-card__tag -bold -uppercase">
                                                    <span class="m-card__featuredTag -bold -uppercase">
                                                        <?php 
                                                            foreach((get_the_category()) as $category) {
                                                                if($category->parent) { 
                                                                    // check if this category has a parent
                                                                    echo $category->cat_name; 
                                                                }
                                                            }
                                                        ?>
                                                    </span>
                                                </div>
                                                <p class="m-card__byLine -copy">Por <?php echo get_the_author( ); ?> </p>
                                                <p class="m-card__lead -copy"> <?php echo get_the_excerpt(); ?> </p>

                                            </header>
                                        </a>
                                    </article>
                                </div>
                                <!-- .m-cards__gridItem -->
                            <?php
                        }
                    } 
                ?> 
            </div>
            <!-- .m-cards__grid -->
        </div>
        <div class="m-section__sidebar">
            <div class="m-section__sticky -sizeGrow">
                <div class="m-sticky__item -sticky">
                    <a href="#" class="m-theList">
                        <h4 class="m-theList__headline -bold">The 100 Greatest Debut Singles of All Time</h4>
                    </a>
                </div>
            </div>
        </div>
        <div class="m-section__block">
            <div class="o-reviews">
                <h3 class="m-reviews__label">
                    <span class="a-reviews__labelHead -bold">Reseñas</span>
                    <span class="a-reviews__labelTail -bold">Album</span>
                </h3>
                <ul class="m-reviews__list">
                    <?php 
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 4,
                            'cat' => 24,
                            'order' => 'DESC',
                            'orderby' => 'date'
                        );
                        $headlines = new WP_Query($args);

                        if ($headlines->have_posts()) {
                            while ($headlines->have_posts()) {
                                $headlines->the_post(  );
                                $campos_album = get_post_custom( $post_id );
                                $image = get_field('portada');
                                ?>
                                <li class="m-reviews__item">
                                    <article class="m-reviewsCard">
                                        <a href="<?php the_permalink( ); ?>" class="m-reviewsCard__wrap">
                                            <figure class="m-reviewsCard__img">
                                                <div class="m-reviewsCard__crop m-crop m-crop__ratio1x1">
                                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="m-crop__img">
                                                </div>
                                            </figure>
                                            <header class="m-reviewsCard__header">
                                                <div class="m-reviewsCard__rating"></div>
                                                <h4 class="m-reviewsCard__headline -copy"><?php echo $campos_album['artista'][0]; ?></h4>
                                                <h5 class="m-reviewsCard__subheadline -semiBold -uppercase"><?php echo $campos_album['nombre_album'][0]; ?></h5>
                                                <p class="m-reviewsCard__lead -copy"><?php echo get_the_excerpt(); ?></p>
                                                <div class="m-reviewsCard__cta"><span class="-semiBold -uppercase">Leer más</span></div>
                                            </header>
                                        </a>
                                    </article>
                                </li>
                                <!-- album -->
                            <?php
                            }
                        } 
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>