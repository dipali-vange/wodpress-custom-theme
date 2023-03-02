<?php 
    $footer_settings =  get_option('footer_settings_data'); 
    $footer_logo       =  !empty($footer_settings['footer_logo'])       ? $footer_settings['footer_logo'] : '';  
    $copyright         =  !empty($footer_settings['copyright'])         ? $footer_settings['copyright'] : ''; 
    $ownership_text    =  !empty($footer_settings['ownership_text'])    ? $footer_settings['ownership_text'] : '';
    $tob_btn_option    =  !empty($footer_settings['tob_btn_option'])    ? $footer_settings['tob_btn_option']: '';
    $social_media_icon =  !empty($footer_settings['social_media_icon']) ? $footer_settings['social_media_icon'] : '';
    $social_option     =  !empty($footer_settings['social_option'])     ? $footer_settings['social_option'] : '';
    $footer_bg_color   =  !empty($footer_settings['footer_bg_color'])   ? $footer_settings['footer_bg_color'] : '';
 
?>

<footer style="background-color:<?php  if(!empty($footer_bg_color)){echo $footer_bg_color;} ?>">
        <div>
            <span class="logo"><?php echo wp_get_attachment_image( $footer_logo); ?></span>
        </div>
       <div class="row">
            <div class="col-3">
                <span class="footer-cat">Solution</span>
                <ul class="footer-cat-links">
                    <li><a href="">
                        <span> <?php
                        if(is_active_sidebar('first-footer-widget-area')){
                            dynamic_sidebar('first-footer-widget-area');
                        }?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-3">
                <span class="footer-cat">Industries</span>
                <ul class="footer-cat-links">
                    <li><a href=""><span><?php
                            if(is_active_sidebar('second-footer-widget-area')){
                                dynamic_sidebar('second-footer-widget-area');
                            }
                        ?></span></a>
                    </li>
                </ul>
            </div>
            <div class="col-3">
                <span class="footer-cat">Quick Links</span>
                <ul class="footer-cat-links">
                    <li><a href=""><span><?php
                            if(is_active_sidebar('third-footer-widget-area')){
                                dynamic_sidebar('third-footer-widget-area');
                            }
                        ?></span></a>
                    </li>
                 
                </ul>
            </div>
            <div class="col-3" id="newsletter">
                <!-- <span class="footer-cat">Stay Connected</span>
                <form id="subscribe">
                    <input type="email" id="subscriber-email" placeholder="Enter Email Address">
                    <input type="submit" value="Subscribe" id="btn-scribe">
                </form> -->
                <?php
                        if(is_active_sidebar('fourth-footer-widget-area')){
                            dynamic_sidebar('fourth-footer-widget-area');
                        }
                ?>

                <div id="address">
                    <span class="footer-cat">Office Location</span>
                    <ul>
                        <li>
                            <i class="far fa-building"></i>
                            <div>Los Angeles <br>
                            Office 9B, Sky High Tower, New A Ring Road, Los Angeles</div>
                        </li>
                        <li>
                            <i class="fas fa-gopuram"></i>
                            <div>Delhi <br>
                            Office 150B, Behind Sana Gate Char Bhuja Tower, Station Road, Delhi</div>
                        </li>
                    </ul>
                </div>
                
            </div>
            
       </div>
       <div id="copyright">
            <?php echo !empty($copyright) ? $copyright : '';?>
       </div>
      
       <div id="owner">
           <span>
                <?php echo !empty($ownership_text) ? $ownership_text : '';?>
           </span>
       </div>
     <?php?>
       
       <?php  if($social_media_icon == 'yes'){ ?>                 
            <div class="social-links social-1">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-linkedin-in"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-tumblr"></i></a>
                <a href=""><i class="fab fa-reddit-alien"></i></a>
            </div>
        <?php }  if($tob_btn_option == 'yes'){ ?>
                <a href="#topHeader" id="gotop" style="display: inline;">Top</a>
        <?php } ?>
    </footer>
