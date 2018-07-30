@extends('admin.adminWrap')
@section('content')
<!--  -->
<section style="height: calc(100% - 70px);margin-left: 105px;margin-top: 70px;">
	@include('admin.settingsTopPanel')

	<section>
		<div class="addContent">
			<div class="addContent__header">
				<a href="/admin/home">
					<div class="addContent__header--arrow">
						<div class="imgArrow"></div>
					</div>
				</a>
				
				<ul>
					<li class="activeItem"><a href="/admin/settings/opros">Настройка опроса</a></li>
					<li><a href="/admin/settings/usefullink">Настройка полезных ссылок</a></li>
					<li><a href="/admin/settings/menu">Настройка пунктов меню</a></li>
					<li><a href="/admin/settings/ad">Настройка объявлений</a></li>
					<li><a href="/admin/settings/red">Красное меню</a></li>
					<li><a href="/admin/settings/mail">Рассылка</a></li>
				</ul>
			</div>
		</div>
	</section>

	<section>
		<div class="settingsOpros">
			<h3>Добавление опроса</h3>
			<div class="settingsOprosTop">
				<form action="/admin/settings/opros" class="addOpros" method="POST">

{{csrf_field()}}

					<div class="settingsOprosTop__left">
						<div class="addOprosForm__group">      
							<input type="text" name="addOpros"  required >
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Заголовок опроса</label>
						</div>
						<label class="labelKolichestvo" >Колличество вариантов ответа
							<select name="kolichestvo" id="kolichestvo">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
							</select>
						</label>
						<button type="submit" class="goProjects">Добавить опрос</button>
					</div>
				

					<div class="settingsOprosTop__right">
						
						<div class="addOprosForm__group addOprosForm__group1">      
							<input type="text" name="addOprosCaption1"   >
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>1 пункт</label>
						</div>

						<div class="addOprosForm__group addOprosForm__group2">
							<input type="text" name="addOprosCaption2"   >
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>2 пункт</label>
						</div>

						<div class="addOprosForm__group addOprosForm__group3">
							<input type="text" name="addOprosCaption3"   >
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>3 пункт</label>
						</div>

						<div class="addOprosForm__group addOprosForm__group4">
							<input type="text" name="addOprosCaption4"   >
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>4 пункт</label>
						</div>

						<div class="addOprosForm__group addOprosForm__group5">
							<input type="text" name="addOprosCaption5"   >
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>5 пункт</label>
						</div>

						<div class="addOprosForm__group addOprosForm__group6">
							<input type="text" name="addOprosCaption6"   >
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>6 пункт</label>
						</div>

					</div>



				</form>
				
			</div>



			<div class="settingsOprosBottom">
				<div class="settingsOprosBottomWrapp">
					@foreach($items as $item)
					<div class="setOpW">
						<div class="settingsOprosBottomWrapp__item">
							<p>{{$item->title}}</p>
							<a href="/admin/settings/opros/remove/{{$item->id}}">
								<div class="settingsOprosBottomWrapp__delete"><span>x</span></div>
							</a>
						</div>

						<div>
							@foreach($item["items"] as $r)

								<div class="inpWrapper">
									<p>{{$r["title"]}} - {{$r["res"]}}%</p>
								</div>
							@endforeach
						</div>
					</div>
					@endforeach
				</div>
			</div>




		</div>


	</section>






	<!--  -->
	@stop