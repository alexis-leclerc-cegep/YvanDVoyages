@extends('./client/template')
@section('titre')
   Paiement
@endsection
@section('contenu')
<div class="archive post-type-archive post-type-archive-product woocommerce woocommerce-page">
@php
	use Carbon\Carbon;
	$listePanier = $client->panier;
@endphp
<div id="page">
	<div class="container">
		<!-- #masthead -->
		<div id="content" class="site-content">
			<div id="primary" class="content-area column full">
				<main id="main" class="site-main" role="main">
					<div style="display:flex; flex-direction:row; ">
						<div>
							@if($listePanier->count() > 0)
								@foreach ($listePanier as $itemPanier) 
									<li style="width: 90%; margin-bottom:24px; border:2px black solid;">
										<a href="./voyage/detailler/{{$itemPanier->voyage->id }}" style="display:flex; flex-direction:row; margin-bottom:10px;">
											<div>
												<img class="productimg" src="{{ $itemPanier->voyage->imgLink }}" alt="" style="width: 300px">
											</div>
											<div style="margin-left: 25%">
												<h3>{{$itemPanier->voyage->nomVoyage}}</h3><br>
												<span class="price"><span class="amount">${{ $itemPanier->voyage->prix }}</span></span><br>
											</div>
										</a>
										<span class="price" style=" margin-left:10px"><span class="amount">Nombre de participants : {{ $itemPanier->quantite }}</span>
									</li>
								@endforeach
							@endif
						</div>
						<div>
							<form action="/panier/processer" method="POST" style="display:flex; flex-direction:row;">
								@csrf
								<div>
									<label>{{ $client->prenom }}</label>
									<label>{{ $client->nom }}</label><br>
									<label>{{ $client->adresse }}&nbsp;{{ $client->ville }}</label>
									<label>{{ $client->province->province }}</label><br>
									<label>{{ $client->CP }}</label><br>
									<label style="margin-bottom: 20px;">{{ $client->telephone }}</label><br>
									<strong><label>Montant avant-taxes : {{ number_format($client->totalPanier(), 2) }} $</label><br>
									<label>TPS : {{ number_format($client->totalPanier() * 0.05, 2) }} $</label><br>
									<label>TVQ : {{ number_format($client->totalPanier() * 0.0975, 2) }} $</label><br>
									<label>Montant d?? : {{ number_format($client->totalPanier() *1.15, 2) }} $</label></strong>
								</div>
								<div style="margin-left: 30px;">
									<label for="titulaire"> Titulaire de la carte </label>
									<input type="text" name="titulaire" id="titulaire" class="form-control" placeholder="" style="margin-bottom: 10px; width:300px;" />
									<label for="numeroCarte"> Num??ro de carte </label>
									<input type="text" name="numeroCarte" id="numeroCarte" class="form-control" placeholder="" style="margin-bottom: 10px; width:300px;" />
									<label for="ccv"> CCV </label>
									<input type="text" name="ccv" id="ccv" class="form-control" placeholder="" style="margin-bottom: 10px; width:100px;" />
									<label for="dateExpirationMois"> Date d'expiration </label>
									<div style="display: flex; flex-direction:row;">
									<select name="dateExpirationMois" id="dateExpirationMois" class="form-control" placeholder="" style="margin-bottom: 10px; width:40px;" >
										@for ($i = 1; $i <= 12; $i++)
											<option value="{{ $i }}">{{ $i }}</option>
										@endfor
									</select>
									<select name="dateExpirationAnnee" id="dateExpirationAnnee" class="form-control" placeholder="" style="margin-bottom: 10px; width:40px;" >
										@for($i = now()->year - 2000; $i <= (now()->year - 2000)  + 10; $i++)
											<option value="{{ $i }}">{{ $i }}</option>
										@endfor
									</select>
									</div>
									<button type="submit" style="color:black;">Proc??der au paiement</button>
								</div>
							</form>
						</div>
					</div>
				</main>
				<!-- #main -->
			</div>
			<!-- #primary -->
		</div>
		<!-- #content -->
	</div>
	<!-- .container -->
</div>
@endsection