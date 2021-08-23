

$(function () {
  $( document ).ready(function() {

      
    $(window)
      .resize(function () {
        resizeEvents();
      })
      .resize();
  

    function resizeEvents() {
      equalize()
    }

    var $grid = $('.grid').packery({
      // options
      itemSelector: '.grid-item',
     
    });




  function onLayout() {
    console.log("complete");
    resizeEvents();
  }
  // bind event listener
    $grid.on( 'layoutComplete', onLayout );

    $('.text.trim').each(function(){
      var text = $(this).text();

     

    // replace the contents of the div with the link text
      $(this).html( text.substring(1, text.length));
   
    });

    function equalize(){
      $('.equalize').each(function(){
        $element = $(this).find('.eq');
        var maxHeight = 0;
        $element.each(function(){
          $(this).css('height','auto');
        });

        $element.each(function(){
          if ($(this).height() > maxHeight) { maxHeight = $(this).innerHeight(); }
        });
  
        $element.height(maxHeight);
      });

     
    }

    /**
 * Filter button click event.
 *
 * @param {*} event
 */
function filterClick(event) {
	event.preventDefault();
 
	// Exit if button active.
	if (this.classList.contains('active')) {
		return;
	}
 
	// Get .active element.
	var activeEl = document.querySelector('.alm-filter-nav button.active');
	if (activeEl) {
		activeEl.classList.remove('active');
	}
 
	// Add active class.
	this.classList.add('active');
 
	// Set filter params
	var transition = 'fade';
	var speed = 250;
	var data = this.dataset;
 
	// Call core Ajax Load More `filter` function.
	// @see https://connekthq.com/plugins/ajax-load-more/docs/public-functions/#filter
	ajaxloadmore.filter(transition, speed, data);
}
 
// Get all filter buttons.
var filter_buttons = document.querySelectorAll('.alm-filter-nav button');

if (filter_buttons.length > 0) {
	// Set initial active item.
	filter_buttons[0].classList.add('active');
 
	// Loop buttons.
	[].forEach.call(filter_buttons, function (button) {
		// Add button click event.
		button.addEventListener('click', filterClick);
	});
}

    $('.header-image-infos .infos').click(function(){
      $(this).find('.col2,.col3').slideToggle() ;
      $(this).toggleClass('open');
    });
    $(window).on('load', function(){ 
      resizeEvents();

      
      
  
      
    });
  });

  window.almComplete = function(alm){
    setTimeout(function(){resizeEvents();},1000);
  };

 
  
});
