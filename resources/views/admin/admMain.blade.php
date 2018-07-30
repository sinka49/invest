@extends('admin.adminWrap')
@section('content')
<!--  -->
<section style="height: calc(100% - 70px);margin-left: 105px;margin-top: 70px;">
	<div class="admMainPage">

		<a href="/admin/edit/news">
			<div class="admMainItemWrapper">
				<div class="wrapperaue">
					<div class="admMainPage__item mItem1"></div>	
					<p>Добавить</p>
				</div>
				
			</div>
		</a>

		<a href="/admin/change/news">
			<div class="admMainItemWrapper">
				<div class="wrapperaue">
					<div class="admMainPage__item mItem2"></div>	
					<p>Редактирование</p>
				</div>
				
			</div>
		</a>

		<a href="/admin/settings">
			<div class="admMainItemWrapper">
				<div class="wrapperaue">
					<div class="admMainPage__item mItem3"></div>	
					<p>Настройки</p>
				</div>
				
			</div>
		</a>
		
	</div>
	<iframe width="560" height="315" src="https://www.youtube.com/embed/YCal46HJQGw" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
</section>

<!--  -->
@stop