@extends('admin.adminWrap')
@section('content')
<!--  -->
<section style="height: calc(100% - 70px);margin-left: 105px;margin-top: 70px;">

	@include('admin.addTopPanel')

	<section>
		<div class="addContent">
			<div class="addContent__header">
				<a href="/admin/home">
					<div class="addContent__header--arrow">
						<div class="imgArrow"></div>
					</div>
				</a>
				
				<ul>
					<li class="activeItem1"><a href=" @if(count($item->id)) /admin/change/news @else /admin/edit/news @endif ">{{$word}} новостей</a></li>

					<li><a href=" @if(count($item->id)) /admin/change/projects @else /admin/edit/projects @endif ">{{$word}} проекта</a></li>
					<li><a href=" @if(count($item->id)) /admin/change/articles @else /admin/edit/articles @endif ">{{$word}} статей</a></li>
					<li><a href=" @if(count($item->id)) /admin/change/pages @else /admin/edit/pages @endif ">{{$word}} уникальных страниц</a></li>

				</ul>
			</div>
		</div>
	</section>

	<section>
		<div class="addNews">
			<h3>{{$word}} новости</h3>
			<form action="@if(!empty($item->id)) /admin/add/news/{{$item->id}} @else /admin/add/news @endif" class="addNewsForm" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}

				<div class="addNewsForm__left">					
					<div class="addNewsForm__group">      
						<input type="text" name="addNewsCaption"  required value="{{$item->title}}">
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Заголовок новости</label>
					</div>
					
					<div class="newsEditor">
						<div id="sample">
							<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
							<script type="text/javascript">
					//<![CDATA[
					bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
					  //]]>
					</script>

					<textarea name="area2" style="width: 100%;height: 180px;">{!!$item->content  !!}</textarea><br>
				
					</div>



						<div>
							<input type="date" name="date" @if($item->created_at) value="{{$item->created_at->formatLocalized('%Y-%m-%d')}}" @endif>
						</div>


				</div>
					<div>
						<p for="">Публиковать на главной? <input type="checkbox" @if($item->published) checked @endif style="-webkit-appearance: checkbox;width: 15px; display: inline; height: 15px;" name="published"></p>
					</div>
				<button class="goNews">Сохранить</button>

			</div>


			<div class="addNewsForm__right">
				<!-- Превью загружаемой картинки -->

				<div class="wrapperPrevImg">
					<label>
						<div class="customFile">
							<div class="customFile__img"></div>
							<div class="customFile__text">Добавить фото</div>
						</div>
						<div class="inptHide">
							<input name="prewImgNews[]" class="prewImgNews" type="file" multiple>
						</div>

					</label>
					<div class="imagePrevWrapper">
						<div class="imagePrev">
							@if(count($media))
								@foreach($media as $m)
									@if(isset($m->img)) <div style="position: relative; width:25%;">
										<img src="{{$m->img}}" alt="" style="width:100%;"><div class="deleteNews">
											<a href="/admin/image/news/remove/{{$m->id}}">x</a>
										</div>
									</div>@endif
								@endforeach
							@endif
						</div>
					</div>

				</div>

			</div>

</form>
</div>	
</section>


</section>	




<!--  -->
@stop