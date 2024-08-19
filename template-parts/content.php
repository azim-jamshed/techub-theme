<?php if (is_single()): ?>



    <!-- postbox area start -->
    <div class="tp-postbox-wrapper">
        <article id="post-<?php the_ID(); ?>" <?php post_class('tp-postbox-item mb-50'); ?>>
            <?php if (has_post_thumbnail()): ?>
                <div class="tp-postbox-thumb p-relative">

                    <?php the_post_thumbnail(); ?>

                    <div class="tp-postbox-date-text">
                        <span><?php the_time('d'); ?> <br> <?php the_time('M'); ?></span>
                    </div>
                </div>

            <?php endif; ?>


            <div class="tp-postbox-content">
                <?php echo get_template_part('template-parts/blog/meta'); ?>
                <div class="tp-postbox-date-text">
                    <span><?php the_time('d'); ?> <br> <?php the_time('M'); ?></span>

                </div>
                <h3 class="tp-postbox-title">
                    <?php the_title(); ?>
                </h3>
                <div class="tp-postbox-details-text">
                    <?php the_content(); ?>

                </div>
            </div>
        </article>


        <div class="tp-postbox-details-share-wrapper">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-6">
                    <div class="tp-postbox-details-tag">

                        <span> <?php echo esc_html__('Tag:', 'techub'); ?> </span>

                        <?php techub_tags(); ?>



                    </div>
                </div>

                <!-- template function  -->

                <div class="col-xl-7 col-lg-6 col-md-6">
                    <?php social_share(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- postbox area end -->




<?php else: ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('tp-postbox-item mb-50'); ?>>
        <?php if (has_post_thumbnail()): ?>
            <div class="tp-postbox-thumb p-relative">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                </a>
                <div class="tp-postbox-date-text">
                    <span><?php the_time('d'); ?> <br> <?php the_time('M'); ?></span>
                </div>
            </div>
        <?php endif; ?>

        <div class="tp-postbox-content">
            <?php echo get_template_part('template-parts/blog/meta'); ?>
            <h3 class="tp-postbox-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <div class="tp-postbox-text">
                <?php the_excerpt(); ?>
            </div>
            <?php echo get_template_part('template-parts/blog/button'); ?>
        </div>
    </article>
<?php endif ?>