@extends('wrap')
@section('content')
<!-- ************************************************************************************** -->

<section>
	<div class="centerBlock">
		<form  class="searchForm" action="/search" method="POST">
			{{csrf_field()}}
			<div class="search__group">      
				<input type="text" name="mainSearch" required>
				<span class="highlight"></span>
				<span class="bar"></span>
				<label class="feedBackLabel">Поиск</label>
			</div>
			<button type="submit">Найти</button>

		</form>
	</div>
</section>


<section>
	<div class="centerBlock">
		<div class="searchContent">
		@if(count($result))
			@foreach($result["articles"] as $item)

			<div class="searchContent__item1">
				<a href="/articles/{{$item->id}}">
					<div class="searchContent__item1--left" style="background-image: url({{$item->img}});"></div>
					<div class="searchContent__item1--right">
						<h4>{{$item->title}}</h4>
						<p>{!! mb_substr($item->description, 0, 200)!!}...</p>
						<span>{{$item->created_at->formatLocalized('%d-%m-%y')}}</span>
					</div>
				</a>
			</div>
			@endforeach

				@foreach($result["news"] as $item)

					<div class="searchContent__item1">
						<a href="/news/{{$item->id}}">
							<div class="searchContent__item1--left" style="background-image: url({{$item->img}});"></div>
							<div class="searchContent__item1--right">
								<h4>{{$item->title}}</h4>
								<p>{!! mb_substr($item->content, 0, 200)!!}...</p>
								<span>{{$item->created_at->formatLocalized('%d-%m-%y')}}</span>
							</div>
						</a>
					</div>
				@endforeach

				@foreach($result["docs"] as $item)
			<div class="searchContent__item2">
				<a href="{{$item->link}}">
					<div class="searchContent__item2--left">
						<img src="public/images/linkFile.png" alt="">
					</div>
					<div class="searchContent__item2--right">
						<p>{{$item->title}}</p>
					</div>
				</a>
			</div>
				@endforeach
			@else
			<p>Нет результатов</p>
		@endif
		</div>	
	</div>
</section>





<!-- ************************************************************************************** -->
@include('usefulLinks')


@stop