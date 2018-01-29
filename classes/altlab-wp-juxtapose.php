<?php

class ALTLabWPJuxtapose {
    private $page_name = 'altlab_wp_juxtapose';
    private $pluginPath;
    private $pluginUrl;
    public function __construct()
    {
        // Set Plugin Path
        $this->pluginPath = plugin_dir_path(__DIR__);

        // Set Plugin URL
        $this->pluginUrl = WP_PLUGIN_URL . '/wp-Dribbble';

        //Add WP Hooks and Filters Here
        add_action('admin_menu', array($this, 'add_options_menu'));
        add_shortcode('juxtapose', array($this, 'render_shortcode'));
        add_filter( 'tmp_grunion_allow_editor_view', '__return_false' );
    }
    public function  add_options_menu(){
        $self = $this;
        add_menu_page(
            'ALTLab WP Juxtapose',
            'Juxtapose',
            'manage_options',
            $self->page_name,
            array($self, 'render_options_page'),
            'dashicons-playlist-audio'
            );

    }

    public function render_shortcode($atts = [], $content = null){
        ob_start();
        $id = $atts['id'];
        $options = get_option('altlab_wp_juxtapose');
        $juxtapose;

        foreach($options as $value){
            if ($value['id'] == (int)$id) {
                $juxtapose = $value;
            }
        }

		require_once($this->pluginPath . '/views/shortcode-view.php');

		$output = ob_get_clean();
		$run_shortcodes = do_shortcode($output);
		return $run_shortcodes;
    }

    function render_options_page(){

            //require main class
            if(!current_user_can('manage_options')){
                    wp_die( 'You do not have sufficient permissions to access this page' );

            }


            //run bootstrap scripts here to
            if(isset($_GET['action'])){

                // //switch of routes to process
                $action = $_GET['action'];

                switch($action){
                    case 'add':
                        require_once($this->pluginPath . '/controllers/add-controller.php');
                    break;

                    case 'edit':
                            require_once($this->pluginPath  . '/controllers/edit-audio-controller.php');
                    break;


                    case 'delete':
                            require_once($this->pluginPath  . '/controllers/delete-audio-controller.php');
                    break;

                    case 'home':
                    require_once($this->pluginPath  . '/controllers/list-controller.php');
                    break;

                    default:

                    require_once($this->pluginPath  . '/controllers/list-controller.php');

                }


            } else {
                require_once($this->pluginPath . '/controllers/list-controller.php');
            }

        }

}



?>