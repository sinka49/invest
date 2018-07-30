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
			<h3>Рассылка</h3>
			<div class="settingsOprosTop">
				<form action="/admin/settings/mail/send" class="addOpros" method="POST">

				{{csrf_field()}}

					<div class="settingsOprosTop__left">
						<div class="addOprosForm__group">      
							<input type="text" name="title"  required >
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Тема рассылки</label>
						</div>
						<div class="articlesEditor">
							<div id="sample">
								<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
								<script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });</script>

								<textarea name="text" style="width: 100%;height: 180px;">
							</textarea><br>
								<h4>
								</h4>
							</div>
						</div>
						<button type="submit" class="goProjects">Отправить</button>
					</div>
				





				</form>
				
			</div>


			<h3>Подписчики</h3>
			<div class="settingsOprosBottom">
				<div class="settingsOprosBottomWrapp">
					@foreach($items as $item)
					<div class="settingsOprosBottomWrapp__item" style="width:150px;">
						<p>{{$item->email}}</p>

					</div>
					@endforeach
				</div>
			</div>




		</div>


	</section>






	<!--  -->
	@stop