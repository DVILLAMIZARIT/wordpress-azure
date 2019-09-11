<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
*
*/
// Default header
global $bddex;
?>

			<div id="main_head">
                <?php do_action('bddex_search'); ?> <!-- search -->
                <div class="container<?php echo bddex_full_width(); ?>">
                   <!--  <div class="row"> -->
                        <nav class="navbar navbar-default"> 
                                <!-- logo -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                  <div class="row">
                                <?php do_action('bddex_logo'); ?>
                              </div>
                                </div>
                            <div class="col-lg-9 col-sm-9">
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
                            <!-- /.navbar-collapse --> 
                        </nav>
                    <!-- </div> --> <!-- end .row -->
                </div> <!-- end .container -->
      </div>
            