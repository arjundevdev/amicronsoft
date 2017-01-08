<?php

$gallery_type = $amount = $filter_style = $cats = '';

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);
$cats = str_replace(' ', '', $cats);
$catsArr = explode(",", $cats);
?>


<?php if($gallery_type == 'type_1' && !empty($cats)) { ?>
        <section class="portfolio light-gray-bg padding-top-65 padding-bottom-20">
            <?php $sub_cat_args = array('hide_empty' => 0, 'orderby' => 'ID', 'include' => $cats);
            $sub_cat_terms = get_terms('tt_portfolio_cats', $sub_cat_args);
            if (!empty($sub_cat_terms) && !is_wp_error($sub_cat_terms)) { ?>
                <div class="container">
                    <div class="text-center">
                        <div id="ajax-work-filter" class="cbp-l-filters-buttonCenter filter-style-2">
                            <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> All
                                <div class="cbp-filter-counter"></div>
                            </div>
                            <?php foreach ($sub_cat_terms as $sub_cat) {
                                print '<div class="cbp-filter-item" data-filter=".' . $sub_cat->slug . '"><span>' . $sub_cat->name . '</span><div class="cbp-filter-counter"></div></div>';
                            } ?>
                        </div>
                    </div>
                </div>

            <?php } ?>
            <div class="ajax-work col-3">
                <?php
                $args = array('posts_per_page' => $amount, 'post_type' => 'tt_portfolio',
                    'tax_query' => array(
                    array(
                        'taxonomy' => 'tt_portfolio_cats',
                        'field'    => 'term_id',
                        'terms'    => $catsArr,
                    ),
                ),
                );
                $query = new WP_Query($args);
                while ($query->have_posts()) {
                    $query->the_post();

                    $cur_post_id = get_the_ID();
                    $curent_term_array = wp_get_post_terms($cur_post_id, 'tt_portfolio_cats');
                    $curent_term_string = '';
                    foreach ($curent_term_array as $curent_term_item) {
                        $curent_term_string .= ' ' . $curent_term_item->slug;

                    }
                    ?>
                    <div class="cbp-item <?php print $curent_term_string; ?>">
                        <article class="item"><img class="img-responsive" src="<?php the_post_thumbnail_url(); ?>" alt="" >
                            <div class="over-detail">
                                <div class="top-detail">
                                    <?php if( iodtheme_fw_get_option('portfolio_cpt_single', '1')) { ?>
                                    <a href="<?php the_permalink(); ?>" class="<?php if( iodtheme_fw_get_option('ajax_disable', '1') ) {echo 'cbp-singlePage';}?>"><i class="fa fa-link"></i> </a>
                                    <?php } ?>
                                    <a href="<?php the_post_thumbnail_url(); ?>" class="cbp-lightbox" data-title=""><i class="icon-magnifier"></i></a>
                                </div>
                                <div class="bottom-detail">
                                    <h3><?php the_title(); ?></h3>
                                    <span><?php print $curent_term_string; ?></span> </div>
                            </div>
                        </article>
                    </div>
                    <?php
                }
                wp_reset_postdata();
                ?>
            </div>
            <?php /*$items_cat = implode(",", $catsArr); */?>
            <?php /*if($query->max_num_pages > 1) {*/?>
            <!-- LOAD MORE -->
<!--            <div class="text-center margin-top-50 margin-bottom-50 animate fadeInUp" data-wow-delay="0.4s">
                <div id="ajax-loadMore"> <a href="" class="load-more btn btn-1" data-amount="<?php /*print esc_html($amount); */?>" data-current-page="1" data-max-page="<?php /*print($query->max_num_pages); */?>" data-category="<?php /*print($items_cat); */?>" class="cbp-l-loadMore-link btn btn-1" rel="nofollow">
                        <span class="cbp-l-loadMore-defaultText">View Full Portfolio <i class="fa fa-caret-right"></i></span>
                        <span class="cbp-l-loadMore-noMoreLoading">NO MORE WORKS <i class="fa fa-caret-up"></i></span></a>
                </div>
            </div>
            --><?php /*} */?>
    </section>
<?php } ?>

<?php if($gallery_type == 'type_2' && !empty($cats)) { ?>
    <!-- Portfolio -->
    <div class="revenues">
    <section class="portfolio padding-top-0 padding-bottom-20">
        <!-- PORTFOLIO ROW -->
        <div class="ajax-work">
                <?php
                $args = array('posts_per_page' => $amount, 'post_type' => 'tt_portfolio',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'tt_portfolio_cats',
                            'field'    => 'term_id',
                            'terms'    => $catsArr,
                        ),
                    ),
                );
                $query = new WP_Query($args);
                while ($query->have_posts()) {
                    $query->the_post();

                    $cur_post_id = get_the_ID();
                    $curent_term_array = wp_get_post_terms($cur_post_id, 'tt_portfolio_cats');
                    $curent_term_string = '';
                    foreach ($curent_term_array as $curent_term_item) {
                        $curent_term_string .= ' ' . $curent_term_item->slug;

                    }
                    ?>
                    <?php $data = get_post_meta( get_the_ID(), '_tt_meta_page_opt', true ); ?>
                    <div class="cbp-item col-sm-6 <?php if($data['_big_item']) print('col-sm-3'); ?> <?php print $curent_term_string; ?>">
                        <article class="item"><img class="img-responsive" src="<?php the_post_thumbnail_url(); ?>" alt="" >
                            <!-- Hover -->
                            <div class="over-detail">
                                <!-- Link -->
                                <div class="top-detail">
                                    <?php if( iodtheme_fw_get_option('portfolio_cpt_single', '1')) { ?>
                                    <a href="<?php the_permalink(); ?>" class="<?php if( iodtheme_fw_get_option('ajax_disable') ) {echo 'cbp-singlePage';}?>"><i class="fa fa-link"></i> </a>
                                    <?php } ?>
                                    <a href="<?php the_post_thumbnail_url(); ?>" class="cbp-lightbox" data-title=""><i class="icon-magnifier"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <?php
                }
                wp_reset_postdata();
                ?>
        </div>
    </section>
    </div>
<?php } ?>


