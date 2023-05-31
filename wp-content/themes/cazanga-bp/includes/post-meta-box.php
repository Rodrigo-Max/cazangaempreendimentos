<?php
//ADICIONANDO O META BOX
add_action( 'add_meta_boxes', 'bp_post_meta_box_add' );
function bp_post_meta_box_add(){
    add_meta_box( 'bp-metabox', 'Personalizações', 'bp_meta_box', 'post', 'normal', 'high' );
}

//FORMULARIO PARA SALVAS OS DADOS
function bp_meta_box(){
    global $post;
    
    $values = get_post_custom( $post->ID );
    $bp_subtitulo = isset( $values['bp_subtitulo'] ) ? esc_attr( $values['bp_subtitulo'][0] ) : '';
    //wp_nonce_field( 'bp_post_meta', '_wpnonce' );
    ?>
    <p>
        <label for="bp_subtitulo" style="font-weight: 700">Subtítulo do post:</label>
        <input type="text" name="bp_subtitulo" id="bp_subtitulo" value="<?php echo $bp_subtitulo; ?>" style="width: 100%" />
    </p>
    <?php
}

add_action( 'save_post', 'bp_post_meta_box_save' );
function bp_post_meta_box_save( $post_id ){
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;

    /*if( !isset( $_POST['_wpnonce'] ) || !wp_verify_nonce( $_POST['_wpnonce'], 'bp_post_meta' ) )
        return $post_id;*/

    if( !current_user_can( 'edit_post' ) ) return;

    $bp_subtitulo = ( isset( $_POST['bp_subtitulo'] ) && $_POST['bp_subtitulo'] ) ? $_POST['bp_subtitulo'] : '';
    update_post_meta( $post_id, 'bp_subtitulo', $bp_subtitulo );
}