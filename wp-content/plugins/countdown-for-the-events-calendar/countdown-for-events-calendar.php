<?php
/*
 Plugin Name:Countdown for The Events Calendar 
 Plugin URI:https://eventscalendartemplates.com
 Description:CountDown for The Events Calendar Provides you the ability to create Beautiful Countdown for <a href="http://wordpress.org/plugins/the-events-calendar/">The Events Calendar (by Modern Tribe)</a> events with just a few clicks.
 Version:1.0.1
 License:GPL2
 Author:Cool Timeline Team
 Author URI:http://www.cooltimeline.com
 License URI:https://www.gnu.org/licenses/gpl-2.0.html
 Domain Path: /languages 
 Text Domain:tecc
*/

if ( !defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}
if (!defined('TECC_VERSION_CURRENT')){
    define('TECC_VERSION_CURRENT', '1.0.1');
}

define('TECC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define('TECC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

if( !defined( 'TECC_JS_DIR' ) ) {
    define( 'TECC_JS_DIR', TECC_PLUGIN_URL . 'js' );
}
if( !defined( 'TECC_CSS_URL' ) ) {
    define( 'TECC_CSS_URL', TECC_PLUGIN_URL . 'css' );	
}

/**
 * Cool EventsCalendarCountdown main class.
 */
 
 
 if (!class_exists('EventsCalendarCountdown')) {

    class EventsCalendarCountdown {
		
		/**
         * Construct the plugin object
         */
    public function __construct()
	{
		
        /*
        Check The Event calender is installed or not
        */	
		
		add_action('init', array($this, 'tecc_register_shortcode'));
        add_action( 'plugins_loaded', array( $this, 'tecc_check_event_calender_installed' ));
		add_action( 'wp_enqueue_scripts',array($this,'tecc_register_frontend_assets')); //registers js and css for frontend
		
		if ( is_admin() ) {
		include(TECC_PLUGIN_DIR.'setting-panel.php');
		}
	}
	
	function tecc_register_shortcode() {
            add_shortcode('events-calendar-countdown', array($this, 'tecc_event_calendar_countdown_shortcodes'));//used to register shortcode handler
 }
	
	
	/*
	Check The Event calender is installled or not. If user has not installed yet then show notice 
    */	
		
	public  function tecc_check_event_calender_installed()
	{
		if ( ! class_exists( 'Tribe__Events__Main' ) or ! defined( 'Tribe__Events__Main::VERSION' )) {
		add_action( 'admin_notices', array( $this, 'Install_TECC_Notice' ) );
		}
    }
	
	public function Install_TECC_Notice()
	{
        if ( current_user_can( 'activate_plugins' ) ) {
        $url = 'plugin-install.php?tab=plugin-information&plugin=the-events-calendar&TB_iframe=true';	
		$title = __( 'The Events Calendar', 'tribe-events-ical-importer' );
		echo '<div class="error CTEC_Msz"><p>' . sprintf( __( 'In order to use our plugin, Please first install the latest version of <a href="%s" class="thickbox" title="%s">%s</a> and add an event.', 'ect' ), esc_url( $url ), esc_attr( $title ),esc_attr( $title ) ) . '</p></div>';
        }
    }

	
	function tecc_register_frontend_assets() 
	{
		//  Enqueue common required assets
		wp_register_script( 'countdown-js', TECC_JS_DIR . '/countdown.js', array('jquery'), TECC_VERSION_CURRENT );
		wp_register_style ('countdown-css', TECC_CSS_URL . '/countdown.css', array(), TECC_VERSION_CURRENT);
		
	    global $post;  
        if(isset($post->post_content) && has_shortcode( $post->post_content, 'events-calendar-countdown'))
		{
	    wp_enqueue_script( 'countdown-js');
		wp_enqueue_style( 'countdown-css');
        }
   }
	
	
	function tecc_event_calendar_countdown_shortcodes($atts)
	{
		
		if ( !function_exists( 'tribe_get_events' ) ) {
            return;
        }
		
		extract( shortcode_atts( array (
		'id'           			=>  '',
		'backgroundcolor'       =>  '',
		'choosecolor'   	    =>	'',
		'show_seconds' 		    =>	'',
		'fontsize'              =>  '',
		'textsize'              =>  '',
		'size'                  =>  '',
		'event-end'             =>  '',
		'event-start'           =>  '',
		), $atts ));
			
	   
	   if ( ! empty( $atts['id'] ) ) {
		$atts['event_ID'] = (int) $atts['id'];
		}
		
	   else if( empty( $atts['id'] ) ){
		$string=__('Please Select an Event in Event Countdown Shortcode Generator','tecc');
		echo "$string";
		//exit();
		}
       
	   if(isset( $atts['id'])){
		$event = get_post($atts['event_ID']);
		echo $this->tecc_get_output($event,$atts);
		}

	}
		
	
function tecc_get_output( $event,$settings) 
		{	
			ob_start();
			include(dirname(__FILE__).'/countdown-view.php');
     		$hourformat = ob_get_clean();
			$ret='';

		if (isset($settings['event-end'])){
           $eventend_msz=$settings['event-end'];
           }
    
        if (isset($settings['event-start'])){
           $eventstart_msz=$settings['event-start'];
          }
		  
			if ($event instanceof WP_Post) {
			// Get the event start date and end date.
			$startdate = tribe_get_start_date( $event, false, Tribe__Date_Utils::DBDATETIMEFORMAT );
			$enddate = tribe_get_end_date( $event, false, Tribe__Date_Utils::DBDATETIMEFORMAT );
			
			// Get the number of seconds remaining until the date in question.
			$seconds = strtotime( $startdate ) - current_time( 'timestamp' );
			$endseconds =  current_time( 'timestamp' ) - strtotime( $enddate );
			//echo"$endseconds";
			} else {
			$seconds = 0;
			}

			if ( $seconds > 0 ) {
			$ret = $this->tecc_generate_countdown_output( $seconds, $hourformat, $event );
			}
			
			else if ( $endseconds >= 0) {
			echo '<h1>'.($event->post_title ).'</h1>';
			echo $eventend_msz;
			}
			
			else if ($seconds <= 0) {
			echo '<h1>'.($event->post_title ).'</h1>';
			echo  $eventstart_msz;
			}

			return $ret;

		}
		
		function tecc_generate_countdown_output( $seconds, $hourformat, $event) 
			{
			
			$link = tribe_get_event_link( $event );
			$output = '';
			
			if ( $event ) {
			$output .= '<div class="tribe-countdown-text"><a href="' . esc_url( $link ) . '"><h2>' . esc_attr( $event->post_title ) . '</h2></a></div>';
			}
			return $output . '
			<div class="tec-countdown-timer">
				<span class="tecc-seconds-section">' . $seconds . '</span>
				<span class="tecc-countdown-format">' . $hourformat . '</span>
			</div>';
		}
		
		
	} //class end here
}   
 $tecc=new EventsCalendarCountdown;