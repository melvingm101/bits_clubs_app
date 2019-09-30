( function() {
	
	 var patd_events=JSON.parse(pstd_event_obj.post_title);
	  // var categories=[];
	  // array of events here
         var events=[];  

	   for( var evt in patd_events){
		   events.push({"text":patd_events[evt],"value":evt});
	   }
     tinymce.PluginManager.add( 'events_calendar_countdown', function( editor, url ) {
	
		function disabled_button_on_click() {
				this.disabled( !this.disabled() );
				editor.insertContent( '[events-calendar-countdown]' );
			}
	
		function re_enable_button() {	
				var state = this.enabled();
			}
		
		editor.on( 'keyup' , function() {
				if ( editor.getContent().indexOf( '[events-calendar-countdown]' ) > -1 ) {
					editor.controlManager.setDisabled('events_calendar_countdown_button', true);
				} else {
					editor.controlManager.setDisabled('events_calendar_countdown_button', false);
				}
			});

	  // var tec_categories=[];//tec_events
	  var tec_events=[];
		var show_sec=[];
	   show_sec.push({"text":"NO","value":"no"});
	   show_sec.push({"text":"YES","value":"yes"});
	 var select_box_size=[];
	   select_box_size.push({"text":"Large","value":"large"});
 	   select_box_size.push({"text":"Medium","value":"medium"});
	   select_box_size.push({"text":"Small","value":"small"});
			 if(typeof pstd_event_obj != 'undefined' && typeof pstd_event_obj.post_title != 'undefined') 
{
        editor.addButton( 'events_calendar_countdown_button', {
			//	title: 'Events Calendar Countdown',
				text: "Button",
				type: 'menubutton',
				image: url + '/coolprocess.png',
			
			
				menu: [
                {
                    text: 'Event Calendar Countdown Settings',
                    onclick: function() {
						
                    //alert("My Button is clicked!");

                        editor.windowManager.open( {
                            title: 'Settings',
                            body: [
							{
							
							type:  'listbox',
							name:  'event_id',
							label: 'Select an Event',
							'values': events,
							},
							
							
							{
							type: 'textbox', 
	                        name: 'select_background_color', 
	                        label: 'Background Color eg: #ddaacc',
	                        value:''
						    }, 
									
			
							{
							type: 'textbox',
							name: 'select_color',
							label: 'Choose Color eg: #ddaaee',
							value:''
							},
									
							{
							type: 'listbox',
							name: 'showseconds',
							label: 'Show Seconds',
							'values':show_sec
							},
									
							{
							type: 'listbox',
							name: 'box_size',
							label: 'Select Size',
							'values':select_box_size
                            },
									
							{
							type: 'textbox',
							name: 'event_start',
							label: 'Display Text When Event Starts',
							value:''
							},
									
							{
							type: 'textbox',
							name: 'event_end',
							label: 'Display Text When Event Ends',
							value:''
							},
							],
                            onsubmit: function( e ) {
                                editor.insertContent( '[events-calendar-countdown id="' + e.data.event_id + '"  backgroundcolor="' + e.data.select_background_color + '" choosecolor="' + e.data.select_color + '"  show_seconds="' + e.data.showseconds + '" divsize="' + e.data.box_size + '" event-start="' + e.data.event_start + '" event-end="' + e.data.event_end + '"]');
                            }
                        });
                    }
                },
           ]
			});

		
		editor.onSetContent.add(function(editor, o) {
			  if ( editor.getContent().indexOf( '[events-calendar-countdown]' ) > -1) {
					editor.controlManager.setDisabled('events_calendar_countdown_button', true);
				}
		  });
		  }
   });

})();