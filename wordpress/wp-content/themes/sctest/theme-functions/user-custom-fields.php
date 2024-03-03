<?php
function custom_user_profile_fields( $user ) {
    echo '<h3 class="heading">Custom Fields</h3>';
    ?>
    <table class="form-table">
        <tr>
            <th><label for="additional_contact">Additional contact</label></th>
            <td>
                <input type="text" name="additional_contact" id="additional_contact" value="<?php echo esc_attr( get_the_author_meta( 'additional_contact', $user->ID ) ); ?>" class="regular-text" />
            </td>
        </tr>
    </table>
    <?php
}
add_action( 'show_user_profile', 'custom_user_profile_fields' );
add_action( 'edit_user_profile', 'custom_user_profile_fields' );



function save_custom_user_profile_fields( $user_id ) {
    if ( current_user_can( 'edit_user', $user_id ) ) {
        update_user_meta( $user_id, 'additional_contact', sanitize_text_field( $_POST['additional_contact'] ) );
    }
}
add_action( 'personal_options_update', 'save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_custom_user_profile_fields' );