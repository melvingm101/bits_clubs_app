<?php 
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


		$color = isset($settings['backgroundcolor']) ? $settings['backgroundcolor'] : '';
	 
		$choose_color = isset($settings['choosecolor']) ? $settings['choosecolor'] : '';
	   
		$show_seconds = isset($settings['show_seconds']) ? $settings['show_seconds'] : 'yes';
     
	    $box_size = isset($settings['size']) ? $settings['size'] : 'large';
       
		
if (isset($box_size))
{
if ($box_size=="large" ) {
	
$style='
.tec-countdown-timer > .tecc-section > div{height: 150px; width: 180px!important ;}
.tec-countdown-timer > .tecc-section .tecc-amount{font-size:50px !important; color:'.$choose_color.' !important; background-color: '.$color.' !important; padding-top: 20px; }
.tec-countdown-timer > .tecc-section .tecc-word {font-size:20px !important; color:'.$choose_color.' !important; background-color: '.$color.' !important; padding-bottom: 10px; border-bottom: 4px solid '.$choose_color.';}';
}

if ($box_size=="medium" ) {
	
$style='
.tec-countdown-timer >.tecc-section > div{height: 140px !important; width: 165px!important;}
.tec-countdown-timer > .tecc-section .tecc-amount{background-color: '.$color.' !important; font-size:45px !important; color:'.$choose_color.' !important; background-color: '.$color.' ;  padding-top: 20px;}
.tec-countdown-timer > .tecc-section .tecc-word {font-size:15px; color:'.$choose_color.' !important;  background-color: '.$color.' !important ;border-bottom: 4px solid '.$choose_color.';     padding-bottom: 10px;}';
}

if ($box_size=="small") {
$style='.tec-countdown-timer > .tecc-section{background-color: '.$color.' !important;}
.tec-countdown-timer > .tecc-section > div{height: 90px; width: 120px !important;  background-color: '.$color.' !important; }
.tec-countdown-timer > .tecc-section .tecc-amount{background-color: '.$color.' !important;font-size:30px; color:'.$choose_color.' !important; padding-top: 20px;}
.tec-countdown-timer > .tecc-section .tecc-word { background-color: '.$color.' !important; font-size:10px; color:'.$choose_color.' !important; padding-bottom: 10px; border-bottom: 4px solid '.$choose_color.' !important;}';
}
}

else if($box_size==""){
$style='
.tec-countdown-timer > .tecc-section{background-color:'.$color.' !important;}
.tec-countdown-timer > .tecc-section .tecc-amount{ color:'.$choose_color.' !important; background-color: '.$color.' !important; }.tec-countdown-timer > .tecc-section .tecc-word {color:'.$choose_color.'; border-bottom: 4px solid '.$choose_color.' !important; padding-bottom: 10px; background-color: '.$color.' !important;}';
}

?>

<div id="tec_event_id" class="tec-countdown-timer"><style type="text/css"><?php echo "$style"; ?></style>
<?php if ((isset($box_size)) && ($box_size == "large" || $box_size ==  "medium" || $box_size == "small" )) { ?>
<div class="tecc-section tecc-days-section">
        <div>
			<span class="tecc-amount">DD</span>
			<span class="tecc-word"><?php esc_html_e( 'days'); ?></span>
		</div>
		
</div>

<div class="tecc-section tecc-hours-section">
        <div>
			<span class="tecc-amount">HH</span>
			<span class="tecc-word"><?php esc_html_e( 'hours');?></span>
		</div>
		
</div>

<div class="tecc-section tecc-minutes-section">
        <div>
			<span class="tecc-amount">MM</span>
			<span class="tecc-word"><?php esc_html_e( 'min');?></span>
		</div>
</div>

<?php if ( $show_seconds=="yes" ) { ?>

<div class="tecc-section tecc-seconds-section">
        <div>
			<span class="tecc-amount">SS</span>
			<span class="tecc-word"><?php esc_html_e( 'sec');?></span>
		</div>
</div>

<?php } ?>
<?php } ?>

<?php if ($box_size=="" ){ ?>
	<div class="tecc-section tecc-days-section">
		<div>
			<span class="tecc-amount">DD</span>
			<span class="tecc-word"><?php esc_html_e( 'days'); ?></span>
		</div>
	</div>
	
	<div class="tecc-section tecc-hours-section">
	<div>
			<span class="tecc-amount">HH</span>
			<span class="tecc-word"><?php esc_html_e( 'hours');?></span>
		</div>
	</div>
	
	<div class="tecc-section tecc-minutes-section">
	<div>
			<span class="tecc-amount">MM</span>
			<span class="tecc-word"><?php esc_html_e( 'min');?></span>
		</div>
	</div>
	
	<?php if ( $show_seconds=="yes" ) { ?>
	<div class="tecc-section tecc-seconds-section">
		<div>
			<span class="tecc-amount">SS</span>
			<span class="tecc-word"><?php esc_html_e( 'sec');?></span>
		</div>
	</div>
	
	<?php } ?>
<?php } ?>
	
</div>
</div>