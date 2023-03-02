<?php wp_head(); 

$header_setting =  get_option('header_settings_data'); 
// print_r($header_setting);
$header_logo   =  !empty($header_setting['header_logo'])     ? $header_setting['header_logo'] : ''; 
$topbar_enable =  !empty($header_setting['display_topbar'])  ? $header_setting['display_topbar'] : ''; 
$telephone_no  =  !empty($header_setting['telephone_no'])    ? $header_setting['telephone_no'] : ''; 
$email         =  !empty($header_setting['email'])           ? $header_setting['email'] : ''; 
?>
<header id="topHeader">

    <?php 
        if($topbar_enable == 'yes'){
    ?>
    <ul id="topInfo">
        <li><?php echo $telephone_no; ?></li>
        <li><?php echo $email; ?></li>
    </ul>
    <?php } ?>
    <nav>
        <span class="logo"><a href="<?php echo site_url();?>"><?php echo wp_get_attachment_image( $header_logo); ?></a></span>
        <div class="menu-btn-3" onclick="menuBtnFunction(this)">
            <span></span>
        </div>
        <?php 
            $args = array(
                'menu_class' => 'mainMenu',        
                'menu' => 'menu-main-menu'
            );
            wp_nav_menu($args);
        ?>
    </nav>
</header>