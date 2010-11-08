function kral(searchTerm) {
	var search = searchTerm;
	var paused = false;
	//List of modules
	var modules = ['facebook','twitter','identica','buzz','digg','youtube','flickr','blogs','wikipedia','bookmarks','forums','jobs'];
	
	// For each module, evaluate if content exists and if so, create a section
		$.each(
			modules,
			function( intIndex, objValue ) {
				//create initial sections
				$('#view_grid').append('<section id='+objValue+'><div class="pauseBtn"></div><h2>'+objValue+'</h2><div class="secContent"></div></section>');
				
				loadIt(objValue);
			
			}
			
			
		); //end each
		
	//Initial load function
	function loadIt(obj) {
	
	$('section#'+obj+" div.secContent").html('<img class="loading" src="images/loading.gif" alt="Loading, please wait." />');
	
		$.ajax({
			url: 'feeds/'+obj+'/'+search,
			type: 'GET',
			dataType: 'html',
			cache: false,
			success: function(data){
				$('section#'+obj+' div.secContent').empty();
				//check if loaded file has content and assign behaviors	
				if (data.length > 0) {
					$('section#'+obj+' div.secContent').hide('fast', function(){
						$(this).html(data).effect('slide',{direction:"right", mode:"show"},500);
					});
					runUpdate(obj);
				} else {
					$('#'+obj+' div.secContent').html('<h3>No results found.</h3>');
				}
				
			}

		});

	};//end loadIt
	
	function collapsible(trigger,target) {
		$(trigger).click(function(){
			$(target).toggle();
		});
	};
	
	//Auto-update loading function
	function runUpdate(section){
		var interval;
		var paused = false;

		$('section#'+section+' .pauseBtn').click(function() {
		
			if (paused == true){
				$(this).parent().removeClass('paused');
				$(this).css('backgroundPosition', '0px 0px');
				paused = false;

			} else if(paused == false) {
				$(this).parent().addClass('paused');
				$(this).css('backgroundPosition', '0px -15px');
				paused = true;
			}
		});

		$('section#'+section+" div.secContent").html('<img class="loading" src="images/loading.gif" alt="Loading, please wait." />');
		//Determine update times per section (in milliseconds)
		switch(section){ 
			case 'facebook': interval = 10000; break;
			case 'twitter': interval = 10000; break;
			case 'identica': interval = 10000; break;
			case 'buzz': interval = 10000; break;
			case 'digg': interval = 10000; break;
			case 'youtube': interval = 20000; break;
			case 'flickr': interval = 60000; break;
			case 'blogs': interval = 30000; break;
			case 'news': interval = 30000; break; 
			case 'bookmarks': interval = 10000; break;
			case 'forums': interval = 30000; break;
			case 'jobs': interval = 30000; break;
			case 'wikipedia': interval = 30000; break;
			
			
			default : ; 
		}  
			
			setInterval(function(){
				if ($('section#'+section).hasClass('paused')) {
					return;
				} else {
					$.ajax({
						url: 'feeds/'+section+'/'+search,
						type: 'GET',
						dataType: 'html',
						cache: false,

						success: function(uData){
												
							//check if loaded file has content and assign behaviors	
							if (uData.length > 0) {
								$('section#'+section+' div.secContent').html(uData).effect('highlight',500);
							} else {
								$('#'+section+' div.secContent').html('<h3>No results found.</h3>');
							}
							
						}
					});
					}
			
			}, interval);
				
	} //End runUpdate()
	
};
