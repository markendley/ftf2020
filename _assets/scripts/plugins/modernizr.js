/* Modernizr
------------------------------ */

function isTouchDevice() {
    return 'ontouchstart' in document.documentElement;
}

(function(){

	document.getElementsByTagName('html')[0].classList.remove('no-js');
	document.getElementsByTagName('html')[0].classList.add('js');

	if (isTouchDevice()) {
		document.getElementsByTagName('html')[0].classList.add('touch');
	}
	else {
		document.getElementsByTagName('html')[0].classList.add('no-touch');
	}


	/*	
		BROWSER:					BROWSER ENGINE:
		
		Chrome						WebKit
		Safari						Webkit
		Firefox						Gecko
		Opera						Webkit
		IE Edge						Webkit
		IE 10						Trident/6.0
		IE 11						Trident/7.0
	*/
	
	if(navigator.userAgent.indexOf('Trident/6') > -1){
		document.getElementsByTagName('html')[0].classList.add('ie10');
	}
	if(navigator.userAgent.indexOf('Trident/7') > -1){
		document.getElementsByTagName('html')[0].classList.add('ie11');
	}


	
	
//IE 11 	"Mozilla/5.0 (Windows NT 6.1; Trident/7.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; .NET4.0C; rv:11.0) like Gecko\"
	
})();



