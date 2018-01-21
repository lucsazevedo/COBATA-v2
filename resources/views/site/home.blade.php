@extends('layouts.site')
@section('content')
@include('layouts._site._slides')
<div class="container">
<br><br>
	<div class="row">
		<nav class="center-align white">
		    <div class="nav-wrapper">
		      <div class="col s12">
		        	<div class="col s4 m4">
						<div class="card">
					    <div class="card-image waves-effect waves-block waves-light">
					      <img class="responsive-img" src="/img/acai.jpg" height="200" style="border-radius: 100%">
					    </div>
					    <div class="card-content">
					      <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
					      <p><a href="#">This is a link</a></p>
					    </div>
					    <div class="card-reveal">
					      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
					      <p>Here is some more information about this product that is only revealed once clicked on.</p>
					    </div>
					  </div>
					</div>
				<div class="col s4 m4">
								<div class="card">
							    <div class="card-image waves-effect waves-block waves-light">
							      <img class="responsive-img" src="/img/acai.jpg" height="200" style="border-radius: 100%">
							    </div>
							    <div class="card-content">
							      <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
							      <p><a href="#">This is a link</a></p>
							    </div>
							    <div class="card-reveal">
							      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
							      <p>Here is some more information about this product that is only revealed once clicked on.</p>
							    </div>
							  </div>
					</div><div class="col s4 m4">
						<div class="card">
					    <div class="card-image waves-effect waves-block waves-light">
					      <img class="responsive-img" src="/img/acai.jpg" height="200" style="border-radius: 100%">
					    </div>
					    <div class="card-content">
					      <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
					      <p><a href="#">This is a link</a></p>
					    </div>
					    <div class="card-reveal">
					      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
					      <p>Here is some more information about this product that is only revealed once clicked on.</p>
					    </div>
					  </div>
					</div>
		        	
		      </div>
		    </div>
		</nav>
	</div>
            

 	@include('layouts._site._produtos') 


	<div class="row"> 
		<div class="col s12">
		        <div class="col s6 m3">
		          <div class="card blue-grey darken-1">
		            <div class="card-content white-text">
		              <span class="card-title">Card Title</span>
		              <p>I am a very simple card. I am good at containing small bits of information.
		              I am convenient because I require little markup to use effectively.</p>
		            </div>
		            <div class="card-action">
		              <a href="#">This is a link</a>
		              <a href="#">This is a link</a>
		            </div>
		          </div>
	        </div>
	        <div class="col s6 m3">
	          <div class="card blue-grey darken-1">
	            <div class="card-content white-text">
	              <span class="card-title">Card Title</span>
	              <p>I am a very simple card. I am good at containing small bits of information.
	              I am convenient because I require little markup to use effectively.</p>
	            </div>
	            <div class="card-action">
	              <a href="#">This is a link</a>
	              <a href="#">This is a link</a>
	            </div>
	          </div>
	        </div>
	        <div class="col s6 m3">
	          <div class="card blue-grey darken-1">
	            <div class="card-content white-text">
	              <span class="card-title">Card Title</span>
	              <p>I am a very simple card. I am good at containing small bits of information.
	              I am convenient because I require little markup to use effectively.</p>
	            </div>
	            <div class="card-action">
	              <a href="#">This is a link</a>
	              <a href="#">This is a link</a>
	            </div>
	          </div>
	        </div>

	        <div class="col s6 m3">
	          <div class="card blue-grey darken-1">
	            <div class="card-content white-text">
	              <span class="card-title">Card Title</span>
	              <p>I am a very simple card. I am good at containing small bits of information.
	              I am convenient because I require little markup to use effectively.</p>
	            </div>
	            <div class="card-action">
	              <a href="#">This is a link</a>
	              <a href="#">This is a link</a>
	            </div>
	          </div>
	        </div>
		</div>
	</div>

	<div class="row section">
		<h3 align="center">Marcas</h3>
		<div class="divider"></div>
	</div>
	<div class="row section">
		<div class="col s12">	
			<div class="marcas" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>
				@foreach($marcas as $marca)
		 			<div><img class="responsive-img" src="{{asset($marca->imagem)}}"></div>
		  		@endforeach
			</div>
		</div>
	</div>

@endsection
