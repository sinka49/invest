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
					<li class="activeItem"><a href="/admin/change/mediaRed">Редактирование слайдов</a></li>
					<li><a href="/admin/change/settingSlider">Настройка слайдов</a></li>
					<li><a href="/admin/change/settingMediaSlider">Слайдер медиа</a></li>
				</ul>
			</div>
		</div>
	</section>

	<section>
		<div class="settingsUsefulLinks">
			<h3>Редактирование слайдов </h3>
			<ul class="redSlide">
				@foreach($items as $item)
					<li><a href="/admin/settings/slide/{{$item->id}}">{{$item->title}}</a></li>
				@endforeach
			</ul>
			<br>
			<br>
			<form action="/admin/settings/slideremove" class="menuSlideDelete">
				<h3>Удаление слайда</h3>

				<select name="slides" id="">
					<option value="0">Выберите пункт</option>
					@foreach($items as $item)
						<option value="{{$item->id}}">{{$item->title}}</option>
					@endforeach
				</select>

				<button type="submit">Удалить слайд</button>
			</form>
		</div>
		</section>


		<!--  -->
		@stop