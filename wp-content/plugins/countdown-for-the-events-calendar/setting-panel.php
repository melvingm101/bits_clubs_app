<?php

add_action( 'admin_menu', 'tecc_add_admin_menu' );
add_action( 'admin_init', 'tecc_settings_init' );


add_action( 'admin_head', 'tecc_enqueue_color_picker' );
function tecc_enqueue_color_picker( ) 
{
	 $screen = get_current_screen();
  if ( $screen->id !="tribe_events_page_countdown_for_the_events_calendar")
        return;

    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'tecc-b-color-picker-script', TECC_JS_DIR . '/jquery-custom.js', array( 'wp-color-picker' ), false, true );
   
}


function tecc_add_admin_menu(  )
{ 
	add_submenu_page( 'edit.php?post_type=tribe_events', 'Countdown for the events calendar', 'Event Countdown', 'manage_options', 'countdown_for_the_events_calendar', 'tecc_options_page' );
}


function tecc_settings_init(  ) { 

	register_setting( 'pluginPage', 'tecc_settings' );
	add_settings_section(
		'tecc_pluginPage_section', 
		__( 'Create Shortcode for the Event countdown using below mentioned settings', 'tecc' ), 
		'tecc_settings_section_callback', 
		'pluginPage'
	);
//add_settings_field( $id, $title, $callback, $page, $section, $args )
	add_settings_field( 
		'event_id', 
		__( 'Select an Event', 'tecc' ), 
		'tecc_select_field_0_render', 
		'pluginPage', 
		'tecc_pluginPage_section' 
	);

	add_settings_field( 
		'backgroundcolor', 
		__( 'Countdown Background Color', 'tecc' ), 
		'tecc_text_field_1_render', 
		'pluginPage', 
		'tecc_pluginPage_section' 
	);

	add_settings_field( 
		'choosecolor', 
		__( 'Choose Countdown Color', 'tecc' ), 
		'tecc_text_field_2_render', 
		'pluginPage', 
		'tecc_pluginPage_section' 
	);

	add_settings_field( 
		'show_seconds', 
		__( 'Show Seconds in Countdown', 'tecc' ), 
		'tecc_select_field_3_render', 
		'pluginPage', 
		'tecc_pluginPage_section' 
	);

	add_settings_field( 
		'size', 
		__( 'Select Countdown Size', 'tecc' ), 
		'tecc_select_field_4_render', 
		'pluginPage', 
		'tecc_pluginPage_section' 
	);

	add_settings_field( 
		'event-start', 
		__( 'Display Text When Event Starts', 'tecc' ), 
		'tecc_text_field_5_render', 
		'pluginPage', 
		'tecc_pluginPage_section' 
	);
	
	add_settings_field( 
		'event-end', 
		__( 'Display Text When Event Ends', 'tecc' ), 
		'tecc_text_field_6_render', 
		'pluginPage', 
		'tecc_pluginPage_section' 
	);


}


function tecc_select_field_0_render(  ) { 

$options = get_option( 'tecc_settings' );
$events = tribe_get_events( array(
	      'posts_per_page' =>-1,
	      'post_type' => 'tribe_events',
          'post_status'    => 'publish',
          'meta_query'     => array(
             array(
             'id'=>'id',
             'value'   =>  date('Y-m-d h:i:sa', strtotime('-1 days') ),
              'compare' => '>',
              'type'    => 'date'
            )
         )
           ) );

        
    ?>
    <select name='tecc_settings[event_id]'>
    
    <?php
    $saved_event=isset($options['event_id'])?$options['event_id']:'';
    if(is_array($events) && array_filter($events) != null){
    foreach ( $events as $event ) { ?>
	 <option value="<?php echo $event->ID;?>"<?php selected( $saved_event, $event->ID ); ?>><?php echo $event->post_title;?></option>
    <?php 
    }
    }
    else{
    ?>
    <option value="0"><?php _e('No Future Events found.','tecc');?></option>
    <?php 
    } ?> </select>
    <?php
   }


function tecc_text_field_1_render(  ) { 

	$options = get_option( 'tecc_settings' );
	?>
	<input type='text' name='tecc_settings[backgroundcolor]' value="<?php echo $options['backgroundcolor']; ?>" class="wp-color-picker-field" data-default-color ="#ffffff">
	<?php
	}


function tecc_text_field_2_render(  ) { 

	$options = get_option( 'tecc_settings' );
	?>
	<input type='text' name='tecc_settings[choosecolor]' value="<?php echo $options['choosecolor']; ?>" class="wp-color-picker-field" data-default-color ="#ffffff">
	<?php

}


function tecc_select_field_3_render(  ) { 

	$options = get_option( 'tecc_settings' );
	?>
	<select name='tecc_settings[show_seconds]'>
		<option value="yes">Yes</option>
		<option value="no">No</option>
	</select>
	<?php

}


function tecc_select_field_4_render(  ) { 

	$options = get_option( 'tecc_settings' );
	?>
	<select name='tecc_settings[size]'>
		<option value="large" <?php selected( $options['size'], "large" ); ?>>Large</option>
		<option value="medium" <?php selected( $options['size'],"medium" ); ?>>Medium</option>
		<option value="small" <?php selected( $options['size'], "small" ); ?>>Small</option>
	</select>
	<?php

}


function tecc_text_field_5_render(  ) { 

	$options = get_option( 'tecc_settings' );
	?>
	<input type='text' name='tecc_settings[event-start]' value="<?php echo $options['event-start']; ?>">
	<?php

}

function tecc_text_field_6_render(  ) { 

	$options = get_option( 'tecc_settings' );
	?>
	<input type='text' name='tecc_settings[event-end]' value="<?php echo $options['event-end']; ?>">
	<?php

}

function tecc_settings_section_callback(  ) { 
	echo __( 'Countdown Settings', 'tecc' );
}


function tecc_options_page(  ) {
        

    ?>
  <?php  	 // check user capabilities
 if ( ! current_user_can( 'manage_options' ) ) {
 return;
 }
 
 // add error/update messages
 
 // check if the user have submitted the settings
 // wordpress will add the "settings-updated" $_GET parameter to the url
	 if ( isset( $_GET['settings-updated'] ) ) {
	 // add settings saved message with the class of "updated"
	 add_settings_error( 'wporg_messages', 'wporg_message', __( 'Shortcode generated', 'wporg' ), 'updated' );
	 // show error/update messages
	 settings_errors( 'wporg_messages' );
	 }
 ?>
 <div class="wrap">
 <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>        
    <form action='options.php' method='post'>
		 <?php
        settings_fields('pluginPage');
        do_settings_sections('pluginPage');
        submit_button("Generate Shortcode");
        ?>
    </form>
    </div>
    

    <div>
            <h2>Countdown for the events calendar Shortcode :</h2>
           <?php    
           if ( isset( $_GET['settings-updated'] ) ) {
				 $options = get_option( 'tecc_settings' );
           if(isset($options['event_id']) && !empty($options['event_id']) && $options['event_id']!=0){
            $dynamic_attr='';
            $dynamic_attr.="[events-calendar-countdown id=\"{$options['event_id']}\" backgroundcolor=\"{$options['backgroundcolor']}\" choosecolor=\"{$options['choosecolor']}\" show_seconds=\"{$options['show_seconds']}\" size=\"{$options['size']}\" event-start=\"{$options['event-start']}\" event-end=\"{$options['event-end']}\"";
            $dynamic_attr.=']';
            $prefix="_tec_";
            echo ' <p style="font-size:18px">Paste this shortcode anywhere in page where you want to display Event Countdown
              </p>';
             echo '<code>';
             echo  htmlentities ($dynamic_attr);
             echo"</code>";
            }else{
              	_e("You have not selected any event!","tecc");
                 }
    }          
 ?>
    </div>
    <?php

}


?>