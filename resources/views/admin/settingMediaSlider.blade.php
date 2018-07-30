@extends('admin.adminWrap')
@section('content')
<!--  -->
<section style="height: calc(100% - 70px);margin-left: 105px;margin-top: 70px;">
	@include('admin.mediaTopPanel')

	<section>
		<div class="addContent">
			<div class="addContent__header">
				<a href="/admin/home">
					<div class="addContent__header--arrow">
						<div class="imgArrow"></div>
					</div>
				</a>
				
				<ul>
					<li><a href="/admin/change/media">Добавление слайдов</a></li>
					<li><a href="/admin/change/mediaRed">Редактирование слайдов</a></li>
					<li><a href="/admin/change/settingSlider">Настройка слайдов</a></li>
					<li class="activeItem"><a href="/admin/change/settingMediaSlider">Слайдер медиа</a></li>
				</ul>
			</div>
		</div>
	</section>

	<section>
		<div class="settingSlider">
			<h3>Настройка слайдов медиа</h3>

			<form action="/admin/slider/mediaslider" method="POST" class="settingMediaSliderForm">
				<div class="MEDIAWRAPPER">
					<? $count = 1; ?>
					@foreach($images as $i)
						<label class="MEDIAWRAPPER__item" style="background-image: url({{$i->img}})"><div class=""><input type="checkbox" @if($i->published_main) checked @endif name="{{$count}}ch"></div></label>
							<input type="hidden" name="{{$count}}id" value="{{$i->id}}">
							<? $count++; ?>
						@endforeach
				</div>
				{{csrf_field()}}

				<button type="submit">Сохранить</button>
			</form>


			</section>


			<!--  -->
			@stop