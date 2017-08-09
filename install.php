<?php

class vendorfuelInstall
{
	public $wpdb;
	private $wp_pages = array();
	private $pages = array();

	public function __construct()
	{
		$this->wpdb = $wpdb;
		require_once dirname(__FILE__) . '/config.php';
	}

	public function slugify($title)
	{
		return strtolower(trim(str_replace(" ", "-", $title)));
	}

	public function installPage($page)
	{
		$current_user = wp_get_current_user();
		$user_ID = $current_user->ID;
		$slug = $page['slug'];
		$parent_id = "";
		$js = "";
		$html = "";
		$js_file = dirname(__FILE__) . "/actions/" . $slug . ".js";
		if (file_exists($js_file)) {
			$js = file_get_contents($js_file);
		}
		$html_file = dirname(__FILE__) . "/public-pages/" . $slug . ".php";
		if (file_exists($html_file)) {
			$html = file_get_contents($html_file);
		}
		if (strlen($page['parent']) > 0) {
			if (isset($this->wp_pages[$page['parent']])) {
				$parent_id = $this->wp_pages[$page['parent']]['id'];
			}
		}
		//die($html);
		$post = array(
			'comment_status' => 'closed',
			'guid' => '',
			'menu_order' => 0,
			'ping_status' => 'closed',
			'pinged' => '',
			'post_author' => $user_ID,
			'post_content' => $html,
			'post_content_filtered' => '',
			'post_excerpt' => '',
			'post_name' => $slug,
			'post_parent' => $parent_id,
			'post_password' => '',
			'post_status' => 'publish',
			'post_title' => $page['title'],
			'post_type' => "page",
			'post_parent' => 0,
			'to_ping' => ''
		);
		$post_id = wp_insert_post($post);
		if ($post_id > 0) {
			update_post_meta($post_id, '_vfuel-page', $slug);
			update_post_meta($post_id, '_wp_page_template', 'page-full.php');
			$url = get_permalink($post_id);
			$this->wp_pages[$slug] = array('id' => $post_id, 'url' => $url);
		}
	}

	public function registerPage($title, $parent = "", $js = "", $html = "")
	{
		$slug = $this->slugify($title);
		$parent_slug = $this->slugify($parent);
		$this->pages[$slug] = array(
			'title' => $title,
			'slug' => $slug,
			'parent' => $parent_slug
		);
	}

	public function run()
	{
		$settings = get_option("vendorfuel-settings");
		if ($settings === FALSE) {
			update_option("vendorfuel-settings", array(
				"apiUrl" => "https://sapi1b.vendorfuel.com/",
				"debug" => 1,
				"test" => 1,
				"redirectToCart" => 0
			));
		}

		$this->wp_pages = get_option("vendorfuel-pages");
		foreach ($this->pages as $page) {
			if (!isset($this->wp_pages[$page['slug']])) {
				$this->installPage($page);
			}
		}
		update_option("vendorfuel-pages", $this->wp_pages);
		return TRUE;
	}
}
?>
