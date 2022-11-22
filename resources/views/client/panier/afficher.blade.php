@extends('./client/template')
@section('titre')
   Gestion du Panier
@endsection
@section('contenu')
<script src="{{ asset('js/boutonModifierQuantite.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<div class="archive post-type-archive post-type-archive-product woocommerce woocommerce-page">
<div id="page">
	<div class="container">
		<!-- #masthead -->
		<div id="content" class="site-content">
			<div id="primary" class="content-area column full">
				<main id="main" class="site-main" role="main">
				<p class="woocommerce-result-count">
					 {{ $listePanier->count() }} Voyages dans votre panier
				</p>
				<ul class="products">
					@if($listePanier->count() > 0)
					    @foreach ($listePanier as $itemPanier) 
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
						<a href="./commande/paiement" class="button" style="margin-bottom:10px; margin-top:15px; margin-left:10px">Passer la commande</a>
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