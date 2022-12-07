@extends('./client/template')
@section('titre')
   Gestion du Panier
@endsection
@section('contenu')
<script src="{{ asset('js/jquery.js') }}"></script>
@php
	use Carbon\Carbon;
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
					    @foreach ($listeVentes->reverse() as $itemVente) 
						    <li style="width: 90%; margin-bottom:24px; border:2px black solid;">
							<a href="../voyage/detailler/{{$itemVente->voyage->id }}" style="display:flex; flex-direction:row; margin-bottom:10px">
								<div>
									<img class="productimg" src="{{ $itemVente->voyage->imgLink }}" alt="" style="width: 300px; margin-left:10px; margin-top: 10px">
								</div>
								<div style="margin-left: 25%">
									<h3>{{$itemVente->voyage->nomVoyage}}</h3><br>
									<span class="price"><span class="amount">${{ $itemVente->voyage->prix }} par participant</span></span><br>
									<span class="price"><span class="amount">Voyage commandé le {{Carbon::parse($itemVente->dateVente)->toFormattedDateString()}}</span></span><br>
									<span class="price"><span class="amount">Nombre de voyageurs : {{$itemVente->quantiteVoyageurs}}</span></span><br>
								</div>

							</a>
							<br>
							<!--<a href="./panier/modifier/Quantite/{{ $itemVente->id }}/-1" type="button" class="btn btn-success" style="width: 30px;">-</a>-->
							</li>
						@endforeach
						<style>
							td{
								padding-left: 70px !important;
							}
						</style>
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