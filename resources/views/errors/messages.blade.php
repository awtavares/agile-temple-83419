  @if ($message = Session::get('success'))
  	<div data-alert class="alert-box success">
    		<strong>Yes :)</strong> {{ $message }}
        	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </div>
  @endif

  @if ($message = Session::get('error'))
  	<div data-alert class="alert-box alert">
    		<strong>Yes :)</strong> {{ $message }}
        	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </div>
  @endif

  @if ($message = Session::get('warning'))
  	<div data-alert class="alert-box success">
    		<strong>Yes :)</strong> {{ $message }}
        	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </div>
  @endif

  @if ($message = Session::get('info'))
  	<div data-alert class="alert-box info">
    		<strong>Yes :)</strong> {{ $message }}
        	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </div>
  @endif

  @if ($errors->any())
  	<div data-alert class="alert-box alert">
  		<strong>Oh Oh :/</strong> Por favor verifique os erros antes de prosseguir...
  		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </div>
  @endif