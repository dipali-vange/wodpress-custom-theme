(function( $ ) {
   'use strict';
   $(function() {
      
      $('#upload_image').click(open_custom_media_window);
      function open_custom_media_window() {
         if (this.window === undefined) {
            this.window = wp.media({
               title: 'Insert Profile Image',
               library: {type: 'image'},
               multiple: false,
               button: {text: 'Insert Profile Image'}
            });
            var self = this;
            this.window.on('select', function() {
               var response = self.window.state().get('selection').first().toJSON();
               $('.wp_attachment_id').val(response.id);
               $('.image').attr('src', response.sizes.thumbnail.url);
               $('.image').show();
            });
         }
         this.window.open();
         return false;
      }
   });



})( jQuery );

// jQuery(document).ready(function(){
   
//    jQuery('input:radio[name="header_settings_data[display_topbar]"]').change(function() {
//       if (jQuery(this).val() == 'no') {
//          jQuery(".topbar_option").css("display","none")
//       } else {
//          jQuery(".topbar_option").removeAttr("style")
//       }
//     });
// });

// Repeater Fields: 
jQuery(document).ready(function($){
   jQuery(document).on('click', '.wc-remove-item', function() {
      jQuery(this).parents('tr.wc-sub-row').remove();
   }); 				
   jQuery(document).on('click', '.wc-add-item', function() {
      var row_no = jQuery('.footer-data-table tr.wc-sub-row').length;    
      var p_this = jQuery(this);
      row_no = parseFloat(row_no);
      var row_html = jQuery('.footer-data-table .wc-hide-tr').html().replace(/rand_no/g, row_no).replace(/hide_custom_repeater_item/g, 'custom_repeater_item');
      jQuery('.footer-data-table tbody').append('<tr class="wc-sub-row">' + row_html + '</div>');    
   });
})