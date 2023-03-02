<style>
	select{
		font-family: fontAwesome
	}
</style>

<form method="post" action="options.php">
    <?php
        settings_fields( 'footer_settings_global' ); 
        do_settings_sections( 'footer_settings_global' ); 

        $footer_settings =  get_option('footer_settings_data'); 
        $footer_logo          =  !empty($footer_settings['footer_logo'])       ? $footer_settings['footer_logo'] : '';  
        $copyright_text       =  !empty($footer_settings['copyright'])         ? $footer_settings['copyright'] : ''; 
        $ownership_text       =  !empty($footer_settings['ownership_text'])    ? $footer_settings['ownership_text'] : '';
        $top_button_option    =  !empty($footer_settings['tob_btn_option'])    ? $footer_settings['tob_btn_option']: '';
        $social_icon          =  !empty($footer_settings['social_media_icon']) ? $footer_settings['social_media_icon'] : '';
        $social_repeater_icon =  !empty($footer_settings['social_option'])     ? $footer_settings['social_option'] : '';
        $footer_bg_color      =  !empty($footer_settings['footer_bg_color']) ? $footer_settings['footer_bg_color'] : '';
    ?>
    <table class="form-table footer-data-table"> 
        
        <tr>
            <th scope="row"> <?php _e('Footer Logo');?> </th>
            <td> 
                    <input type="button" value="Upload Profile Image"  class="button-primary" id="upload_image"/>
                    <input type="hidden" name="footer_settings_data[footer_logo]"  class="wp_attachment_id" value="<?php echo $footer_logo;?>" /> </br>
                    <img src="" class="image" style="display:none;margin-top:10px;"/><br>
                    <?php echo wp_get_attachment_image( $footer_logo); ?>
            </td>
        </tr>

        <tr>
            <th scope="row"> <?php _e('Copyright Text');?> </th>
            <td> <input type="text" name="footer_settings_data[copyright]" value = "<?php echo $copyright_text;?>"> </td>
        </tr>

        <tr>
            <th scope="row"> <?php _e('Ownership Text');?> </th>
            <td> <input type="text" name="footer_settings_data[ownership_text]" value = "<?php echo $ownership_text;?>"> </td>
        </tr>

        <tr>
            <th scope="row"> <?php _e('Display top button');?> </th>
            <td> 
                <input type="radio" name="footer_settings_data[tob_btn_option]" value="yes" <?php echo (!empty($top_button_option == "yes")) ? 'checked' : '';?>> <?php _e('Yes'); ?>
                <input type="radio" name="footer_settings_data[tob_btn_option]" value="no" <?php echo (!empty($top_button_option == "no")) ? 'checked' : '';?>> <?php _e('No');  ?>
            </td>
        </tr>
     
        <tr>
            <th scope="row"> <?php _e('Footer Background color');?> </th>
            <td>   
            <?php
                wp_enqueue_script('wp-color-picker');
                wp_enqueue_style( 'wp-color-picker' );
                ?>
                <input name="footer_settings_data[footer_bg_color]" type="text" id="footer_bg_color" value="<?php echo $footer_bg_color;?>" data-default-color="#ef4b42">
              
                <script type="text/javascript">
                    jQuery(document).ready(function($) {   
                        $('#footer_bg_color').wpColorPicker();
                    });             
                </script>
            </td>
        </tr>

        <tr>
            <th scope="row"> <?php _e('Social Media Icon');?> </th>
            <td> 
                <input type="radio" name="footer_settings_data[social_media_icon]" value="yes" <?php echo ($social_icon == "yes") ? 'checked' : '';?>> <?php _e('Yes'); ?>
                <input type="radio" name="footer_settings_data[social_media_icon]" value="no"  <?php echo ($social_icon == 'no') ? 'checked' : '';?>> <?php _e('No');  ?>
            </td>
        </tr>  
        <th scope="row"> <?php _e('Add social Icon');?> </th>
        <?php 
			if(!empty($social_repeater_icon )){
				foreach( $social_repeater_icon as $item_key => $item_value ){
                   if(!empty($item_value['icon']) && !empty($item_value['link'])){
                ?>
					<tr class="wc-sub-row">				
						<td>
							<!-- <input name="footer_settings_data[social_option][<?php echo $item_key; ?>][icon]" type="text" value="<?php echo (isset($item_value['icon'])) ? $item_value['icon'] : ''; ?>" style="width:98%;" placeholder="Heading">	 -->
                            <select  name="footer_settings_data[social_option][<?php echo $item_key; ?>][icon]">
                                <option value='fa-facebook' <?php echo ($item_value['icon'] == "fa-facebook")  ? 'selected' : '';?>>&#xf09a; fa-facebook</option>
                                <option value='fa-whatsapp' <?php echo ($item_value['icon']  == "fa-whatsapp")  ? 'selected' : '';?>>&#xf232; fa-whatsapp</option>
                                <option value='fa-twitter'  <?php echo ($item_value['icon']  == "fa-twitter")   ? 'selected' : '';?>>&#xf099; fa-twitter</option>
                                <option value='fa-instagram' <?php echo ($item_value['icon'] == "fa-instagram") ? 'selected' : '';?>>&#xf16d; fa-instagram</option>
                                <option value='fa-youtube'   <?php echo ($item_value['icon'] == "fa-youtube")   ? 'selected' : '';?>>&#xf167; fa-youtube</option>
                                <option value='fa-envelope'  <?php echo ($item_value['icon'] == "fa-envelope")  ? 'selected' : '';?>>&#xf0e0; fa-envelope</option>
                            </select>
						</td>
						<td>
							<input type="text" name="footer_settings_data[social_option][<?php echo $item_key; ?>][link]" value="<?php echo (isset($item_value['link'])) ? $item_value['link'] : ''; ?>" style="width:98%;" placeholder="Social Icon Link"/>
						</td>
						<td>
							<button class="wc-remove-item button" type="button">Remove</button>
						</td>   
					</tr>
					<?php
                   }
				}
			}
			?>			

            <tr class="wc-hide-tr" style="display: none;">				
				<td>
				    	<!-- <input value=""  placeholder="Heading" style="width:98%;" >		 -->
                        <select name="footer_settings_data[social_option][rand_no][icon]" >
                            <option value="select-icon">select icon</option>
                            <option value='fa-facebook'>&#xf09a; fa-facebook</option>
                            <option value='fa-whatsapp'>&#xf232; fa-whatsapp</option>
                            <option value='fa-twitter'>&#xf099; fa-twitter</option>
                            <option value='fa-instagram'>&#xf16d; fa-instagram</option>
                            <option value='fa-youtube'>&#xf167; fa-youtube</option>
                            <option value='fa-envelope'>&#xf0e0; fa-envelope</option>
                        </select>
                </td>
				<td>
					<input type="text" name="footer_settings_data[social_option][rand_no][link]" style="width:98%;" placeholder="Social Icon Link"/>
                
				</td>
				<td>
					<button class="wc-remove-item button" type="button">Remove</button>
				</td>
			</tr>
 
		<tfoot>
			<tr>
				<td colspan="4"><button class="wc-add-item button" type="button">Add Social Icon</button></td>
			</tr>
		</tfoot>
        
    </table>     
    <?php submit_button(); ?>      
</form>    