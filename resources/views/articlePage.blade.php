@extends('uniquePage')
@section('main')
<section>
	<div class="articleCaption">
		<h3>{{$item->title}}</h3>
		@if(count($media))<div class="media" style="height: 432px;">@include('mediaSlide')</div>@endif
		<div>
			<p></p>
			{!! $item->description !!}
			<p></p>
		</div>
		@if(count($docs))
		<div class="articleDoc">
			@foreach($docs as $doc)
			<div class="articleDoc__item">

					<div class="articleDoc__item--text"><a target="_blank" href="https://view.officeapps.live.com/op/view.aspx?src=http%3A%2F%2Finvest-mah.tmweb.ru{{$doc->link}}">{{$doc->title}}</a></div>
					<div class="articleDoc__item--img">
						<img src="../public/images/linkFile.png" alt="">
						<p><a href="{{$doc->link}}">Скачать</a></p>
					</div>

			</div>
			@endforeach
		</div>
		@endif
	</div>
</section>
@stop