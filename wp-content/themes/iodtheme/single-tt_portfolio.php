<?php if( !iodtheme_fw_get_option('ajax_disable') ){
    get_header();
}?>

<div class="container">
    <div class="single-progect text-center">
        <div class="row">
            <div class="col-md-10 center-auto">
                <?php $data = get_post_meta( get_the_ID(), '_tt_meta_page_opt', true );

                ?>
                <div class="heading text-center <?php if( !iodtheme_fw_get_option('ajax_disable', '1') ) {echo 'detail-single-item';}?>"><span> <?php the_time('l d, o'); ?></span>
                    <h4><?php the_title(); ?></h4>
                </div>

                <?php if($data['_enable_img']) { ?>
                <!-- Images -->
                <ul class="row margin-bottom-50">
                    <?php if(!empty($data['_image1'])) { ?>
                    <li class="col-md-6 margin-bottom-30">
                        <img class="img-responsive" src="<?php print ($data['_image1']); ?>"
                                                               alt="">
                    </li>
                    <?php } ?>
                    <?php if(!empty($data['_image2'])) { ?>
                    <li class="col-md-6 margin-bottom-30">
                        <img class="img-responsive" src="<?php print ($data['_image2']); ?>"
                                                               alt="">
                    </li>
                    <?php } ?>
                    <?php if(!empty($data['_image3'])) { ?>
                    <li class="col-md-6 margin-bottom-30">
                        <img class="img-responsive" src="<?php print ($data['_image3']); ?>"
                                                               alt="">
                    </li>
                    <?php } ?>
                    <?php if(!empty($data['_image4'])) { ?>
                    <li class="col-md-6 margin-bottom-30"><img class="img-responsive" src="<?php print ($data['_image4']); ?>"
                                                               alt="">
                    </li>
                    <?php } ?>
                </ul>
                <?php } ?>
                <?php if($data['_enable_slider']) { ?>
                <ul class="row margin-bottom-50">
                    <li class="col-md-12 margin-bottom-30">
                        <div class="cbp-slider">
                            <ul class="cbp-slider-wrap">
                                <?php if(!empty($data['_sl_image1'])) { ?>
                                <li class="cbp-slider-item"> <img class="img-responsive" src="<?php print ($data['_sl_image1']); ?>" alt="" > </li>
                                <?php } ?>
                                <?php if(!empty($data['_sl_image2'])) { ?>
                                <li class="cbp-slider-item"> <img class="img-responsive" src="<?php print ($data['_sl_image2']); ?>" alt="" > </li>
                                <?php } ?>
                                <?php if(!empty($data['_sl_image3'])) { ?>
                                <li class="cbp-slider-item"> <img class="img-responsive" src="<?php print ($data['_sl_image3']); ?>" alt="" > </li>
                                <?php } ?>
                                <?php if(!empty($data['_sl_image4'])) { ?>
                                <li class="cbp-slider-item"> <img class="img-responsive" src="<?php print ($data['_sl_image4']); ?>" alt="" > </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                </ul>
                <?php } ?>
                <div class="row">
                    <div class="col-md-8 text-left">
                        <h4 class="margin-bottom-40"><?php esc_html_e('PROJECT DESCRIPTION:', 'iodtheme'); ?></h4>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; endif; ?>
                    </div>
                    <div class="col-md-4 text-left">
                        <h4 class="margin-bottom-40"><?php esc_html_e('PROJECT:', 'iodtheme'); ?> </h4>
                        <!-- Project Info -->
                        <ul class="project-info">
                            <?php if(!empty($data['_role'])) { ?>
                                <li>
                                    <p> <?php esc_html_e('Role:', 'iodtheme'); ?></p>
                                    <span><?php print ($data['_role']); ?></span>
                                </li>
                            <?php } ?>
                            <?php if(!empty($data['_complete']))
                            { ?>
                                <li>
                                    <p><?php esc_html_e('Completed:', 'iodtheme'); ?></p>
                                    <span><?php print ($data['_complete']); ?></span></li>
                            <?php } ?>
                            <?php if(!empty($data['_client']))
                            { ?>
                                <li>
                                    <p><?php esc_html_e('Client:', 'iodtheme'); ?> </p>
                                    <span><?php print ($data['_client']); ?></span></li>
                            <?php } ?>
                            <?php if(!empty($data['_technology']))
                            { ?>
                                <li>
                                    <p><?php esc_html_e('technology:', 'iodtheme'); ?></p>
                                    <span> <?php print ($data['_technology']); ?></span></li>
                            <?php } ?>
                            <?php if(!empty($data['_live']))
                            { ?>
                                <li>
                                    <a href="<?php print ($data['_live']); ?>"
                                       class="btn btn-1 margin-bottom-100 margin-top-20">
                                        <?php esc_html_e('LIVE URL', 'iodtheme'); ?>
                                        <i class="fa fa-caret-right"></i></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if( !iodtheme_fw_get_option('ajax_disable', '1') ){ get_footer(); }?>
