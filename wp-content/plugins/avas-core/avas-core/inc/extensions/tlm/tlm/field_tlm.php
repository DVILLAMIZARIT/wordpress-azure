<?php


// Exit if accessed directly
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

// Don't duplicate me!
    if ( ! class_exists( 'ReduxFramework_tlm' ) ) {

        /**
         * Main ReduxFramework_tlm class
         *
         * @since       1.0.0
         */
        class ReduxFramework_tlm extends ReduxFramework {

            /**
             * Field Constructor.
             * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
             *
             * @since       1.0.0
             * @access      public
             * @return      void
             */
            function __construct( $field = array(), $value = '', $parent ) {

                $this->parent   = $parent;
                $this->field    = $field;
                $this->value    = $value;

                $this->extension_url = AVAS_PLUGIN_URL . '/inc/extensions/tlm/'; // Extention url

                // Set default args for this field to avoid bad indexes. Change this to anything you use.
                $defaults    = array(
                    'options'          => array(),
                    'stylesheet'       => '',
                    'output'           => true,
                    'enqueue'          => true,
                    'enqueue_frontend' => true
                );
                $this->field = wp_parse_args( $this->field, $defaults );

            }

            /**
             * Field Render Function.
             * Takes the vars and outputs the HTML for the field in the settings
             *
             * @since       1.0.0
             * @access      public
             * @return      void
             */
            public function render() {

                // No errors please
                $defaults = array(
                    'full_width' => true,
                    'overflow'   => 'inherit',
                );

                $this->field = wp_parse_args( $this->field, $defaults );

                $bDoClose = false;

                $id = $this->parent->args['opt_name'] . '-' . $this->field['id'];

                ?>
                    <h4><?php esc_html_e( 'Theme verification', 'redux-framework' ); ?></h4>
                    <div id="redux-tlm-code-wrapper">
                        <p class="description" id="tlm-code-description">
                            <?php echo esc_html( apply_filters( 'redux-tlm-description', __( 'Enter theme purchase code:', 'redux-framework' ) ) ); ?>
                        </p>
                        <div class="register-theme-form">
                            <input type="text" name="<?php echo $this->parent->args['opt_name']; ?>[tlm]" id="purchase_code_verification" value="<?php if(isset($this->parent->options['tlm'])){echo $this->parent->options['tlm'];}else{echo 'xxxx-xxxx-xxxx-xxxx-xxxx';} ?>" class="regular-text ">
                            <div class="clear"></div>
                            <a href="javascript:void(0);" id="validation_activate" class="validation_activate_buttons" data-verify="0">Register</a> 
                            <a href="javascript:void(0);" id="validation_deactivate" class="validation_activate_buttons" data-verify="1">Deregister</a> 
                            <a href="#popup_license" id="popup_license_button">popup license</a>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <h4><?php esc_html_e( 'How to obtain and activate purchse code', 'avas-core' ); ?></h4>
                    <iframe width="490" height="340" src="https://www.youtube.com/embed/lvgylymAPgc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                <?php
            }

            /**
             * Enqueue Function.
             * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
             *
             * @since       1.0.0
             * @access      public
             * @return      void
             */
            public function enqueue() {

                wp_enqueue_script(
                    'redux-tlm-remodal',
                    $this->extension_url . 'tlm/remodal.js',
                    array( 'jquery' ),
                    ReduxFramework_extension_tlm::$version,
                    true
                );

                wp_enqueue_script(
                    'redux-tlm',
                    $this->extension_url . 'tlm/field_tlm.js',
                    array( 'jquery' ),
                    ReduxFramework_extension_tlm::$version,
                    true
                );

                wp_enqueue_style(
                    'redux-tlm-remodal-default',
                    $this->extension_url . 'tlm/remodal-default-theme.css',
                    time(),
                    true
                );

                wp_enqueue_style(
                    'redux-tlm-remodal',
                    $this->extension_url . 'tlm/remodal.css',
                    time(),
                    true
                );

                wp_enqueue_style(
                    'redux-tlm',
                    $this->extension_url . 'tlm/field_tlm.css',
                    time(),
                    true
                );

            }

            /**
             * Output Function.
             * Used to enqueue to the front-end
             *
             * @since       1.0.0
             * @access      public
             * @return      void
             */
            public function output() {

                if ( $this->field['enqueue_frontend'] ) {

                }

            }

        }
    }
