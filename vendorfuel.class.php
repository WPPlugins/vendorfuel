<?php

/**
 * Description of vendorfuel
 *
 * @author Jason
 */
class vendorfuel
{
	private $api_url = 'https://sapi1b.vendorfuel.com';
	private $store_token = null;
	private $plugin_path = '';
	private $settings;
	private $conversion;
	private $theme = 'vendorfuel';
	private $capability = 'edit_posts';
	private $version = '1.0.0';
	private $plugin_name = 'VendorFuel';
	private $description = 'Cloud-based e-commerce';
	private $slug = 'vendorfuel';
	private $wpdb;
	private $wp_rewrite;
	private $request_slug = '';
	private $modules = array();
	private $admin_pages = array();
	private $js = "";
	private $logged_in = FALSE;
	private $sub_status = false;
	private $apikey = null;
	private $templates;

	public function __construct()
	{
		global $wpdb;
		$this->wpdb = $wpdb;

		/*		 * ***** TESTING *********** */
		add_action('init', array($this, 'customRewriteRule'));
		/*		 * ******* END TEST ********* */

		$this->plugin_path = realpath(dirname(__FILE__));
		$this->settings = get_option('vendorfuel-settings');
		$this->conversion = get_option('vendorfuel-conversion');
		$this->terminology = get_option('vendorfuel-terminology');
		if (isset($this->settings['apiUrl'])) {
			$this->api_url = $this->settings['apiUrl'];
		}
		if (is_ssl()) {
			$this->api_url = str_replace("http://", "https://", $this->api_url);
		}
		$this->settings['apiUrl'] = $this->api_url;
		if (isset($this->settings['apiKey'])) {
			$this->apikey = $this->settings['apiKey'];
		}
		if (!is_null($this->apikey) && strlen($this->apikey) > 0) {
			require_once('templates.php');
			$this->templates = new templates($wpdb, $this->settings,$this->conversion);
		}

		add_action('wp_logout', array($this, 'vendorfuel_logout'));
		add_action('widgets_init', array($this, 'widgets_init'));

		if (!is_admin()) {
			// For now, only non-admin is using templates system.
			// Eventually, I'd like to merge this and templates.php into single class
			if (isset($this->settings['theme'])) {
				$this->theme = $this->settings['theme'];
			}
			add_action('admin_enqueue_scripts', array($this, 'adminScripts'));
			add_action('init', array($this, 'vendorfuelCss'));
			//add_action('wp_head', array($this, 'vendorfuelLoadPublic'));
			//add_action('wp_footer', array($this, 'vendorfuelLoadModules'));
			//add_filter('the_content', array($this, 'vendorfuelAddViewport'));
		} else {
			$this->wpdb->show_errors = true;
                        $pos = FALSE;
                        
                        if(array_key_exists('page', $_GET)) {
                            $pos = strpos($_GET['page'], "vendorfuel");
                        }
                        
			if ($pos !== FALSE) {
				add_action('admin_head', array($this, 'vendorfuelLoadAdmin'));
				//add_action('admin_print_footer_scripts', 'wp_preload_dialogs');
				add_action('admin_footer', array($this, 'load_vendorfuel_admin'));
			}

			add_action('init', array($this, 'checkLogin'));
			add_action('init', array($this, 'checkNewStore'));


			//NOTE: Commented out pages are non-functional/unneccesary in initial release, may be implemented in future release
			$this->registerAdminPage("", "Dashboard", FALSE, FALSE, "", "default");
			$this->registerAdminPage("Admin_Group", "Admin Groups", 'Admin', 'Admin');
			$this->registerAdminPage("Admin_Users", "Admin Users", 'Admin', 'Admin');
			$this->registerAdminPage("Admin", "Admin");
			$this->registerAdminPage("Accounts", "Accounts");
			$this->registerAdminPage("Catalog", "Catalog");
			$this->registerAdminPage("Banners", "Banners", "Catalog", "Catalog");
			$this->registerAdminPage("Categories", "Categories", "Catalog", "Catalog");
			$this->registerAdminPage("Cost_Sheets", "Cost Sheets", "Catalog", "Catalog");
			$this->registerAdminPage("Images", "Images", "Catalog", "Catalog");
			$this->registerAdminPage("Templates", "Templates");
                        $this->registerAdminPage("Email", "Email");
			$this->registerAdminPage("Email_Templates", "Email Templates", "Email", "Email");
			$this->registerAdminPage("Page_Templates", "Page Templates", "Templates", "Templates");
			$this->registerAdminPage("Template_Collections", "Template Collections", "Templates", "Templates");
                        $this->registerAdminPage("Map_Template_Keys", "Map Template Keys", "Templates", "Templates");
			$this->registerAdminPage("Styling", "Styling", "Templates", "Templates");
			//$this->registerAdminPage("terminology", "Terminology", "customization", "Customization");
			$this->registerAdminPage("Users", "Users", "Accounts", "Accounts");
			$this->registerAdminPage("Groups", "Groups", "Accounts", "Accounts");
			//$this->registerAdminPage("integration", "Integration");
			$this->registerAdminPage("Interfaces", "Interfaces", "Integration", "Integration");
			$this->registerAdminPage("Interface_Logs", "Interface Logs", "Integration", "Integration");
			$this->registerAdminPage("Manufacturers", "Manufacturers", "Catalog", "Catalog");
			$this->registerAdminPage("Orders", "Order Management");
			$this->registerAdminPage("Price_Sheets", "Price Sheets", "Catalog", "Catalog");
			$this->registerAdminPage("Products", "Products", "Catalog", "Catalog");
			$this->registerAdminPage("Product_Collections", "Product Collections", "Catalog", "Catalog");
			$this->registerAdminPage("Product_Reviews", "Product Reviews", "Catalog", "Catalog");
			$this->registerAdminPage("Promo_Codes", "Promo Codes", "Catalog", "Catalog");
			$this->registerAdminPage("UOM", "UOM", "Catalog", "Catalog");
			//$this->registerAdminPage("reports", "Reports");
			$this->registerAdminPage("Settings", "Settings");
			$this->registerAdminPage("Shipping", "Shipping");
			//$this->registerAdminPage("shippingcarriers", "Shipping Carriers", "shipping", "Shipping");
			//$this->registerAdminPage("shippingcountries", "Shipping Countries", "shipping", "Shipping");
			$this->registerAdminPage("Shipping_Methods", "Shipping Methods", "Shipping", "Shipping");
			$this->registerAdminPage("Shipping_Rules", "Shipping Rules", "Shipping", "Shipping");
                        $this->registerAdminPage("Parcels", "Parcels", "Shipping", "Shipping");
			//$this->registerAdminPage("shippingstates", "Shipping States", "shipping", "Shipping");
			//$this->registerAdminPage("shippingzones", "Shipping Zones", "shipping", "Shipping");
			$this->registerAdminPage("Tax_Rates", "Tax");
			//$this->registerAdminPage("vendors", "Vendors");
			add_action('admin_menu', array($this, 'adminMenu'));
			add_action('admin_init', array($this, 'registerSettings'));
			register_activation_hook($this->plugin_path . '/vendorfuel.php', array($this,
				'install'));
		}
	}
        
        public function adminScripts() {
            wp_enqueue_script(array('jquery', 'editor', 'thickbox', 'media-upload'));
        }
        
	public function flushRewriteRules()
	{
		global $wp_rewrite;
		$wp_rewrite->flush_rules(false);
	}

	public function customRewriteRule()
	{
		if (strlen($this->settings['productSlug']) > 0) {
			// PRODUCT VIEW
			$args = array(
				'meta_key' => '_vfuel-page',
				'meta_value' => 'product-view',
				'post_type' => 'page',
				'post_status' => 'any',
				'posts_per_page' => -1
			);
			$posts = get_posts($args);
			if (count($posts) > 0) {
				$post_id = $posts[0]->ID;
				add_rewrite_rule('^' . $this->settings['productSlug'] . '/([^/]*)/?', 'index.php?page_id=' . $post_id, 'top');
			}
			unset($posts);
		}
		if (strlen($this->settings['catSlug']) > 0) {
			// CATEGORY SEARCH
			$args = array(
				'meta_key' => '_vfuel-page',
				'meta_value' => 'search',
				'post_type' => 'page',
				'post_status' => 'any',
				'posts_per_page' => -1
			);
			$posts = get_posts($args);
			if (count($posts) > 0) {
				$post_id = $posts[0]->ID;
				add_rewrite_rule('^' . $this->settings['catSlug'] . '/([^/]*)/?', 'index.php?page_id=' . $post_id, 'top');
			}
			unset($posts);
		}
		add_filter('admin_init', array($this, 'flushRewriteRules'));
	}

	public function vendorfuelAddViewport($c)
	{
		return '<div id="vendorfuel_viewport">' . $c . '</div>';
	}

	public function vendorfuelLoadShortcode($atts)
	{
		$module = $atts['module'];
		$method = $atts['method'];
		$params = "";
		if (count($atts['params'])) {
			$params = implode(",", $atts['params']);
		}
		print "<script>jQuery." . $module . "." . $method . "(" . $params . ");</script>";
	}

	public function vendorfuelBanner($atts)
	{
		$area = $atts['area'];
		$div = str_replace(" ", "_", $area);
		?>
		<div id="vendorfuel_banner_<?php print $div; ?>">
			<script>
				jQuery(document).ready(function(){
				vfuel.ready(function(){
                                    vfuel.execute('catalog', 'showBanner', {"area":"<?php print $area; ?>", "bannerDiv":"#vendorfuel_banner_<?php print $div; ?>"}, null);
				});
				});
			</script>
		</div>
		<?php
	}

	public function vendorfuelLoadCore()
	{
                print '<script>vfuel_apikey = \'' .  $this->apikey  . '\';</script>';
		$this->load_jqueryui();	
	}

	public function vendorfuelLoadPublic()
	{
		global $post;
		$this->vendorfuelLoadCore();
		$vendorfuel_modules = get_post_meta($post->ID, 'vendorfuel_modules', true);
		if (strlen($vendorfuel_modules) > 0) {
			$modules = explode("
	", $vendorfuel_modules);
			?>
			<script>
			<?php
			foreach ($modules as $m) {
				$p = explode(",", $m);
				print "vfuel.loadModule('" . $p[0] . "','" . $p[1] . "','" . $p[2] . "');";
			}
			?>
			</script>
			<?php
		}
		?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<?php
		add_shortcode('vendorfuel', array($this, 'vendorfuelLoadShortcode'));
		add_shortcode('vendorfuel-banner', array($this, 'vendorfuelBanner'));
	}

	public function vendorfuelLoadAdmin()
	{
		$this->vendorfuelLoadCore();
		$this->load_admin_css();
		//$this->load_tiny_mce();
	}

	public function vendorfuelLoadModules()
	{
		global $post;
		print '<div id="loading-indicator"></div><div id="vendorfuel_lightbox"></div>
	    <script  type="text/javascript" src="' . $this->api_url . '/static/share/lib/vendorfuel/current/vendorfuel.min.js"></script>
		<script src="' . $this->api_url . '/static/share/lib/jquery/plugins/jquery.cookie.min.js"></script>';
		$vfuel_page_meta = get_post_meta($post->ID, '_vfuel-page');
		if (is_array($vfuel_page_meta)) {
			$vfuel_page = reset($vfuel_page_meta);
			$page_actions = "";
			if (strlen($vfuel_page) > 0) {
				if (isset($this->pages[$vfuel_page])) {
					$tokens = explode('/', $_SERVER['REQUEST_URI']);
					$this->request_slug = $tokens[sizeof($tokens) - 2];
					if ($vfuel_page == "product-view") {
						$product_id = '';
						if (isset($_GET['id'])) {
							$product_id = $_GET['id'];
						}
						//$page_actions = "vfuel.execute('catalog','productView',{'id':vfuel.getURLParameter('id'),'slug':'".$this->request_slug."'});";
						$page_actions = "vfuel.execute('catalog','productView',{'id':'" . $product_id . "','slug':'" . $this->request_slug . "'});";
					} elseif ($vfuel_page == "search") {
						$page_actions = "if(jQuery.cookie('vfuel-punchoutOnlyOpt')!=1){
    vfuel.execute('catalog','newSearch',{'q':vfuel.getURLParameter('q'),'slug':'" . $this->request_slug . "'});
}else{
    window.location.href= vfuel.getOpt('page-welcome');
}";
					} else {
						$js_file = dirname(__FILE__) . '/actions/' . $vfuel_page . ".js";
						if (file_exists($js_file)) {
							$page_actions = file_get_contents($js_file);
						}
					}
				}
			}
		}

		$global_actions_ie = "vfuel.execute('account','init');";
		$global_actions_ie .= "
	vfuel.execute('catalog','searchForm');";

		$global_actions = "vfuel.account.init();";
		$global_actions .= "
	vfuel.catalog.searchForm();";

		$params = json_encode(array_merge($_GET, $_POST));
		if (strlen($page_actions . $global_actions) > 0) {
			$modules = get_option('vendorfuel-modules');
			?>
			<script>
				jQuery(document).ready(function(){
				console.log("jQuery v" + jQuery.fn.jquery);
			<?php
			unset($settings['apiKey']);
			foreach ($this->settings as $k => $v) {
				?>vfuel.setOpt('<?php print $k; ?>', '<?php print $v; ?>');
				<?php
			} ?>
			vfuel.setOpt('page-home', '<?php print get_site_url(); ?>');
				vfuel.setOpt('params',<?php print $params; ?>);
			<?php
			$version = '?v=0.3.1';
			$modules = array(
				array(
					'module' => 'catalog',
					'url' => $this->api_url . '/static/share/lib/vendorfuel/modules/dist/catalog.min.js' . $version,
					'parameters' => '{}',
					'autoload' => 1
				),
				array(
					'module' => 'account',
					'url' => $this->api_url . '/static/share/lib/vendorfuel/modules/dist/account.min.js' . $version,
					'parameters' => '{}',
					'autoload' => 1
				),
				array(
					'module' => 'cart',
					'url' => $this->api_url . '/static/share/lib/vendorfuel/modules/dist/car.min.js' . $version,
					'parameters' => '{}'
				),
				array(
					'module' => 'group',
					'url' => $this->api_url . '/static/share/lib/vendorfuel/modules/dist/group.min.js' . $version,
					'parameters' => '{}'
				)
			);
			$autoload = 0;
			$loading_scripts = "";
			if (is_array($modules) && count($modules) > 0) {
				foreach ($modules as $k => $module) {
					print "vfuel.registerModule('" . trim($module['module']) . "','" . trim($module['url']) . "','" . trim($module['parameters']) . "');
";
					if ($module['autoload'] == 1) {
						$autoload++;
						$loading_scripts .= "vfuel.loadModule('" . trim($module['module']) . "','" . trim($module['url']) . "','" . trim($module['parameters']) . "');
";
					}
				}
			}
			?>
			<?php
			print "vfuel.init(" . $autoload . ");
" . $loading_scripts . "
if (document.all) {
setTimeout(function(){
" . $global_actions_ie . "
" . $page_actions . "
},1000);
}
else{
vfuel.ready(function(){
" . $global_actions . "
" . $page_actions . "
});
}
";
			?>
				});</script>
			<?php
		}
	}

	public function vendorfuelCss()
	{

		wp_register_style('vendorfuelCss', plugins_url('local/css/bootstrap.min.css', __FILE__));
		//wp_register_style('vendorfuelThemeCss', plugins_url('skins/vfuel_theme.css',__FILE__ ), array('pe_theme_skin_blue','pe_theme_init','pe_theme_bootstrap'));
		wp_enqueue_style('vendorfuelCss');
		//wp_enqueue_style('vendorfuelThemeCss');
		wp_enqueue_style('thickbox');

		/** BROWSCAP NOT SUITABLE FOR WIDE DEPLOYMENT
		  $browser = get_browser();
		  if($browser->browser == 'IE' && $browser->majorver == 7) {
		  wp_register_style('vendorfuelIE7Css', plugins_url('ie7.css',__FILE__ ));
		  wp_enqueue_style('vendorfuelIE7Css');
		  }
		  END * */
		/* if($browser->browser == 'IE' && $browser->majorver == 8) {
		  wp_register_style('vendorfuelIE8Css', plugins_url('ie8.css',__FILE__ ));
		  wp_enqueue_style('vendorfuelIE8Css');
		  } */
	}

	public function vendorfuel_login()
	{
		$user_id = get_current_user_id();
		if ($user_id > 0) {
			$tokena = get_user_meta($user_id, "vendorfuel-admin-token", true);
			$admin_url = parse_url(get_admin_url());
			$path = $admin_url['path'];
			$path = "/";
			$host = $admin_url['host'];
			setcookie(
				"vendorfuel-admin-tokena", $tokena, 0, // EXPIRES (0=when browser closes)
				$path, $host, false, // SECURE
				false // INACCESSIBLE TO JS
			);
		} else {
			//vendorfuel_logout();
		}
	}

	public function vendorfuel_logout()
	{
		$admin_url = parse_url(get_admin_url());
		//$path = $admin_url['path'];
		$path = "/";
		$host = $admin_url['host'];
		setcookie(
			"vendorfuel-admin-tokena", "", time() - 3600, // EXPIRES (0=when browser closes)
			$path, $host, false, // SECURE
			false // INACCESSIBLE TO JS
		);
	}
        
	public function load_jqueryui()
	{
		print /* '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> */
			'<link href="' . $this->api_url . '/static/share/lib/jqueryui/themes/' . $this->theme . '/jquery-ui-1.10.3.custom.min.css" rel="stylesheet">
		<link href="' . $this->api_url . '/static/share/lib/jqueryui/themes/' . $this->theme . '/jquery-ui.structure.css" rel="stylesheet">
		<link href="' . $this->api_url . '/static/share/lib/jqueryui/themes/ui.multiselect.css" rel="stylesheet">
		<link href="' . $this->api_url . '/static/share/lib/jquery/plugins/jquery.Jcrop.min.css" rel="stylesheet">
		<link href="' . $this->api_url . '/static/share/lib/raty/jquery.raty.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet" type="text/css">



		<script src="' . $this->api_url . '/static/share/lib/jquery/plugins/jquery.Jcrop.min.js"></script>
		<script src="' . $this->api_url . '/js/ace/ace.js"></script>
		<script src="' . $this->api_url . '/static/share/lib/jquery/plugins/jQueryRotate.min.js"></script>
		<script src="' . $this->api_url . '/static/share/lib/jqueryui/current/jquery-ui.min.js"></script>
		<script src="' . $this->api_url . '/static/share/lib/jqueryui/current/ui.multiselect.min.js"></script>
		<script src="' . $this->api_url . '/static/share/lib/raty/jquery.raty.js"></script>

		<!--[if lte IE 8]><script src="' . $this->api_url . '/static/share/lib/jquery/plugins/IE8.js"></script><![endif]-->';
	}

	public function load_admin_css()
	{
		?>
		<link href="<?php echo plugin_dir_url(__FILE__); ?>admin.css" rel="stylesheet">

		<?php
	}

	public function load_vendorfuel_admin()
	{
		?>
		<div id="loading-indicator"></div><div id="vendorfuel_lightbox"></div>
		<?php

		print '<script  type="text/javascript" src="' . $this->api_url . '/static/share/lib/vendorfuel/current/vendorfuel.min.js"></script>
		<script src="' . $this->api_url . '/static/share/lib/jquery/plugins/jquery.cookie.min.js"></script><script src="' . $this->api_url . '/static/share/lib/jquery/plugins/jQuery.XDomainRequest.js"></script>';
		?>
		<script>
				jQuery(document).ready(function(){
		<?php
		foreach ($this->settings as $k => $v) {
			?>vfuel.setOpt('<?php print $k; ?>', '<?php print $v; ?>');
			<?php
		}
		?>
				vfuel.init(1);
				vfuel.setOpt('adminUrl', '<?php print get_admin_url(); ?>');
                                
		vfuel.setOpt('page-home', '<?php print get_site_url(); ?>');

			vfuel.registerModule('admin', '<?php print $this->api_url; ?>/static/share/lib/vendorfuel/modules/dist/admin.min.js?v=9', '{}');
			vfuel.loadModule('admin', '<?php print $this->api_url; ?>/static/share/lib/vendorfuel/modules/dist/admin.min.js?v=9', '{}');
			//vfuel.loaded();
			});</script>
		<?php
	}

	public function widgets_init()
	{
		// RELATED PRODUCTS WIDGET
		require $this->plugin_path . '/widgets/related_products.php';
		register_widget('vFuel_Related_Products');

		// SEARCH WIDGET
		require $this->plugin_path . '/widgets/search.php';
		register_widget('vFuel_Search');

		// SEARCH WIDGET
		require $this->plugin_path . '/widgets/account_menu.php';
		register_widget('vFuel_Account_Menu');

		// TEMPLATE WIDGET
		require_once $this->plugin_path . '/widgets/template.php';
		register_widget('vFuel_Template');
	}

	public function apiRequest($request)
	{
		$s = get_option('vendorfuel-settings');
		$api_url = $s['apiUrl'];
		$req_url = $api_url . $request;
		$req_url .= (!strpos($req_url, '?') ? '?' : '&') . 'apikey=' . $this->apikey;

		if ($s['debug']) {
			$arrContextOptions = array(
				"ssl" => array(
					"verify_peer" => false,
					"verify_peer_name" => false,
				),
			);

			$response = file_get_contents($req_url, false, stream_context_create($arrContextOptions));
		} else {
			$response = file_get_contents($req_url);
		}
		return $response;
	}

	public function get($p)
	{
		if (isset($_GET[$p])) {
			return $_GET[$p];
		}
		if (isset($_POST[$p])) {
			return $_POST[$p];
		}
		return '';
	}

	public function getCookie($p)
	{
		if (isset($_COOKIE[$p])) {
			return $_COOKIE[$p];
		}
		return '';
	}

	private function adminHost()
	{
		$admin_url = parse_url(get_admin_url());
		return $admin_url['host'];
	}

	private function adminPath()
	{
		$admin_url = parse_url(get_admin_url());
		return $admin_url['path'];
	}

	public function checkLogin()
	{
         
		if (isset($_GET['vendorfuel_admin_logout'])) {
			$request = "/admin/logout?apikey=" . $this->apikey . "&tokena=" . $this->getCookie('vendorfuel-admin-tokena') . "&tokenb=" . $this->getCookie('vendorfuel-admin-tokenb') . "&remove_all=" . $this->get('remove_all');
			$response = $this->apiRequest($request);

			$r = json_decode($response, true);
			$js = "
			console.log(" . $response . ");";
			$user_id = get_current_user_id();
			update_user_meta($user_id, 'vendorfuel-admin-token', "");
			$path = "/";
			$host = $this->adminHost();
			setcookie(
				"vendorfuel-admin-tokena", "", time() - 60 * 60 * 24 * 30, // EXPIRES (0=when browser closes)
				$path, $host, false, // SECURE
				false // INACCESSIBLE TO JS
			);
			setcookie(
				"vendorfuel-admin-tokenb", "", time() - 60 * 60 * 24 * 30, // EXPIRES (0=when browser closes)
				$path, $host, false, // SECURE
				false // INACCESSIBLE TO JS
			);
			setcookie(
				"vendorfuel-admin-tokenb", "", time() - 60 * 60 * 24 * 30, // EXPIRES (0=when browser closes)
				$this->adminPath(), $host, false, // SECURE
				false // INACCESSIBLE TO JS
			);
			setcookie(
				"vfuel-admin-tokenb", "", time() - 60 * 60 * 24 * 30, // EXPIRES (0=when browser closes)
				$this->adminPath(), $host, false, // SECURE
				false // INACCESSIBLE TO JS
			);
			setcookie(
				"vendorfuel-admin-name", "", time() - 60 * 60 * 24 * 30, // EXPIRES (0=when browser closes)
				$path, $host, false, // SECURE
				false // INACCESSIBLE TO JS
			);
			setcookie(
				"vendorfuel-store-sub-status", "", // set the value
				0, // Expires when browser closes
				$path, $host, false, // SECURE
				false // INACCESSIBLE TO JS
			);

			header("Location: " . get_admin_url());
			die();
		}
		if (isset($_POST['vendorfuel_admin_login'])) {
            
			$response = $this->apiRequest('admin/login?email=' . $_POST['email'] . '&password=' . $_POST['password']);
			$r = json_decode($response, true);
			$js = "\nconsole.log(" . $response . ");";
			$user_id = get_current_user_id();

			if (isset($r['tokena']) && isset($r['tokenb']) && $user_id > 0) {
				$path = "/";
				$host = $this->adminHost();
				update_user_meta($user_id, 'vendorfuel-admin-token', $r['tokena']);
				setcookie(
					"vendorfuel-admin-tokena", $r['tokena'], 0, // EXPIRES (0=when browser closes)
					$path, $host, false, // SECURE
					false // INACCESSIBLE TO JS
				);
				if (isset($_POST['save']) && $_POST['save'] == 1) {
					$expire = time() + 60 * 60 * 24 * 30;
				} else {
					$expire = 0;
				}
				setcookie(
					"vendorfuel-admin-tokenb", $r['tokenb'], $expire, // EXPIRES (0=when browser closes)
					$path, $host, false, // SECURE
					false // INACCESSIBLE TO JS
				);
				setcookie(
					"vendorfuel-admin-name", $r['name'], $expire, // EXPIRES (0=when browser closes)
					$path, $host, false, // SECURE
					false // INACCESSIBLE TO JS
				);
				$this->logged_in = TRUE;

				// Set the subscription status cookie
				if (isset($r['store']) && isset($r['store']['status'])) {
					setcookie(
						"vendorfuel-store-sub-status", $r['store']['status'], // set the value
						time() + 60 * 60, // expires in an hour
						$path, $host, false, // SECURE
						false // INACCESSIBLE TO JS
					);
				}
			}

			if (isset($r['errors'])) {
				if (count($r['errors']) > 0) {
					foreach ($r['errors'] as $error) {
						$js .= "\nvfuel.showError('" . $error . "');";
					}
				}
			}

			$this->js = $js;
		}
	}

	public function checkNewStore()
	{
		if (isset($_POST['vendorfuel-created-new-store'])) {
			if (isset($_POST['apikey'])) {
				$this->settings['apiKey'] = $this->apikey = $_POST['apikey'];

				update_option("vendorfuel-settings", $this->settings);
			}

			if (!isset($_POST['email']) || !isset($_POST['password'])) {
				return;
			}

			$response = $this->apiRequest('admin/login?email=' . $_POST['email'] . '&password=' . $_POST['password']);
			$r = json_decode($response, true);
			if (is_null($r)) {
				error_log($response);
			}
			$js = "\nconsole.log(" . $response . ");";
			$user_id = get_current_user_id();

			if (isset($r['tokena']) && isset($r['tokenb']) && $user_id > 0) {
				$path = "/";
				$host = $this->adminHost();
				update_user_meta($user_id, 'vendorfuel-admin-token', $r['tokena']);
				setcookie(
					"vendorfuel-admin-tokena", $r['tokena'], 0, // EXPIRES (0=when browser closes)
					$path, $host, false, // SECURE
					false // INACCESSIBLE TO JS
				);
				if (isset($_POST['save']) && $_POST['save'] == 1) {
					$expire = time() + 60 * 60 * 24 * 30;
				} else {
					$expire = 0;
				}
				setcookie(
					"vendorfuel-admin-tokenb", $r['tokenb'], $expire, // EXPIRES (0=when browser closes)
					$path, $host, false, // SECURE
					false // INACCESSIBLE TO JS
				);
				setcookie(
					"vendorfuel-admin-name", $r['name'], $expire, // EXPIRES (0=when browser closes)
					$path, $host, false, // SECURE
					false // INACCESSIBLE TO JS
				);
				$this->logged_in = TRUE;

				// Set the subscription status cookie
				if (isset($r['store']) && isset($r['store']['status'])) {
					setcookie(
						"vendorfuel-store-sub-status", $r['store']['status'], // set the value
						time() + 60 * 60, // expires in an hour
						$path, $host, false, // SECURE
						false // INACCESSIBLE TO JS
					);
				}
			}

			if (isset($r['errors'])) {
				if (count($r['errors']) > 0) {
					foreach ($r['errors'] as $error) {
						$js .= "\nvfuel.showError('" . $error . "');";
					}
				}
			}

			$this->js = $js;
		}

		$this->sub_status = $this->getCookie('vendorfuel-store-sub-status');
		if (strlen($this->sub_status) == 0 && isset($_COOKIE['vendorfuel-admin-tokena']) &&
			isset($_COOKIE['vendorfuel-admin-tokenb'])) {
			$response = $this->apiRequest('stores/check-subscription?tokena=' . $this->getCookie('vendorfuel-admin-tokena') . '&tokenb=' . $this->getCookie('vendorfuel-admin-tokenb'));
			$r = json_decode($response, true);
			if (is_null($r)) {
				error_log($response);
			} else {
				$this->sub_status = $r['status'];
				setcookie(
					"vendorfuel-store-sub-status", $this->sub_status, // set the value
					time() + 60 * 60, // expires in an hour
					"/", $this->adminHost(), false, // SECURE
					false // INACCESSIBLE TO JS
				);
			}
		}
	}

	public function registerAdminPage($slug, $label, $parentSlug = "", $parentTitle = "", $title = "", $source = "")
	{
		$page = $slug;
		if ($title == "") {
			$title = $label;
		}
		if ($source == "") {
			$source = $slug;
		}
		if ($slug == "") {
			$slug = $this->slug;
		} else {
			$slug = $this->slug . "-" . $slug;
		}

		if ($parentSlug) {
			$this->admin_pages[$slug] = array(
				'slug' => $slug,
				'parent_slug' => $parentSlug,
				'parent_title' => $parentTitle,
				'label' => $label,
				'title' => $title,
				'source' => $source
			);
		} else {
			$parentSlug = "false";
			$this->admin_pages[$slug] = array(
				'slug' => $slug,
				'parent_slug' => $parentSlug,
				'label' => $label,
				'title' => $title,
				'source' => $source
			);
		}
	}

	public function adminMenu()
	{
		add_menu_page("VendorFuel", "VendorFuel", 'read', $this->slug, '', plugin_dir_url(__FILE__) . 'vendorfuel_fav.png');
		if (is_array($this->admin_pages)) {
			foreach ($this->admin_pages as $page) {
				if ($page['parent_slug'] != "false") {
					add_submenu_page($page['parent_slug'], $page['label'], $page['title'], $this->capability, $page['slug'], array(
						$this, "loadAdminPage"));
				} else {
					add_submenu_page($this->slug, $page['label'], $page['title'], $this->capability, $page['slug'], array(
						$this, "loadAdminPage"));
				}
			}
		}
	}

	public function loadAdminPage()
	{
		$requested_page = $_GET['page'];

		if (isset($this->admin_pages[$requested_page])) {
			$page = $this->admin_pages[$requested_page];
			$source = $page['source'];
			$title = $page['title'];
			$parent = $page['parent_slug'];
                        if(array_key_exists('parent_title', $page)){
                            $parentTitle = $page['parent_title'];
                        }
			$path = $page['source'];

			if ($path != "Settings") {
				if (is_null($this->apikey) || strlen($this->apikey) == 0) {
					$source = 'newStore';
					$title = 'Set Up a New Store';
				} else if (!isset($_COOKIE['vendorfuel-admin-tokena']) || !isset($_COOKIE['vendorfuel-admin-tokenb'])) {
					$source = "adminlogin";
					$title = "Login";
				} else if ($this->sub_status == 'inactive' || strlen($this->sub_status) == 0) {
					// show update payment method page
					$source = 'updatePaymentInfo';
					$title = 'Subscription Expired';
				}
			} else {
				if (!current_user_can("manage_options")) {
					$source = "error";
					$title = "Error";
				}
			}
			//if(file_exists("admin-pages/".$source.".php")){

			$path = $this->slug . '-' . strtolower($title);
			?>
			<div class="wrap">

				<div style="float: right; display:none;" id="vendorfuel_notification_box"><div class="ui-widget">
						<div class="ui-state-highlight ui-corner-all" style="padding: 0 .7em;">
							<p style="white-space:nowrap;"><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
								<span style="font-weight: bold;" id="vendorfuel_notification">There are no notifications</span></p>
						</div>
					</div></div>

				<h2 style="line-height:45px;"><img style="margin-bottom:-7px;" src="<?php echo plugin_dir_url(__FILE__) . 'vendorfuel_header.png' ?>"/> | <?php print $title; ?>
					<?php
					if (isset($_COOKIE['vendorfuel-admin-name'])) {
						?>
						<span style="font-size:14px;">Logged in as <?php print $_COOKIE['vendorfuel-admin-name']; ?></span>
					<?php } ?>
					<span style="font-size:10px;"><input type="button" id="vendorfuel_logout" value="Logout" /></span></h2>
				<div style="clear: both"></div>
				<div style="margin-bottom:10px;"><?php
					if ($parent != "false") {
						print '<a href="admin.php?page=vendorfuel-' . $parent . '">' . $parentTitle . '</a>';
						?> > <?php
						print $title;
					}
					?><div style="margin-left:10px; height:20px;" id="vendorfuel_help"> Help </div></div>
				<div id="vendorfuel_viewport">
					<div id="loading-dialog" title="Loading">
						<img src="<?php echo plugin_dir_url(__FILE__) . 'loading.gif' ?>" id="loader">
					</div>

					<script>
						//Briefly Displays a loading dialog while waiting for admin module to load
						jQuery("#loading-dialog").dialog({

						closeOnEscape : false,
							beforeclose : function(event, ui) {
							return false;
							},
							dialogClass : "noclose",
						});
						jQuery("#vendorfuel_logout").button();
						jQuery('#vendorfuel_help').button({
						icons : {
						primary : "ui-icon-help"
						},
							text : ''
						})

							jQuery("#vendorfuel_logout").click(function() {
						vfuel.admin.logout('<?php print get_admin_url(); ?>
						');
						});
						jQuery("#vendorfuel_help").click(function(){
						vfuel.admin.getHelp(window.location.href);
						});
						jQuery("#loading-dialog").dialog('open');
						jQuery("body").append('<div id="workingOverlay" class="ui-widget-overlay" style="z-index:3"></div>')
							jQuery("#workingOverlay").show();
						// Wait for window load

						jQuery(window).load(function() {
						// Animate loader off screen
						jQuery("#loader").animate({
						top : - 200
						}, 1500);
						jQuery("#loader").hide();
						jQuery('#overlay').css('visibility', 'hidden');
						jQuery("#loading-dialog").dialog('close');
						jQuery("#workingOverlay").remove();
						});
					</script>
					<?php
					require 'admin-pages/' . $source . '.php';
					$this->adminFooter();
					//}
				}
			}

			public function registerSettings()
			{
				register_setting('vendorfuel-modules', 'vendorfuel-modules', array($this, "modulesValidate"));
				register_setting('vendorfuel-settings', 'vendorfuel-settings', array($this, "settingsValidate"));
				register_setting('vendorfuel-actions', 'vendorfuel-actions', array($this, "decode"));
			}

			public function settingsValidate($input)
			{
				if (!is_array($input)) {
					return null;
				}
				return $input;
			}

			public function formsafe($input)
			{
				$output = htmlentities($input);
				return $output;
			}

			public function decode($input)
			{
				$output = html_entity_decode($input);
				return $output;
			}

			private function adminFooter()
			{
				?>  </div>

			<div style="height: 20px; clear: both;"></div>
			<div style="float: right;"><a id="vendorfuel_notification_toggle">Show notifications</a>
				<!--<br><input type="text" id="custom_notification" value="custom notification">
				<input type="button" id="custom_notification_button" value="show custom notification">-->
			</div>
			<p>VendorFuel v<?php print $this->version; ?> - <?php print $this->description; ?></p>
			<div style="clear: both;"></div>
		</div>
		<script>
			jQuery(document).ready(function() {
			jQuery("#vendorfuel_notification_toggle").click(function() {
			jQuery("#vendorfuel_notification_box").toggle("drop", {
			direction : "right"
			});
			});
			jQuery('#vendorfuel_notification_toggle').button({
			icons : {
			primary : "ui-icon-info"
			},
				text : 'Show Notifications'
			})
				/*
				 jQuery("#custom_notification_button").click(function() {
				 var notification = document.getElementById("custom_notification").value;
				 vfuel.admin.showNotification(notification);
				 });
				 */
		<?php print $this->js; ?>});</script>
		<?php
	}

	public function install()
	{
		require_once $this->plugin_path . '/install.php';
		$vfuel_install = new vendorfuelInstall();
		$vfuel_install->run();
	}
}
?>