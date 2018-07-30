@extends('wrap')
@section('content')
<main class="newsPage">
	<div class="CAPTION">
		<div class="centerBlock">
			<div class="CAPTION__wrapper">
				<p>
					Новости
				</p>
			</div>
		</div>
	</div>

	<section class="centerBlock">
		<div class="wrapperNews">
			<div class="wrapperNews__content">
				@foreach($news as $post)
				<div class="wrapperNews__content--item">
					<a href="/ru/news/{{$post->id}}">
						<div class="newsItem__img" style="background-image: url({{$post->img}});"></div>
						<div class="newsItem__info">
							<div class="newsItem__info--date"><p>{{ $post->created_at->formatLocalized('%d-%m-%y')}}</p></div>
							<div class="newsItem__info--text"> <p>{!!$post->title!!}</p></div>
						</div>
					</a>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<section>
		<div class="loadMoreNews">
			<a class="loadMoreNews-js" href="#"  data-page ="{{$page}}">загрузить еще</a>
		</div>
	</section>
	@include('usefulLinks')
</main>
@stop