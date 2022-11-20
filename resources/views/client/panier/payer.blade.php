@extends('template')
@section('titre')
   Paiement
@endsection
@section('contenu')
<div class="archive post-type-archive post-type-archive-product woocommerce woocommerce-page">
<div id="page">
	<div class="container">
		<!-- #masthead -->
		<div id="content" class="site-content">
			<div id="primary" class="content-area column full">
				<main id="main" class="site-main" role="main">
					<div style="display:flex; flex-direction:row; ">
						<div>
							@if($lesVoyagesDuPanier->count() > 0)
								@foreach ($lesVoyagesDuPanier as $unVoyageDuPanier) 
									<li style="width: 90%; margin-bottom:24px; border:2px black solid;">
										<a href="./voyage/detailler/{{$unVoyageDuPanier->unVoyage->id }}" style="display:flex; flex-direction:row; margin-bottom:10px;">
											<div>
												<img class="productimg" src="{{ $unVoyageDuPanier->unVoyage->imgLink }}" alt="" style="width: 300px">
											</div>
											<div style="margin-left: 25%">
												<h3>{{$unVoyageDuPanier->unVoyage->nomVoyage}}</h3><br>
												<span class="price"><span class="amount">${{ $unVoyageDuPanier->unVoyage->prix }}</span></span><br>
											</div>
										</a>
										<span class="price" style=" margin-left:10px"><span class="amount">Nombre de participants : {{ $unVoyageDuPanier->quantite }}</span>
									</li>
								@endforeach
							@endif
						</div>
						<div>
							<form action="?????????????" style="display:flex; flex-direction:row;">
								@csrf
								<div>
									<label>{{ $leClient->prenom }}</label>
									<label>{{ $leClient->nom }}</label><br>
									<label>{{ $leClient->adresse }}&nbsp;{{ $leClient->ville }}</label>
									<label>{{ $leClient->province }}</label><br>
									<label>{{ $leClient->CP }}</label><br>
									<label style="margin-bottom: 20px;">{{ $leClient->telephone }}</label><br>
									<strong><label>Montant avant-taxes : {{ $lePrixAvantTaxes }} $</label><br>
									<label>TPS : {{ $laTps }} $</label><br>
									<label>TVQ : {{ $laTvq }} $</label><br>
									<label>Montant dû : {{ $lePrixAvecTaxes }} $</label></strong>
								</div>
								<div style="margin-left: 30px;">
									<label for="titulaire"> Titulaire de la carte </label>
									<input type="text" name="titulaire" id="titulaire" class="form-control" placeholder="" style="margin-bottom: 10px; width:300px;" />
									<label for="numeroCarte"> Numéro de carte </label>
									<input type="text" name="numeroCarte" id="numeroCarte" class="form-control" placeholder="" style="margin-bottom: 10px; width:300px;" />
									<label for="ccv"> CCV </label>
									<input type="text" name="ccv" id="ccv" class="form-control" placeholder="" style="margin-bottom: 10px; width:100px;" />
									<label for="dateExpirationMois"> Date d'expiration </label>
									<div style="display: flex; flex-direction:row;">
									<select name="dateExpirationMois" id="dateExpirationMois" class="form-control" placeholder="" style="margin-bottom: 10px; width:40px;" >
										<option>01</option>
										<option>02</option>
										<option>03</option>
										<option>04</option>
										<option>05</option>
										<option>06</option>
										<option>07</option>
										<option>08</option>
										<option>09</option>
										<option>10</option>
										<option>11</option>
										<option>12</option>
									</select>
									/
									<select name="dateExpirationAnnee" id="dateExpirationAnnee" class="form-control" placeholder="" style="margin-bottom: 10px; width:40px;" >
										<option>22</option>
										<option>23</option>
										<option>24</option>
										<option>25</option>
										<option>26</option>
										<option>27</option>
										<option>28</option>
										<option>29</option>
										<option>30</option>
										<option>31</option>
									</select>
									</div>
									<button type="submit" style="color:black;">Procéder au paiement</button>
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