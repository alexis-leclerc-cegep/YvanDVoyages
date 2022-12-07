@extends('./client/template')
@section('titre')
   Gestion du Panier
@endsection
@section('contenu')
<script src="{{ asset('js/jquery.js') }}"></script>
@php
	$listeVentes = $client->vente;
@endphp
<div class="archive post-type-archive post-type-archive-product woocommerce woocommerce-page">
<div id="page">
	<div class="container">
		<!-- #masthead -->
		<div id="content" class="site-content">
			<div id="primary" class="content-area column full">
				<main id="main" class="site-main" role="main">
				<ul class="products">
					@if($listeVentes->count() > 0)
					    @foreach ($listeVentes as $itemVente) 
						    <li style="width: 90%; margin-bottom:24px; border:2px black solid;">
							<a href="../voyage/detailler/{{$itemVente->voyage->id }}" style="display:flex; flex-direction:row; margin-bottom:10px">
								<div>
									<img class="productimg" src="{{ $itemVente->voyage->imgLink }}" alt="" style="width: 300px; margin-left:10px; margin-top: 10px">
								</div>
								<div style="margin-left: 25%">
									<h3>{{$itemVente->voyage->nomVoyage}}</h3><br>
									<span class="price"><span class="amount">${{ $itemVente->voyage->prix }} par participant</span></span><br>
								</div>

							</a>
							<div style="margin-left:10px">
								<span>Quantité : {{$itemVente->quantiteVoyageurs}}
							</div>
							<br>
							<!--<a href="./panier/modifier/Quantite/{{ $itemVente->id }}/-1" type="button" class="btn btn-success" style="width: 30px;">-</a>-->
							<a href="./supprimer/{{$itemVente->id}}" class="button" style="margin-bottom:10px; margin-top:15px; margin-left:10px">Supprimer</a>
							</li>
						@endforeach
						<style>
							td{
								padding-left: 70px !important;
							}
						</style>
						<table style="width:fit-content">
							<tr>
								<th>Sous-total</th> 
								<td>{{ number_format($client->totalPanier(), 2) }}$</td>
							</tr>
							<tr>
								<th>Montant taxes</th>
								<td>{{ number_format($client->totalPanier() * 0.15, 2) }}$</td>
							</tr>
							<tr>
								<th>Total</th>
								<td>{{ number_format($client->totalPanier() * 1.15, 2) }}$</td>
							</tr>
							<br>
							<br>
							<span id="avertissement" style="display: none" class="danger">Rafraîchir pour avoir le montant de la commande actualisé</span>
						</table>
						<a href="./paiement" class="button" >Passer la commande</a>
					@endif
						

				</ul>

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