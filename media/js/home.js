$(document).ready(function(){
	
	var slides = $('#splashwrap .slide');
	var n = slides.length;
	var c = 0;
	if(n>1)
	{
		(function loop() {
		    slides.delay(10000).fadeOut(1500).eq(++c%n).fadeIn(1500, loop);
		}());
	}
	
	// Graphs
	$('.services-waypoint').waypoint(function(direction){
		$(this).waypoint('destroy');
		var $me = $(this);
		$(this).find('.chart').highcharts({
			chart:{
				plotBackgroundColor:null,
				plotBorderWidth: null,
				plotShadow: false,
				backgroundColor:'#FFF'
			},
			title:{
				text:$me.find('.chart').data('name')
			},
			credits:{
				enabled:false
			},
			plotOptions: {
				pie: {
				    allowPointSelect: true,
				    cursor: 'pointer',
					dataLabels: {
					    enabled: true,
				    	//format: '<b>{point.name}</b>: {point.percentage:.1f} %',
						style: {
				    		color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
						}
					}
				}
			},
			series:[{
				type:'pie',
				name:$me.find('.chart').data('name'),
				data:servicesdata[$me.find('.chart').data('name')]
			}]
		});
	},{
		offset:'75%'
	});
	
	// Contact form
	
	// Menu
	$('#splash a').click(function(e){
		scrollToElement($($(this).attr('href')));
		window.location.hash = $(this).attr('href');
		e.preventDefault();
	});
	
});

function nextSlide()
{
	
}
