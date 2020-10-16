<?php
    /**
     * The template for the header sticky bar.
     * Override this template by specifying the path where it is stored (templates_path) in your Redux config.
     *
     * @author        Redux Framework
     * @package       ReduxFramework/Templates
     * @version:      3.6.10
     */
?>
<div id="redux-sticky">
    <div id="info_bar">

        <a href="javascript:void(0);" class="expand_options<?php echo esc_attr(( $this->parent->args['open_expanded'] ) ? ' expanded' : ''); ?>"<?php echo esc_attr($this->parent->args['hide_expand']) ? ' style="display: none;"' : '' ?>>
            <?php esc_attr_e( 'Expand', 'apparatus' ); ?>
        </a>

        <div class="redux-action_bar">
            <span class="spinner"></span>
<?php 
            if ( false === $this->parent->args['hide_save'] ) {
                submit_button( esc_attr__( 'Save Changes', 'apparatus' ), 'primary', 'redux_save_sticky', false );
                echo '&nbsp';
            }
            
            if ( false === $this->parent->args['hide_reset'] ) {
                submit_button( esc_attr__( 'Reset Section', 'apparatus' ), 'secondary', $this->parent->args['opt_name'] . '[defaults-section]', false, array( 'id' => 'redux-defaults-section-sticky' ) );
                echo '&nbsp';
                submit_button( esc_attr__( 'Reset All', 'apparatus' ), 'secondary', $this->parent->args['opt_name'] . '[defaults]', false, array( 'id' => 'redux-defaults-sticky' ) );
            }
?>
        </div>
        <div class="redux-ajax-loading" alt="<?php esc_attr_e( 'Working...', 'apparatus' ) ?>">&nbsp;</div>
        <div class="clear"></div>
    </div>

    <!-- Notification bar -->
    <div id="redux_notification_bar">
        <?php $this->notification_bar(); ?>
    </div>


</div>