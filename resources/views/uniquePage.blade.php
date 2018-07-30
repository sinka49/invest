@extends('wrap')
@section('content')
<!-- ************************************************************************************** -->
@if(count($cat))
<div class="CAPTION">
	<div class="centerBlock">
		<div class="CAPTION__wrapper">
			<p>
				{{$cat->title}}
			</p>
		</div>
	</div>
</div>
@endif
<div class="centerBlock">
	<div class="investOfferContainer">
		<div class="offer_left">
			@include('rightMenu')
		</div>
		<div class="offer_right">

		<!-- Подключение вьюх -->
	@yield('main')
		</div>

	</div>
	

</div>





<!-- ************************************************************************************** -->
@include('usefulLinks')


@stop