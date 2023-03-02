<form method="post" action="options.php" enctype="multipart/form-data">

    <?php
        settings_fields( 'header_settings_global' ); 
        do_settings_sections( 'header_settings_global' ); 

        $header_settings =  get_option('header_settings_data'); 
        $header_logo =  !empty($header_settings['header_logo']) ? $header_settings['header_logo'] : "";
        $topbar      =  !empty($header_settings['display_topbar']) ? $header_settings['display_topbar'] : "";
        $telephone   =  !empty($header_settings['telephone_no']) ? $header_settings['telephone_no'] : "";
        $email       =  !empty($header_settings['email']) ? $header_settings['email'] : "";
       
    ?>
    <table class="form-table">  
        <tr>
            <th scope="row"> <?php _e('Header Logo');?> </th>
            <td> 
                    <input type="button" value="Upload Profile Image"  class="button-primary" id="upload_image"/>
                    <input type="hidden" name="header_settings_data[header_logo]"  class="wp_attachment_id" value="<?php echo $header_logo; ?>" /> </br>
                    <img src="" class="image" style="display:none;margin-top:10px;"/><br>
                    <?php echo wp_get_attachment_image( $header_logo); ?>
            </td>
        </tr>

        <tr>
            <th scope="row"> <?php _e('Display Topbar');?> </th>
            <td> 
                <input type="radio" name="header_settings_data[display_topbar]" value="yes" <?php echo (!empty($topbar == "yes")) ? 'checked' : '';?>> <?php _e('Yes'); ?>
                <input type="radio" name="header_settings_data[display_topbar]" value="no" <?php echo (!empty($topbar == "no")) ? 'checked' : '';?>> <?php _e('No');  ?>
            </td>
        </tr>

        <tr class="topbar_option" >
            <th scope="row"> <?php _e('Telephone No.');?> </th>
            <td> 
                <input type="text" name="header_settings_data[telephone_no]" value = "<?php echo (!empty($telephone)) ? $telephone : '';?>"> 
            </td>
        </tr>

        <tr class="topbar_option" >
            <th scope="row"> <?php _e('Email');?> </th>
            <td> 
                <input type="text" name="header_settings_data[email]" value = "<?php echo (!empty($email)) ? $email : '';?>"> 
            </td>
        </tr>
        
    </table>    

    <?php submit_button(); ?>
</form>

    