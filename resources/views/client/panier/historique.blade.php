@extends('./client/template')
@section('titre')
   Gestion du Panier
@endsection
@section('contenu')
<script src="{{ asset('js/jquery.js') }}"></script>
@php
	$listePanier = $client->historiqueVentes;
@endphp
<div class="archive post-type-archive post-type-archive-product woocommerce woocommerce-page">
<div id="page">
	<div class="container">
		<!-- #masthead -->
		<div id="content" class="site-content">
			<div id="primary" class="content-area column full">
				<main id="main" class="site-main" role="main">
				<ul class="products">
					@if($listePanier->count() > 0)
					    @foreach ($listeVentes as $itemVentes) 
						    <li style="width: 90%; margin-bottom:24px; border:2px black solid;">
							<a href="../voyage/detailler/{{$itemPanier->voyage->id }}" style="display:flex; flex-direction:row; margin-bottom:10px">
								<div>
									<img class="productimg" src="{{ $itemPanier->voyage->imgLink }}" alt="" style="width: 300px; margin-left:10px; margin-top: 10px">
								</div>
								<div style="margin-left: 25%">
									<h3>{{$itemPanier->voyage->nomVoyage}}</h3><br>
									<span class="price"><span class="amount">${{ $itemPanier->voyage->prix }} par participant</span></span><br>
								</div>

							</a>
							<div style="margin-left:10px">
								<span>Nombre de participants : 
								<input type="number" onchange="modifierQuantite(this.value, {{$itemPanier->id}})" name="quantite" value="{{$itemPanier->quantite}}" style="width: 50px; "></span>
							</div>
							<br>
							<!--<a href="./panier/modifier/Quantite/{{ $itemPanier->id }}/-1" type="button" class="btn btn-success" style="width: 30px;">-</a>-->
							<a href="./supprimer/{{$itemPanier->id}}" class="button" style="margin-bottom:10px; margin-top:15px; margin-left:10px">Supprimer</a>
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