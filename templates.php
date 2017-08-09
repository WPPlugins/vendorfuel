<?php

/**
 * Description of templates
 */
class templates
{
	private $wpdb;
	private $settings;
	private $conversion;
	private $version = "0.2.3";
	private $store_path = null;
	private $table_name = null;
	private $cache_data = array();

	public function __construct($wpdb, $settings, $conversion)
	{
		$this->wpdb = $wpdb;
		$this->settings = $settings;
		$this->conversion=$conversion;
		$this->table_name = $wpdb->prefix . "vf_templates";
		$this->store_path = realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'store' . DIRECTORY_SEPARATOR;

		if (!is_dir($this->store_path . 'templates')) {
			mkdir($this->store_path . 'templates');
		}

		if (!is_dir($this->store_path . 'js')) {
			mkdir($this->store_path . 'js');
		}

		// check versions
		if ($this->version != get_option('vf-template-table-version')) {
			$this->updateTable();
		}

		// include http class for api_requests
		if (!class_exists('WP_Http')) {
			include_once (ABSPATH . WPINC . DIRECTORY_SEPARATOR . 'class-http.php');
		}

		// set up short code for html render
		add_shortcode('vf-template', array($this, 'renderShortCode'));

		// add scripting to footer
		if (is_admin()) {
			add_action('admin_footer', array($this, 'initScripts'));
		} else {
			add_action('wp_footer', array($this, 'initScripts'));
		}

		// add default nav menu shortcode to header
		if($this->settings['useDefaultNav']){	
			add_action('wp_head', array($this, 'headerShortcode'));
		}
		
		// setup the ajax handling for adding to cache
		add_action('admin_post_nopriv_template_cache_add', array($this, 'addToCache'));
		add_action('admin_post_template_cache_add', array($this, 'addToCache'));

		// setup the ajax handling for clearing cache
		add_action('admin_post_template_cache_clear', array($this, 'clearCache'));
	}

	public function renderShortCode(array $atts)
	{
		// Get the template name or show error content.
		if (empty($atts['name'])) {
			return $this->shortCodeError();
		}
		$name = $atts['name'];

//		$params_for_template = array();
//		if (isset($atts['params'])) {
//			$params_for_template = explode(',', $atts['params']);
//		}
//
//		// get any valid params requested
//		$params = array_intersect_key($_GET, array_flip($params_for_template));
//		$param_string = json_encode($params);
//
//		// show error content if required attributes are missing (no caching needed)
//		if (isset($atts['required'])) {
//			foreach (explode(',', $atts['required']) as $req) {
//				if (!in_array($req, array_keys($params))) {
//					return $this->shortCodeError();
//				}
//			}
//		}
		// TODO: a good way for us to let wordpress know where to look for setting up template data cache... or let script tell it...
		// Ok, if wordpress has data cached (db) for a loaded template, it will set it up in js as cached data object
		// when js does the api call for data and successfully gets back the data, it will check if there is a matching cache entry
		// - if so, just continues on
		// - if not, it calls a plugin endpoint and gives endpoint to retrieve data
		// check if file exists
		// if not, call api to get file and create it
		// then check, cache entry for data, if exists pass down to js, if not, js will call us with data
		//
		// Ok. Idea here. WP passes down all cached data (loaded from a WP vendorfuel cache table in database). Scripts determine the structure of the cached data... [ Make sure only caching data this user can access ]
		// WP gets a resource-map from the api and caches it in a js file. js and WP will use it.
		// js tells WP -> for this template name and these params, here's my resource, and params to pass to it

		$htmlFilePath = $this->store_path . 'templates' . DIRECTORY_SEPARATOR .
			$this->snakeCase($name) . '.html';

		if (!file_exists($htmlFilePath)) {
			// Retrieve template content (html, source) and then template data from source (cache, timestamp) using api
			// NOTE: Api endpoint might need to be changed to something more suitable...
			$requestParams = array(
				'name' => $name,
			);

			$response = $this->apiRequest('templates/by-name', 'GET', $requestParams);
			if (!$response) {
				return '';
			}

			// cache template content as html file
			file_put_contents($htmlFilePath, $response->template->content);
		}

		$this->getFromCache($name);

		// render and return (after rendering any nested templates)
		return do_shortcode(file_get_contents($htmlFilePath));
	}

	public function headerShortcode()
	{
		echo do_shortcode('[vf-template name="menu nav"]');
	}

	public function initScripts()
	{
		// get angular
		$ang_cdn_url = '//ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.min.js';
		wp_enqueue_script('angular', $ang_cdn_url);

		// Add angular bootstrap
		wp_enqueue_script('angular-bootstrap', $this->settings['apiUrl'] . 'js/ui-bootstrap-tpls-1.3.1.min.js', array(
			'angular'));

		// add ng-resource
		wp_enqueue_script('angular-resource', '//ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-resource.js', array(
			'angular'));

		// add localstorage
		wp_enqueue_script('angular-local-storage', $this->settings['apiUrl'] . 'js/angular-local-storage.min.js', array(
			'angular'));

		// add google adwords conversion tracker if applicable
		if ($this->conversion['adwordsID']!=null) {
			$adwords_conversion_url='//www.googleadservices.com/pagead/conversion_async.js';
			wp_enqueue_script('adwords-conversion', $adwords_conversion_url);
		}

		// common angular app functionality for vendorfuel
		// TODO: set this up to be minified for production
		// - Also set up for versioning
		$vf_app_url = $this->settings['apiUrl'] . 'js/vf-app.js';
		wp_enqueue_script('vf-app', $vf_app_url, array('angular'), $this->version);

		// Load service files
		// TODO: These should really be concatenated into a single app file using a build tool like grunt
		// - Using a build tool would allow all of these to be minified and concatenated on the server on-the-fly.
		// - Changing a file on the server would automatically re-concatenate and re-minify the file so only a single minified and concatenated file would need to be loaded here.
		wp_enqueue_script('vf-services', $this->settings['apiUrl'] . 'js/services/dist/services.min.js', array(
			'vf-app'));
//		wp_enqueue_script('vf-service-user', $this->settings['apiUrl'] . 'js/services/user.js', array(
//			'vf-app'));
//		wp_enqueue_script('vf-service-group', $this->settings['apiUrl'] . 'js/services/group.js', array(
//			'vf-app'));
//		wp_enqueue_script('vf-service-punchout', $this->settings['apiUrl'] . 'js/services/punchout.js', array(
//			'vf-app'));
		wp_enqueue_script('vf-factory-products', $this->settings['apiUrl'] . 'js/factories/dist/factories.min.js', array(
			'vf-app'));
//		wp_enqueue_script('vf-service-favorites', $this->settings['apiUrl'] . 'js/services/favorites.js', array(
//			'vf-app'));

		$this->passDataToScripts();

		// get the local combined templates.js
		$js_file_path = $this->store_path . 'js' . DIRECTORY_SEPARATOR . 'templates.js';

		//  api endpoint for getting a store's assets (templates.js and templates.css)
		//  - plugin checks if asset is cached locally, gets it from api if not
		//  - the css needs to be added in head, the js after content (object containing template data is created during rendering)
		//  TODO: set up for handling templates.css
		if (!file_exists($js_file_path)) {
			$response = $this->apiRequest('templates/combined-js');
			if ($response && !empty($response->js)) {
				file_put_contents($js_file_path, $response->js);
				update_option('vf-template-timestamp', time());
			}
		}
		$js_file_url = plugin_dir_url($js_file_path) . 'templates.js';

		wp_enqueue_script('vf-templates', $js_file_url, array('angular', 'vf-app'), get_option('vf-template-timestamp'), true);
	}

	private function passDataToScripts()
	{
		// Pass down template stuff for scripts
		$post_url = esc_url(admin_url('admin-post.php') . '?action=');
		$cache_data = array(
			'data' => $this->cache_data,
			'urls' => array(
				'add' => $post_url . 'template_cache_add',
				'clear' => $post_url . 'template_cache_clear'
			),
		);

		$vfuel = array(
			'settings' => $this->settings,
			'conversion' => $this->conversion,
			'version' => $this->version,
			'cache_data' => $cache_data,
			'pages' => get_option('vendorfuel-pages'),
		);

		// setup template_data so app can pull it in
		wp_localize_script('vf-app', 'vendorfuel', $vfuel);
	}

	private function shortCodeError()
	{
		echo "An error occured while creating this template.";
		exit;
	}

	private function snakeCase($name)
	{
		return preg_replace('/[\s-]+/', '_', strtolower($name));
	}

	private function updateTable()
	{
		$dropSql = "DROP TABLE IF EXISTS " . $this->table_name;
		$this->wpdb->query($dropSql);

		$charset_collate = $this->wpdb->get_charset_collate();
		$sql = "CREATE TABLE {$this->table_name} (
			id int(10) unsigned NOT NULL AUTO_INCREMENT,
			template varchar(255) NOT NULL,
			page_url varchar(255),
			resource varchar(255),
			params text,
			cache text,
			cached_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY  (id)
		) {$charset_collate};";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta($sql);

		update_option('vf-template-table-version', $this->version, true);
	}

	private function apiRequest($endpoint, $method = 'GET', array $params = array(), $decode = true)
	{
		$method = strtoupper($method);
		$params = array_merge(array('apikey' => $this->settings['apiKey']), $params);

		$url = rtrim($this->settings['apiUrl'], '/') . '/' .
			str_replace('%2F', '/', rawurlencode(trim($endpoint, '/')));

		$args = array(
			'method' => $method,
			'headers' => array(
				'content-type' => 'application/json; charset=UTF-8',
			),
			'sslverify' => false,
		);

		if ($method === 'GET') {
			$url .= (strpos($endpoint, '?') === false ? '?' : '&') . http_build_query($params);
		} else {
			$args['body'] = $params;
			$args['compress'] = true;
		}

		$request = new WP_Http();
		$result = $request->request($url, $args);

		if ($result instanceof WP_Error || !is_array($result)
			|| $result['response']['code'] > 299 || $result['response']['code'] < 200) {

			error_log('Api call errored: "' . $url . '".' . "\n\tData:" . json_encode($params));
			return false;
		}

		return $decode ? json_decode($result['body']) : $result['body'];
	}

	private function getFromCache($name)
	{
		// Notes:
		// - WP needs to know where to find data ( api endpoint )
		// - WP needs to know how to build the data cache object for js
		// - WP needs to know what to retreive for the data cache ...
		// - - The whole data cache?
		// - - Lookup by template name and params?
		// - -
		// - Script needs to know template name? Or some way to let WP know how to cache data?
		// - Script could do multiple data calls for a single template... how to handle that.

		$page_url = $_SERVER['REQUEST_URI']; // Make sure this includes query string ...

		$row = $this->wpdb->get_row("SELECT * FROM {$this->table_name}"
			. " WHERE template='{$name}' AND page_url='{$page_url}';");

		//
		// TODO: Bot Detection here - If bot, use the data, regardless of expired or not
		//
		$cache_duration = '2 days';
		if (is_null($row) || !isset($row->cached_at) || time() > strtotime($row->cached_at . ' +' . $cache_duration)) {
			// No cache entry or has expired - let the add-to-cache endpoint fill it in for other requests
			//
			// TODO: Handle keeping the cache clean
			// - Remove old entry here? Also have a clear cache button for all template data?

			return;
		}

		if (isset($row->resource) && isset($row->cache)) {
			// What about params? Only needed for the api call to get the cache data for given page_url?
			// - js cache lookup? just cache[resource] = data? or cache[resource][params] = data?
			// - page_url should distinguish individual resources in WP cache lookup... unless multiple of the same resource name on a page... which would require the extra params layer in object cache hierarchy.
			//
			// For now, just doing cache[resource] = data;
			$this->cache_data[$row->resource] = $row->cache;
		}

//		is_null($row) ||
//		$template = $response->template; // get the template
//
//			if (is_null($row)) {
//				// fill in new row object with data from api
//				$row = new stdClass();
//				$row->name = $name;
//				$row->source_params = $param_string;
//				$row->source = $template->data_source;
//			}
//
//			if (!file_exists($htmlFilePath)) {
//
//			}
//		$cache_duration = '2 days';
//		if (!isset($row->cached_at)
//			|| time() > strtotime($row->cached_at . ' +' . $cache_duration)) {
//			// cached data is out of date - retrieve updated data (cache, timestamp) from source
//			// NOTE: Currently source works with our api... could set it up to use json string or other apis as well...
//			$source = $row->source;
//
//			// Param mapping in source url -> /resource/{id} to /resource/1
//			foreach ($params as $key => $value) {
//				$pattern = "/\{{$key}\}/";
//				if (preg_match($pattern, $source)) {
//					$source = preg_replace($pattern, $value, $source);
//					unset($params[$key]);
//				}
//			}
//
//			// Any other params are passed 'as-is'
//			// For now - caching the whole response...
//			// Should really condense this to just the needed data...
//			// One way would be using generic 'data' object on response instead of named resource objects
//			//  - no need to custom handle every api response - you know what you requested, so here is that data.
//			//  - any extra information would be explicitly named inside of the 'data' object (if client needs the extra data it will need to know the name of that extra data anyway...)
//			// Another option would be to not use the envelope at all... only return 'data' object
//			//  - handle debug and metadata in response headers or leave that information on the api server...
//			//  - errors would return the error data with an error response code...
//			//  - notifications would need to be handled on the client side... based on response code and/or errors
//			$row->cache = $this->apiRequest($source, 'GET', $params, false);
//
//			// update cached_at and update row into wp database
//			$row->cached_at = date('Y-m-d h:i:s');
//			$this->wpdb->replace($this->table_name, $this->flatten($row));
//		}
		// clean up cache - or render error
//		if ($row->cache) {
//			$row->cache = $this->cleanArray(json_decode($row->cache, true));
//		} else {
//			return $this->shortCodeError();
//		}
//
//		// prepare row data for serialize and js access
//		// cached data is valid, set it up for inclusion into script (right before body close)
//		$this->js_data[$name] = $row;
	}

	/**
	 * AJAX call for adding template data to be cached by WordPress.
	 */
	public function addToCache()
	{
		// NOTES:
		// - Should only be called once every 2 days (or cache duration) for a given specific resource
		// sanitize the POST values
		// retrieve template_name, page_url, resource_name, params (optional?)
		// if we got all those - echo 200 OK status and continue processing
		// lookup endpoint for resource_name from resource-map (retrieved from api and cached ?)
		//  - resource-map should be passed along to angular for use by angular resources?
		//  - map[resource-name][verb] = endpoint (including verb)? or map[resource-name] = RESTful endpoint
		//
		// do the api call to endpoint, passing params along
		// create the entry in wp template cache with all the information
		//
		// Next time getFromCache is called, the entry will be there and it will pass it along to js
	}

	private function getResourceMap()
	{
		// TODO: another db entry to store a json object for the resource-map cache...
		// Clearing cache should also clear the resource-map
	}

	public function clearCache()
	{
		// Only allow posts to clear the cache
		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			return;
		}

		// Refresh the js cache - that way the user won't have to wait for this later
		$response = $this->apiRequest('templates/combined-js');
		if ($response && !empty($response->js)) {
			file_put_contents($this->store_path . 'js' . DIRECTORY_SEPARATOR . 'templates.js', $response->js);
			update_option('vf-template-timestamp', time());
		}

		$templateName = isset($_REQUEST['template']) ? $_REQUEST['template'] : null;
		if (!is_null($templateName)) {
			// Passed in a specific template html to clear
			unlink($this->store_path . 'templates' . DIRECTORY_SEPARATOR .
				$this->snakeCase($templateName) . '.html');
		} else {
			// Clear all template html
			array_map('unlink', glob($this->store_path . 'templates' . DIRECTORY_SEPARATOR . '*'));
		}

		// TODO: Clear the wordpress cache entries
	}

	private function cleanArray(array $array)
	{
		// Clean empty key
		unset($array['']);

		// recursively clean the rest of the array
		foreach ($array as $key => $value) {
			if (is_array($value)) {
				$array[$key] = $this->cleanArray($value);
			}
		}

		return $array;
	}

	private function flatten($obj)
	{
		if (is_object($obj)) {
			$obj = (array) $obj;
		}

		if (is_array($obj)) {
			foreach ($obj as $key => $value) {
				if (is_null($key) || is_null($value)
					|| trim($key) == '' || trim($value) == '') {
					unset($obj[$key]);
				}
				if (is_object($value) || is_array($value)) {
					$obj[$key] = json_encode($value);
				}
			}
		}

		return $obj;
	}
}