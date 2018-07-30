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
					<li><a href="/admin/settings/opros">Настройка опроса</a></li>
					<li><a href="/admin/settings/usefullink">Настройка полезных ссылок</a></li>
					<li class="activeItem"><a href="/admin/settings/menu">Настройка пунктов меню</a></li>
					<li><a href="/admin/settings/ad">Настройка объявлений</a></li>
					<li><a href="/admin/settings/red">Красное меню</a></li>
					<li><a href="/admin/settings/mail">Рассылка</a></li>
				</ul>
			</div>
		</div>
	</section>

	<section>
		<div class="settingsUsefulLinks">
			
			<div class="menuFormWrapper">
				<form action="/admin/settings/menu/add" class="settingsMenuFormAdd" method="POST">
					{{csrf_field()}}
				<h3>Добавление пунктов меню</h3>
					<select name="menuSelect1" id="">
						<option value="0">Корень</option>
						@foreach($items  as $m)
							<option value="{{$m->id}}">{{$m->title}}</option>
						@endforeach
					</select>

					<select name="typeMenu" id="typeMenu">
						<option value="1">Категория статей</option>
						<option value="4">Категория инвест. проектов</option>
						<option value="2">Уникальная страница</option>
						<option value="3">Ссылка</option>
					</select>

					<div class="settingsMenuFormAdd__group" id="ss3" style="display: none">
						<input type="text" name="link">
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Веедите ссылку</label>
					</div>

					<div class="settingsMenuFormAdd__group">      
						<input type="text" name="siteNameLink"  required >
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Название (рус)</label>
					</div>
					<div class="settingsMenuFormAdd__group">
						<input type="text" name="siteNameLinkEn"  required >
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Название (en)</label>
					</div>




					<button type="submit">Добавить пункт меню</button>

				</form>


				<form action="/admin/settings/menu/remove" class="settingsMenuFormDelete" method="POST">
					<h3>Удаление пунктов меню</h3>
					{{csrf_field()}}
					<select name="menuSelectRemove1" id="menuSelectRemove1">
						@foreach($items  as $m)
							<option value="{{$m->id}}">{{$m->title}}</option>
						@endforeach
					</select>
					@foreach($items  as $m)
						<select name="menuSelectRemove2" id="child{{$m->id}}" class="childs" style="display:none;">
								<option value="0">Удалить родителя</option>
								@foreach($m["items"]  as $mm)
								<option value="{{$mm->id}}">{{$mm->title}}</option>
							@endforeach
						</select>
					@endforeach
					<button type="submit">Удалить пункт меню</button>
				</form>

			</div>
			<div>
				<br><br>
				<h3>Редактирование  пунктов меню</h3>
				<form action="/admin/settings/menu/edit"  method="POST">
					{{csrf_field()}}
				<table class="tm">
					<thead>

						<td>#</td>
						<td>Название (рус)</td>
						<td>Название (en)</td>
						<td>Ссылка</td>
						<td>Родитель</td>
						<td>Тип</td>
						<td>Приоритет</td>


					</thead>


						@foreach($items  as $m)
							<tr>
								<td>{{$m->id}}</td>
								<td class="settingsMenuFormAdd__group"><input type="text" name="t{{$m->id}}" value="{{$m->title}}"><span class="highlight"></span>
									<span class="bar"></span></td>
								<td class="settingsMenuFormAdd__group"><input type="text" name="te{{$m->id}}" value="{{$m->title_en}}"><span class="highlight"></span>
									<span class="bar"></span></td>
								<td class="settingsMenuFormAdd__group"><input type="text" name="l{{$m->id}}" value="{{$m->link}}"><span class="highlight"></span>
									<span class="bar"></span></td>
								<td>
									<select name="par{{$m->id}}">
										<option value="0">Корень</option>
										@foreach($items  as $mF)
											@if($mF->id == $m->parrent_id)
												<option value="{{$mF->id}}" selected>{{$mF->title}}</option>
											@else
												<option value="{{$mF->id}}">{{$mF->title}}</option>
											@endIf
										@endforeach
									</select>

								</td>
								<td>
									@if($m->type > 0)
									<select name="type{{$m->id}}">
										<option value="1" @if($m->type == 1) selected @endif>Категория статей</option>
										<option value="4" @if($m->type == 4) selected @endif>Категория инвест.проектов</option>
										<option value="2" @if($m->type == 2) selected @endif>Уникальная страница</option>
										<option value="3" @if($m->type == 3) selected @endif>Ссылка</option>

									</select>
									@else
										<input type="hidden" name="type{{$m->id}}" value="0">
										Недоступно для изменения
									@endif
								</td>
								<td><input type="number" min="0" value="{{$m->priority}}" name="p{{$m->id}}"></td>


							</tr>
							@foreach($m["items"]  as $mm)
								<tr>
									<td>{{$mm->id}}</td>
									<td class="settingsMenuFormAdd__group"><input type="text" name="t{{$mm->id}}" value="{{$mm->title}}"><span class="highlight"></span>
										<span class="bar"></span></td>
									<td class="settingsMenuFormAdd__group"><input type="text" name="te{{$mm->id}}" value="{{$mm->title_en}}"><span class="highlight"></span>
										<span class="bar"></span></td>
									<td class="settingsMenuFormAdd__group"><input type="text" name="l{{$mm->id}}" value="{{$mm->link}}"><span class="highlight"></span>
										<span class="bar"></span></td>
									<td>
										<select name="par{{$mm->id}}">
											<option value="0">Корень</option>
											@foreach($items  as $mF)
												@if($mF->id == $mm->parrent_id)
													<option value="{{$mF->id}}" selected>{{$mF->title}}</option>
												@else
													<option value="{{$mF->id}}">{{$mF->title}}</option>
													@endIf
													@endforeach
										</select>
									</td>
									<td>
										@if($mm->type > 0)
										<select name="type{{$mm->id}}">
											<option value="1" @if($mm->type == 1) selected @endif>Категория статей</option>
											<option value="4" @if($mm->type == 4) selected @endif>Категория инвест.проектов</option>
											<option value="2" @if($mm->type == 2) selected @endif>Уникальная страница</option>
											<option value="3" @if($mm->type == 3) selected @endif>Ссылка</option>

										</select>
										@else
											<input type="hidden" name="type{{$mm->id}}" value="0">
											Недоступно для изменения
										@endif
									</td>
									<td><input type="number" min="0" value="{{$mm->priority}}" name="p{{$mm->id}}"></td>

								</tr>
							@endforeach
						@endforeach

				</table>
					<br><br>
					<div class="settingsMenuFormDelete"><button type="submit">Сохранить</button></div>
					<br><br>
				</form>
			</div>
			<script>
                $(document).ready(function(){

                    $("#menuSelectRemove1").on("change",function () {
                        $(".childs").not("#child"+$(this).val()).hide();
                        $(".childs").not("#child"+$(this).val()).attr("disabled","disabled");
                        $("#child"+$(this).val()).show();
                        $("#child"+$(this).val()).removeAttr("disabled");
                    })

                    $("#typeMenu").on("change",function () {
                       if($(this).val()=="3"){
						$("#ss3").slideDown();
					   }
					   else if($("#ss3").is(":visible")){
                           $("#ss3").slideUp();
					   }
                    })


                })
			</script>


			<!--  -->
			@stop