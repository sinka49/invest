@extends('admin.adminWrap')
@section('content')
<!--  -->
<section style="height: calc(100% - 70px);margin-left: 105px;margin-top: 70px;">
	@include('admin.notificationTopPanel')
	@include('admin.popUpDeleteNotifications')
	<section>
		<div class="addContent">
			<div class="addContent__header">
				<a href="/admin/home">
					<div class="addContent__header--arrow">
						<div class="imgArrow"></div>
					</div>
				</a>
				
				<ul>
					<li class="activeItem"><a href="/admin/notification/window">Единое окно</a></li>
					<li><a href="/admin/notification/directcommunication">Прямая связь с администрацией</a></li>
					<li><a href="/admin/notification/goinvest">Стать инвестором</a></li>
				</ul>
			</div>
		</div>
	</section>

	<section>
		<div class="notificationblabla">
			<div class="notifications1__wrapper">
				<h3>Заявки с Единого окна</h3>
			<form action="/admin/notification/search" class="searchNotifications">
					<div class="searchNotifications1Form__group">
						<input type="text" name="searchNotification"  required >
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Поиск</label>
						<i class="fa fa-search" aria-hidden="true"></i>
					</div>
				</form>
			</div>

			<div class="windowContent">
				<div class="windowContent__top">
					<ul>
						<li style="width: 100%;max-width: 285px;">Email</li>
						<li style="width: 100%;max-width: 400px;">Вопрос</li>
						<li style="width: 100%;max-width: 265px;">Дата</li>
					</ul>
				</div>
				<div class="windowContent__bottom">
					@foreach($items as $item)
                        <? $data = json_decode($item->data)?>
					<div class="infoItem @if($item->checked != 1) nch @endif" data-id="{{$item->id}}" >
						<div class="infoItem__left">
							<p>@if(strlen($data->name)){{$data->name}}@endif - @if(strlen($data->tel)){{$data->tel}}@endif</p>
							<p>@if(strlen($data->from)){{$data->from}}@endif</p>

						</div>
						<div class="infoItem__center">
							<p>{{$data->text}}</p>

							</div>
							<div class="infoItem__right">
								<p>{{$item->created_at}}</p>
								<p>Компания - {{$data->company}}</p>
							</div>
							
							<div class="infoItemDelete" data-id="{{$item->id}}"><a href="#"><span>x</span></a></div>
						</div>

					@endforeach


					</div>
				</div>


			</div>



		</section>





		<!--  -->
		@stop