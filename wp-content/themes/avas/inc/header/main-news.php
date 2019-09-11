<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
*
*/
global $bddex;
?>

            <div id="main_head" class="news">
                <?php do_action('bddex_search'); ?> <!-- search -->
                <div class="container<?php echo bddex_full_width(); ?> sticky_hide">
                        <nav class="navbar navbar-default"> 
                                <!-- logo -->
                                <div class="col-lg-3 col-sm-12 col-xs-12 i_ls_4">
                                <?php do_action('bddex_logo'); ?>
                                </div> <!-- logo end -->
                                <div class="col-lg-9 col-sm-12 col-xs-12 i_ls_8"> <!-- ads -->
                                  <div class="row">
                                  <!-- banner ads -->
                                  <?php if($bddex['news_header_ads']) : ?>
                                  <div class="head_ads">
                                    <?php if ($bddex['h_ads_switch'] == '1') : 
                                          if (isset($bddex['head_ad_banner']['url']) && ($bddex['head_ad_banner']['url'] != "" )) { ?>
                                      <a href="<?php echo wp_kses_post($bddex['head_ad_banner_link']); ?>" <?php bddex_head_ad_banner_link_new_window(); ?>><img src="<?php echo esc_url($bddex['head_ad_banner']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" /></a>
                                    <?php 
                                        } 
                                        endif;
                                    ?> <!-- banner ads end-->

                                    <?php 
                                      if ($bddex['h_ads_switch'] == '0') :
                                        echo wp_sprintf(($bddex['head_ad_js']));
                                      endif;
                                    ?> <!-- adsense codes -->
                                  </div>
                                  <?php endif; ?>
                                  </div> <!-- ad end -->
                                </div>
                            </nav>
                </div> <!-- end .container -->
                
                <div class="col-lg-12 col-sm-12 menu-bar"> <!-- menu bar -->
                    <div class="container">
                          <div class="row">
                            <div class="menu-alignment">
                              <!-- Side menu -->
                              <?php do_action('bddex_side_menu'); ?>
                              <!-- Search icon -->
                              <?php do_action('bddex_search_icon'); ?>
                              <!-- cart icon -->
                              <?php do_action('bddex_cart_icon'); ?>
                              <!-- Menu Button -->
                              <?php do_action('bddex_menu_btn'); ?>
                              <!-- main menu -->
                              <?php do_action('bddex_main_menu'); ?> 
                            </div>
                          </div>
                    </div>
                </div>
            </div>

