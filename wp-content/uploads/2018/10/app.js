var clubs = $('.mtc');
var clubs1 = $('.mtc1');

clubs.waypoint(function(direction) {
  if(direction=='down'){
      clubs.addClass('mtc-animate');
  }
    
    else{
        clubs.removeClass('mtc-animate');
    }
    
},{
  offset:'80%'
});

clubs1.waypoint(function(direction){
   if(direction=='down'){
       clubs1.addClass('mtc1-animate');
   } 
    
    else{
        clubs1.removeClass('mtc1-animate');
    }
},{
    offset: '80%'
});