/* setTimeout(function(){
  $('.alert').hide(1200);
}, 2500)*/

$(document).ready(function(){
	var pathname = window.location.pathname; // Returns path only	

	var split = pathname.split('/');
	// alert(pathname);
	// alert(split[3]);

	if(split[2]==="purchase") {
		$('body').find('.company-li').addClass('menu-open');	
		$('body').find('.company-ul').show('500');	
		$('body').find('.co1').addClass('active');	
		
	}
	else if((split==",webapp,company")) {
		$('body').find('.company-li').addClass('menu-open');	
		$('body').find('.company-ul').show('500');	
		$('body').find('.co2').addClass('active');


	}
	else if((split[3]==="product")) {
		$('body').find('.company-li').addClass('menu-open');	
		$('body').find('.company-ul').show('500');	
		$('body').find('.co2').addClass('active');


	}
	else if(split[3]==="company_list"){
	
		$('body').find('.company-li').addClass('menu-open');	
		$('body').find('.company-ul').show('500');	
		$('body').find('.co3').addClass('active');	

	}
	else if((split[2]=="company") && (split[3]=="register")) {
		$('body').find('.company-li').addClass('menu-open');	
		$('body').find('.company-ul').show('500');	
		$('body').find('.co4').addClass('active');	
	

	}
	else if(split[2]=="sales") {
		$('body').find('.customer-li').addClass('menu-open');	
		$('body').find('.customer-ul').show('500');	
		$('body').find('.cu1').addClass('active');
	}
	// else if(split[2]=="customer") {
	// 	$('body').find('.customer-li').addClass('menu-open');	
	// 	$('body').find('.customer-ul').show('500');	
	// 	$('body').find('.cu2').addClass('active');
	// }
	else if(split[3]=="payment") {
		$('body').find('.customer-li').addClass('menu-open');	
		$('body').find('.customer-ul').show('500');
		$('body').find('.cu3').addClass('active');
	}
	else if((split[2]=="customer") && (split[3]=="register")) {
		$('body').find('.customer-li').addClass('menu-open');	
		$('body').find('.customer-ul').show('500');
		$('body').find('.cu4').addClass('active');
	}
	else if(split[2]=="statement") {
		$('body').find('.stmt').addClass('active');
	}
});