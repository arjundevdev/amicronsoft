<?php

$amount = $team_type = '';


$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

?>


<?php if($team_type == 'type_1') { ?>
<section class="team team-list team-wrap">
    <div class="container">
        <?php $sub_cat_args = array('hide_empty' => 0, 'orderby' => 'ID');
        $sub_cat_terms = get_terms('tt_team_cats', $sub_cat_args);

        if (!empty($sub_cat_terms) && !is_wp_error($sub_cat_terms)) { ?>
            <ul class="filter team-filter">
                <li class="tab-title filter-item"><a class="active" href="#." data-filter="*"><?php esc_html_e('All', 'iodtheme'); ?></a></li>
                <?php foreach ($sub_cat_terms as $sub_cat) {
                    print '<li class="filter-item" ><a href="#." data-filter=".' . $sub_cat->slug . '">' . $sub_cat->name . '</a></li>';
                } ?>
            </ul>

        <?php } ?>

        <div class="">
            <ul class="row items">
                <?php
                $args = array('posts_per_page' => $amount, 'post_type' => 'tt_team');
                $query = new WP_Query($args);
                while ($query->have_posts()) {
                    $query->the_post();

                    $cur_post_id = get_the_ID();
                    $curent_term_array = wp_get_post_terms($cur_post_id, 'tt_team_cats');
                    $curent_term_string = '';
                    foreach ($curent_term_array as $curent_term_item) {
                        $curent_term_string .= ' ' . $curent_term_item->slug;

                    }
                    ?>
                    <?php $team_data = get_post_meta(get_the_ID(), '_tt_meta_page_opt', true); ?>
                    <li class="col-md-6 item <?php print $curent_term_string; ?>">
                        <article class="text-left">
                            <?php $data = get_post_meta(get_the_ID(), '_tt_meta_page_opt', true); ?>
                            <div class="row">
                                <div class="col-md-6"><img class="img-responsive"
                                                           src="<?php the_post_thumbnail_url(); ?>" alt=""></div>
                                <div class="col-md-6">
                                    <h5><?php the_title(); ?></h5>
                                    <?php (isset($team_data['_position']));
                                    { ?>
                                        <span><?php print ($team_data['_position']); ?></span>
                                    <?php } ?>

                                    <?php the_content(); ?>
                                    <?php if ($data['_enable_social']) { ?>
                                        <ul class="social">
                                            <?php (!empty($team_data['_facebook']));
                                            { ?>
                                                <li><a href="<?php print ($team_data['_facebook']); ?>"><i
                                                            class="fa fa-facebook"></i></a></li>
                                            <?php } ?>
                                            <?php (!empty($team_data['_twit']));
                                            { ?>
                                                <li><a href="<?php print ($team_data['_twit']); ?>"><i
                                                            class="fa fa-twitter"></i></a></li>
                                            <?php } ?>
                                            <?php (!empty($team_data['_ln']));
                                            { ?>
                                                <li><a href="<?php print ($team_data['_ln']); ?>"><i
                                                            class="fa fa-google"></i></a></li>
                                            <?php } ?>
                                            <?php (!empty($team_data['_google']));
                                            { ?>
                                                <li><a href="<?php print ($team_data['_google']); ?>"><i
                                                            class="fa fa-linkedin"></i></a></li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        </article>
                    </li>

                    <?php
                }
                wp_reset_postdata();
                ?>

            </ul>
        </div>
    </div>
</section>
<?php  } ?>
<?php if($team_type == 'type_2') { ?>
    <section class="team team-wrap">
        <div class="container">
            <?php $sub_cat_args = array('hide_empty' => 0, 'orderby' => 'ID');
            $sub_cat_terms = get_terms('tt_team_cats', $sub_cat_args);

            if (!empty($sub_cat_terms) && !is_wp_error($sub_cat_terms)) { ?>
                <ul class="filter team-filter">
                    <li class="tab-title filter-item"><a class="active" href="#." data-filter="*"><?php esc_html_e('All', 'iodtheme'); ?></a></li>
                    <?php foreach ($sub_cat_terms as $sub_cat) {
                        print '<li class="filter-item" ><a href="#." data-filter=".' . $sub_cat->slug . '">' . $sub_cat->name . '</a></li>';
                    } ?>
                </ul>

            <?php } ?>

            <div  class="">
                <ul class="row items">
                    <?php
                    $args = array('posts_per_page' => $amount, 'post_type' => 'tt_team');
                    $query = new WP_Query($args);
                    while ($query->have_posts()) {
                        $query->the_post();

                        $cur_post_id = get_the_ID();
                        $curent_term_array = wp_get_post_terms($cur_post_id, 'tt_team_cats');
                        $curent_term_string = '';
                        foreach ($curent_term_array as $curent_term_item) {
                            $curent_term_string .= ' ' . $curent_term_item->slug;

                        }
                        ?>
                        <?php $team_data = get_post_meta(get_the_ID(), '_tt_meta_page_opt', true); ?>
                        <li class="col-md-4 item <?php print $curent_term_string; ?>">
                            <article class="text-center">
                                <?php $data = get_post_meta(get_the_ID(), '_tt_meta_page_opt', true); ?>
                                        <img class="img-responsive" src="<?php the_post_thumbnail_url(); ?>" alt="">

                                        <h5><?php the_title(); ?></h5>
                                        <?php (isset($team_data['_position']));
                                        { ?>
                                            <span><?php print ($team_data['_position']); ?></span>
                                        <?php } ?>

                                        <?php the_content(); ?>
                                        <?php if ($data['_enable_social']) { ?>
                                            <ul class="social">
                                                <?php (!empty($team_data['_facebook']));
                                                { ?>
                                                    <li><a href="<?php print ($team_data['_facebook']); ?>"><i
                                                                class="fa fa-facebook"></i></a></li>
                                                <?php } ?>
                                                <?php (!empty($team_data['_twit']));
                                                { ?>
                                                    <li><a href="<?php print ($team_data['_twit']); ?>"><i
                                                                class="fa fa-twitter"></i></a></li>
                                                <?php } ?>
                                                <?php (!empty($team_data['_ln']));
                                                { ?>
                                                    <li><a href="<?php print ($team_data['_ln']); ?>"><i
                                                                class="fa fa-google"></i></a></li>
                                                <?php } ?>
                                                <?php (!empty($team_data['_google']));
                                                { ?>
                                                    <li><a href="<?php print ($team_data['_google']); ?>"><i
                                                                class="fa fa-linkedin"></i></a></li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>

                            </article>
                        </li>

                        <?php
                    }
                    wp_reset_postdata();
                    ?>

                </ul>
            </div>
        </div>
    </section>
<?php  } ?>
<?php if($team_type == 'type_3') { ?>
    <section class="team  team-wrap">
        <div class="container">
            <?php $sub_cat_args = array('hide_empty' => 0, 'orderby' => 'ID');
            $sub_cat_terms = get_terms('tt_team_cats', $sub_cat_args);

            if (!empty($sub_cat_terms) && !is_wp_error($sub_cat_terms)) { ?>
            <ul class="filter team-filter">
                <li class="tab-title filter-item"><a class="active" href="#." data-filter="*"><?php esc_html_e('All', 'iodtheme'); ?></a></li>
                <?php foreach ($sub_cat_terms as $sub_cat) {
                    print '<li class="filter-item" ><a href="#." data-filter=".' . $sub_cat->slug . '">' . $sub_cat->name . '</a></li>';
                } ?>
            </ul>

            <?php } ?>

            <div class="">
                <ul class="row items">
                    <?php
                    $args = array('posts_per_page' => $amount, 'post_type' => 'tt_team');
                    $query = new WP_Query($args);
                    while ($query->have_posts()) {
                    $query->the_post();

                    $cur_post_id = get_the_ID();
                    $curent_term_array = wp_get_post_terms($cur_post_id, 'tt_team_cats');
                    $curent_term_string = '';
                    foreach ($curent_term_array as $curent_term_item) {
                        $curent_term_string .= ' ' . $curent_term_item->slug;

                    }
                    ?>
                    <?php $team_data = get_post_meta(get_the_ID(), '_tt_meta_page_opt', true); ?>
                    <li class="col-md-3 item <?php print $curent_term_string; ?>">
                        <article class="text-center">
                            <?php $data = get_post_meta(get_the_ID(), '_tt_meta_page_opt', true); ?>
                            <img class="img-responsive" src="<?php the_post_thumbnail_url(); ?>" alt="">

            <h5><?php the_title(); ?></h5>
            <?php (isset($team_data['_position']));
            { ?>
            <span><?php print ($team_data['_position']); ?></span>
            <?php } ?>

            <?php the_content(); ?>
            <?php if ($data['_enable_social']) { ?>
            <ul class="social">
                <?php (!empty($team_data['_facebook']));
                { ?>
                    <li><a href="<?php print ($team_data['_facebook']); ?>"><i
                                class="fa fa-facebook"></i></a></li>
                <?php } ?>
                <?php (!empty($team_data['_twit']));
                { ?>
                    <li><a href="<?php print ($team_data['_twit']); ?>"><i
                                class="fa fa-twitter"></i></a></li>
                <?php } ?>
                <?php (!empty($team_data['_ln']));
                { ?>
                    <li><a href="<?php print ($team_data['_ln']); ?>"><i
                                class="fa fa-google"></i></a></li>
                <?php } ?>
                <?php (!empty($team_data['_google']));
                { ?>
                    <li><a href="<?php print ($team_data['_google']); ?>"><i
                                class="fa fa-linkedin"></i></a></li>
                <?php } ?>
            </ul>
            <?php } ?>

            </article>
            </li>

            <?php
            }
            wp_reset_postdata();
            ?>

            </ul>
        </div>
        </div>
    </section>
<?php  } ?>

