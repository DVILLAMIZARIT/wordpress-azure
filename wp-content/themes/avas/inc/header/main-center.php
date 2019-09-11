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
        <div id="main_head" class="business">
                <?php do_action('bddex_search'); ?> <!-- search -->
                <div class="container<?php echo bddex_full_width(); ?> sticky_hide">
                  <nav class="navbar navbar-default"> 
                                <!-- logo -->
                                <div class="col-lg-4 col-sm-12 col-xs-12 i_ls_4 logo-center">
                                  <?php do_action('bddex_logo'); ?>
                                </div> <!-- logo end -->
                                
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
                          </div> <!-- /.row -->
                      </div> <!-- /.container -->
                    </div> <!-- menu bar end -->
            </div>

