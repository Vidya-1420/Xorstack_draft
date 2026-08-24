<?php
require_once "class-zonar-personal-portfolio-word-press-theme-base.php";
class ZonarPersonalPortfolioWordPressTheme {
	public $plugin_file=__FILE__;
	public $response_obj;
	public $license_message;
	public $show_message=false;
	public $slug='zonar';
	public $plugin_version='';
	public $text_domain='';
	function __construct() {
		add_action( 'admin_print_styles', [ $this, 'set_admin_style' ] );
		$this->set_plugin_data();
		$main_lic_key="ZonarPersonalPortfolioWordPressTheme_lic_Key";
		$lic_key_name =Zonar_Personal_Portfolio_Word_Press_Theme_Base::get_lic_key_param($main_lic_key);
        $license_key=get_option($lic_key_name,'');
        if(empty($license_key)){
	        $license_key=get_option($main_lic_key,'');
	        if(!empty($license_key)){
		        update_option($lic_key_name,$license_key) || add_option($lic_key_name,$license_key);
		        update_option($main_lic_key,'');
		       
	        }
        }
		$lice_email=get_option( "ZonarPersonalPortfolioWordPressTheme_lic_email",'');
		$template_dir=dirname(__FILE__)."/../../";
		if(Zonar_Personal_Portfolio_Word_Press_Theme_Base::check_wp_plugin($license_key,$lice_email,$this->license_message,$this->response_obj,$template_dir."/style.css")){
			add_action( 'admin_menu', [$this,'active_admin_menu'],99999);
			add_action( 'admin_post_ZonarPersonalPortfolioWordPressTheme_el_deactivate_license', [ $this, 'action_deactivate_license' ] );
			//$this->licenselMessage=$this->mess;
			require (ZONAR_THEME_PATH . '/includes/core/ab/core.php');

		}else{
			if(!empty($license_key) && !empty($this->license_message)){
				$this->show_message=true;
			}
			$main_lic_key="ZonarPersonalPortfolioWordPressTheme_lic_Key";
			$lic_key_name =Zonar_Personal_Portfolio_Word_Press_Theme_Base::get_lic_key_param($main_lic_key);
			update_option($lic_key_name,'') || add_option($lic_key_name,'');
			add_action( 'admin_post_ZonarPersonalPortfolioWordPressTheme_el_activate_license', [ $this, 'action_activate_license' ] );
			add_action( 'admin_menu', [$this,'inactive_menu']);
			remove_action( 'init', 'portfolio_post_types' );
			remove_action('init', 'zonar_register_metabox_list');
		}
	}
	public function set_plugin_data(){
		if ( ! function_exists( 'get_plugin_data' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}
		if ( function_exists( 'get_plugin_data' ) ) {
			$data = get_plugin_data( $this->plugin_file );
			if ( isset( $data['Version'] ) ) {
				$this->plugin_version = $data['Version'];
			}
			if ( isset( $data['TextDomain'] ) ) {
				$this->text_domain = $data['TextDomain'];
			}
		}
	}
	public function set_admin_style() {
		wp_register_style( "ZonarPersonalPortfolioWordPressThemeLic", get_theme_file_uri("_lic_style.css"),10,$this->plugin_version);
		wp_enqueue_style( "ZonarPersonalPortfolioWordPressThemeLic" );
	}
	public function active_admin_menu(){
		 
		add_menu_page (  "About Zonar", "About Zonar", "activate_plugins", $this->slug, [$this,"activated"], " dashicons-megaphone ");
		//add_submenu_page(  $this->slug, "ZonarPersonalPortfolioWordPressTheme License", "License Info", "activate_plugins",  $this->slug."_license", [$this,"activated"] );

	}
	public function inactive_menu() {
		add_menu_page( "About Zonar", "About Zonar", 'activate_plugins', $this->slug,  [$this,"license_form"], " dashicons-megaphone " );
		
	}
	public function action_activate_license(){
		check_admin_referer( 'el-license' );
		$license_key=!empty($_POST['el_license_key'])?sanitize_text_field( wp_unslash($_POST['el_license_key'])):'';
		$licenseEmail=!empty($_POST['el_license_email'])?sanitize_email( wp_unslash($_POST['el_license_email'])):'';
		update_option("ZonarPersonalPortfolioWordPressTheme_lic_Key",$license_key) || add_option("ZonarPersonalPortfolioWordPressTheme_lic_Key",$license_key);
		update_option("ZonarPersonalPortfolioWordPressTheme_lic_email",$licenseEmail) || add_option("ZonarPersonalPortfolioWordPressTheme_lic_email",$licenseEmail);
		update_option('_site_transient_update_themes','');
		wp_safe_redirect(admin_url( 'admin.php?page='.$this->slug));
	}
	public function action_deactivate_license() {
		check_admin_referer( 'el-license' );
		$message='';
		if(Zonar_Personal_Portfolio_Word_Press_Theme_Base::remove_license_key(__FILE__,$message)){
			$main_lic_key="ZonarPersonalPortfolioWordPressTheme_lic_Key";
			$lic_key_name =Zonar_Personal_Portfolio_Word_Press_Theme_Base::get_lic_key_param($main_lic_key);
			update_option($lic_key_name,'') || add_option($lic_key_name,'');
			update_option('_site_transient_update_themes','');
		}
    	wp_safe_redirect(admin_url( 'admin.php?page='.$this->slug));
    }
	public function activated(){
		?>
        <div class="clear"></div>
	<div class="wrap-theside">
		<div class="wrap theside-page-welcome about-wrap">
			<h1>Welcome to Zonar Creative Portfolio WordPress Theme</h1>
			<div class="about-text">
			   Find out what's new on Version 4.3!	
			</div>
			<div class="wp-badge vc-page-logo">
				Version 4.3
			</div>
			<div class="page-action">
				<a href="https://twitter.com/webredox?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @webredox</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				<div class="fb-like" data-href="https://www.facebook.com/webRedox/" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
				<div id="fb-root"></div>
				<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=161350844023659&autoLogAppEvents=1"></script>
			</div>
			<div class="page-content-theside ">
			<div class="wr-col-1">
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="ZonarPersonalPortfolioWordPressTheme_el_deactivate_license"/>
            <div class="el-license-container">
                
                <ul class="el-license-info">
                <li>
                    <div>
                        <span class="el-license-info-title"><?php esc_html_e("Status",'zonar');?></span>

                        <?php if ( $this->response_obj->is_valid ) : ?>
                            <span class="el-license-valid"><?php esc_html_e("Valid",'zonar');?></span>
                        <?php else : ?>
                            <span class="el-license-valid"><?php esc_html_e("Invalid",'zonar');?></span>
                        <?php endif; ?>
                    </div>
                </li>

                <li>
                    <div>
                        <span class="el-license-info-title"><?php esc_html_e("License Type",'zonar');?></span>
                        <?php echo esc_html($this->response_obj->license_title,'zonar'); ?>
                    </div>
                </li>

               <li>
                   <div>
                       <span class="el-license-info-title"><?php esc_html_e("License Expired on",'zonar');?></span>
                       <?php echo esc_html($this->response_obj->expire_date,'zonar');
                       if(!empty($this->response_obj->expire_renew_link)){
                           ?>
                           <a target="_blank" class="el-blue-btn" href="<?php echo esc_url($this->response_obj->expire_renew_link); ?>">Renew</a>
                           <?php
                       }
                       ?>
                   </div>
               </li>

               
                <li>
                    <div>
                        <span class="el-license-info-title"><?php esc_html_e("Your License Key",'zonar');?></span>
                        <span class="el-license-key"><?php echo esc_attr( substr($this->response_obj->license_key,0,9)."XXXXXXXX-XXXXXXXX".substr($this->response_obj->license_key,-9) ); ?></span>
                    </div>
                </li>
                </ul>
                <div class="el-license-active-btn">
                    <?php wp_nonce_field( 'el-license' ); ?>
                    <?php submit_button('Deactivate'); ?>
                </div>
				<div class="infobox">
						<div class="bluetitle">1 Purchase Code Per Website</div>
						<div class="simpletext">If you want to use Zonar Theme on another domain, please <a href="<?php echo $this->responseObj->expire_renew_link; ?>" target="_blank">purchase another license</a></div>
				</div>
            </div>
        </form>
			</div>
			<div class="wr-col-1">
			<div class="wr-right">
				<h3 class="wr-h3">Update History</h3>
				
				<div class="theside-chnagelog">
					<ul>
						<li><em>Updated:</em> WooCommerce version has been updated.</li>
					</ul>				
				</div>
			</div>
			</div>
			</div>
		</div>
	</div>
		
		<?php
	}
	
	public function license_form() {
		?>
        <div class="clear"></div>
	<div class="wrap-theside">
		<div class="wrap theside-page-welcome about-wrap">
			<h1>Welcome to Zonar Creative Portfolio WordPress Theme</h1>
			<div class="about-text">
			  Zonar Theme Licensing.
			</div>
			<div class="wp-badge vc-page-logo">
				Version 4.3
			</div>
			<div class="page-action">
				<a href="https://twitter.com/webredox?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @webredox</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				<div class="fb-like" data-href="https://www.facebook.com/webRedox/" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
				<div id="fb-root"></div>
				<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=161350844023659&autoLogAppEvents=1"></script>
			</div>
			
			<div class="page-content-theside">
			<h3>Active License!</h3>
				<p><?php _e("Enter your item purchase code here, to activate the product, and get full feature updates and premium support.",$this->slug);?></p>
				<hr>
				<br>
				<br>
				<br>
				<div class="theside-chnagelog">
					<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="ZonarPersonalPortfolioWordPressTheme_el_activate_license"/>
            <div class="el-license-container">
                
				<?php
					if(!empty($this->show_message) && !empty($this->license_message)){
						?>
                        <div class="notice notice-error is-dismissible">
                            <p><?php echo esc_html($this->license_message,'zonar'); ?></p>
                        </div>
						<?php
					}
				?>
                
    		    <div class="el-license-field">
    			    <label for="el_license_key"><?php esc_html_e("Purchase code",'zonar');?></label>
    			    <input type="text" class="regular-text code" name="el_license_key" size="50" placeholder="xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxxx" required="required">
    		    </div>
                <div class="el-license-field">
                    <label for="el_license_key"><?php esc_html_e("Email Address",'zonar');?></label>
                    <?php
                        $purchaseEmail   = get_option( "ZonarPersonalPortfolioWordPressTheme_lic_email", get_bloginfo( 'admin_email' ));
                    ?>
                    <input type="text" class="regular-text code" name="el_license_email" size="50" value="<?php echo esc_html($purchaseEmail); ?>"  required="required">
                    <div><small><?php esc_html_e("We will send update news of this product by this email address, don't worry, we hate spam",'zonar');?></small></div>
                </div>
                <div class="el-license-active-btn">
					<?php wp_nonce_field( 'el-license' ); ?>
					<?php submit_button('Activate'); ?>
                </div>
            </div>
        </form>
				</div>
			</div>
		</div>
	</div>
		
		<?php
	}
}

new ZonarPersonalPortfolioWordPressTheme();