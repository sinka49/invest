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
				

			</div>
		</div>
	</section>

	<section>
		<div class="notificationblabla">
			<div class="notifications1__wrapper">
				<h3>Результаты поиска по запросу - {{$key}}</h3>
				<form action="#" class="searchNotifications">
					<div class="searchNotifications1Form__group">      
						<input type="text" name="searchNotification"  required value="{{$key}}">
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
						<li style="width: 100%;max-width: 285px;">ФИО</li>
						<li style="width: 100%;max-width: 400px;">Сообщение</li>
						<li style="width: 100%;max-width: 265px;">Дата</li>
					</ul>
				</div>
				<div class="windowContent__bottom">
				@foreach($result as $item)
					<? $data = json_decode($item->data)?>
					<div class="infoItem1" data-id="{{$item->id}}">
						<div class="infoItem1__left">
							<div class="infoItem1__leftFio">
								<h4>ФИО</h4>
								@if(isset($data->name))<p>{{$data->name}}@if(isset($data->tel)) - {{$data->tel}}@endif</p>@endif
							</div>	

							<div class="infoItem1__leftEmail">
								<h4>Email</h4>
								@if(isset($data->from))<p>{{$data->from}}</p>@endif
							</div>				
							
							<div class="infoItem1__leftCompany">
								<h4>Компания</h4>
								@if(isset($data->name))<p>{{$data->company}}</p>@endif
							</div>
							
						</div>
						<div class="infoItem1__center">
							<h4>Сообщение</h4>
							@if(isset($data->text))<p>{{$data->text}}</p>@endif
							</div>
							<div class="infoItem1__right">
								<h4>Дата</h4>
								<p>{{$item->created_at}}</p>
							</div>
							
							<div class="infoItem1Delete1" data-id="{{$item->id}}"><a href="#" ><span>x</span></a></div>
						</div>
					@endforeach



					</div>
				</div>


			</div>



		</section>





		<!--  -->
		@stop