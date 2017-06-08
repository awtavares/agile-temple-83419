/*
	Mentoring Custom JS
	Input File 
*/

'use strict';

;( function ( document, window, index ) {
	var inputs = document.querySelectorAll('.mt-inputfile');
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				label.querySelector('span').innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});

		// Fix para bug do Firefox
		input.addEventListener('focus', function(){ input.classList.add('has-focus'); });
		input.addEventListener('blur', function(){ input.classList.remove('has-focus'); });
	});

	var dataTable = document.querySelectorAll('*[data-title="Data do evento"]');
	for(var i = 0; i < dataTable.length; i++) {
		var dataVal = dataTable[i].innerHTML,
			arrData = dataVal.split('-').reverse();

		dataTable[i].innerHTML = arrData.join('/');
	}
} ( document, window, 0 ));