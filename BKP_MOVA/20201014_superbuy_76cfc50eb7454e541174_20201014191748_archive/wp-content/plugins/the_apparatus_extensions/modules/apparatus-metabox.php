<?php
/**
 * Adds a box to the main column on the Post/Page add/edit screens.
 */
function appeasy_add_meta_box() {
		global $post;
		
		add_meta_box(
                'appeasy-post-second-title', esc_html__( 'Post Second Title', 'apparatus' ), 'appeasy_second_title_meta_callback', array('post'), 'normal', 'high'
        ); //you can change the 4th paramter i.e. post to custom post type name, if you want it for something else		


}
add_action( 'add_meta_boxes', 'appeasy_add_meta_box' );


/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function appeasy_second_title_meta_callback( $post ) {
        global $post;
        // Add an nonce field so we can check for it later.
       // wp_nonce_field( 'appeasy_meta_box', 'appeasy_meta_box_nonce' );
		     wp_nonce_field( 'appeasy_meta_box', 'appeasy_post_second_title_nonce' );
        /*
         * Use get_post_meta() to retrieve an existing value
         * from the database and use the value for the form.
         */
		$value = get_post_meta( $post->ID, 'appeasy_post_second_title', true ); 
        ?>  
        <div class="wrap">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="appeasy_post_second_title"><?php esc_html_e('Post Second Title', 'apparatus'); ?></label>
                    </th>
                    <td style="vertical-align: middle;">
                        <input type="text" name="appeasy_post_second_title" class="widefat" value="<?php esc_attr_e($value); ?>" id="appeasy_post_second_title">            
                    </td>
                </tr>
                <!-- End Post Heading -->
                                                
            </table>
        </div>        
        <?php

}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function appeasy_save_second_title_meta_box_data($post_id) {

        
		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );
		$is_valid_nonce = ( isset( $_POST[ 'appeasy_second_title_nonce' ] ) && wp_verify_nonce( $_POST[ 'appeasy_second_title_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'appeasy_post_second_title' ] ) ) {
        update_post_meta( $post_id, 'appeasy_post_second_title', sanitize_text_field( $_POST[ 'appeasy_post_second_title' ] ) );
    }

}

add_action( 'save_post', 'appeasy_save_second_title_meta_box_data', 10, 2 );





