@php
	use App\contatos;
	$contatos = contatos::all();
@endphp
<footer>
			<div class="container">
				<div class='row'>
					<div class="col-sm">
							<img src="{{ asset('img/MicrosoftTeams-image.png') }}"width="250px" >	
					</div>
						<div class="col-sm">
								
						</div>
				        @forelse ($contatos as $contato)
						<div class="col-sm">
								<p class="lead font-weight-bold">Atendimento</p><br>
									
						<p class="pt-2">Email: {{$contato->email}} </p>
								<br>
								<p>Telefone: {{$contato->telefone}}</p>

							</div>
							
							<div class="col-sm">
												<a href="https://api.whatsapp.com/send?phone={{$contato->linkwpp}}&text=Contato%20com%20vendedor"><img src="{{ asset('img/whatsa.png') }}"class="rounded float-right"width="40px"></a>
												<a href="https://facebook.com/{{$contato->linkfacebook}}"><img src="{{ asset('img/facebook_logos_PNG19751.png') }}"class=" rounded float-right"width="50px"></a>
												<a href="{{$contato->linkinstagram}}"><img src="{{ asset('img/image.png') }}"class="rounded float-right"width="40px"></a>
														</div>
														@empty
														<h1>  <div class="alert alert-danger">sem dados</div></h1>
							@endforelse
			</div>
			</div>
		</footer>
	