@extends('admin.adminWrap')
@section('content')
<!--  -->
<section style="height: calc(100% - 70px); margin-left: 105px;margin-top: 70px;">

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
					<li><a href=" @if(count($item->id)) /admin/change/news @else /admin/edit/news @endif ">{{$word}} новостей</a></li>

					<li class="activeItem1"><a href=" @if(count($item->id)) /admin/change/projects @else /admin/edit/projects @endif ">{{$word}} проекта</a></li>
					<li><a href=" @if(count($item->id)) /admin/change/articles @else /admin/edit/articles @endif ">{{$word}} статей</a></li>
					<li ><a href=" @if(count($item->id)) /admin/change/pages @else /admin/edit/pages @endif ">{{$word}} уникальных страниц</a></li>

				</ul>
			</div>
		</div>
	</section>

	<section>
		<div class="addProjects">
			<h3>{{$word}} проекта</h3>
			<form action=" @if(!empty($item->id)) /admin/add/projects/{{$item->id}} @else /admin/add/projects @endif " class="addProjectsForm addPagesForm" method="POST" enctype="multipart/form-data">




				<div class="addProjectsForm__left">
                    <select name="addPages1" id="addPages1">
                        <option value="0">Нет</option>
                        @foreach($menu  as $m)
                            <option value="{{$m->id}}"  @if($parrent_cat == $m->id or $cat == $m->id) selected @endif>{{$m->title}}</option>
                        @endforeach
                    </select>
                    <? $cm = 2 ?>
                    @foreach($menu  as $m)
                        <select name="addPages{{$cm}}" id="child{{$m->id}}" class="childs" @if($parrent_cat != $m->id)  style="display:none;"  @endif>
                            <option value="0">Нет</option>
                            @foreach($m["items"]  as $mm)
                                <option value="{{$mm->id}}" @if($cat == $mm->id or $parrent_cat == $mm->id) selected @endif>{{$mm->title}}</option>
                            @endforeach
                        </select>
                        <? $cm++; ?>
                    @endforeach
					<div class="addProjectsForm__group">      
						<input type="text" name="addProjectsCaption"  required value="{{$item->title}}">
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Название проекта</label>
					</div>
					{{csrf_field()}}
					<div class="asdf" >
                  @if(isset($item->description))  <?$data = json_decode($item->description); $count = 1;?>

					@foreach($data as $d)

							<div id='c{{$count}}' class='ss'>
							<hr style='opacity: 0.4;margin: 0px 0px 20px 0px;'>
							<div class="addProjectsForm__group">
								<input type="text" name="addProjectsC{{$count}}"  required  value="{{$d->title}}">
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Заголовок пункта </label>
							</div>

							<div class="projectsEditor">
								<div id="sample">
									<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
									<script type="text/javascript">
                                        //<![CDATA[
                                        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
                                        //]]>
									</script>

									<textarea name="addProjArea{{$count}}" style="width: 100%;height: 180px;">{!!$d->d!!}</textarea><br>

								</div>


							</div>
						</div>
						<? $count++; ?>
					@endforeach

					@endif
					</div>
					<hr style='opacity: 0.4;margin: 0px 20px 20px 0px;'>
					<div class="wrapperEditProjBut">

						<div class="circlePlus" id="govno" data-count = 1><span>+</span></div>


						<div class="circlePlus" id="govno2" data-count = 1><span>-</span></div>
					</div>
					<input type="hidden" value="1" name="count" id="hidCount">


			<div class="addProjectsForm__group">      
				<input type="text" name="addProjectsPrice"  required value="{{$item->price}}">
				<span class="highlight"></span>
				<span class="bar"></span>
				<label>Ориентировачная стоимость проекта</label>
			</div>

			<button class="goProjects" type="submit">Сохранить</button>

		</div>


		<div class="addProjectsForm__right">
			<!-- Превью загружаемой картинки -->
			<div class="wrapperPrevImg">
				<label>
					<div class="customFile">
						<div class="customFile__img"></div>
						<div class="customFile__text">Добавить фото</div>
					</div>
					<div class="inptHide">
						<input name="prewImgProjects[]" class="prewImgNews" type="file" multiple>
					</div>

				</label>
				<div class="imagePrevWrapper">
					<div class="imagePrev">
						@if(count($media))
							@foreach($media as $m)
								@if(isset($m->img)) <div style="position: relative;width: 25%;margin-right: 20px;">
									<img src="{{$m->img}}" alt="" style="width:100%;"><div class="deleteNews">
										<a href="/admin/image/projects/remove/{{$m->id}}">x</a>
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
	<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
	<script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });</script>
	<script>
        $("#govno2").on("click",function () {
            var count = $(".ss").length;
            if(count){

                $("#c"+count).remove();
                count--;
                $("#hidCount").val(count);
            }
        })

        $(document).ready(function () {

            $("#govno").on("click",function () {
                var count = $(".ss").length;
                count++;
                var html = "<div id='c"+count+"' class='ss'><hr style='opacity: 0.4;margin: 0px 0px 20px 0px;'>";
                html +="<div class='addProjectsForm__group'>";
                html +="<input type='text' name='addProjectsC"+count+"'  required >";
                html +="<span class='highlight'></span>";
                html +="<span class='bar'></span>";
                html +="<label>Заголовок пункта </label>";
                html +="</div><div class='projectsEditor'><div id='sample'>";
                html +="<textarea name='addProjArea"+count+"' id='area"+count+"' style='width: 100%;height: 180px;'></textarea><br>";
                html +="</div></div></div>";
                $("#hidCount").val(count);
                $(".asdf").append(html);

                var id =  "area"+count;
                var area2 = new nicEditor({fullPanel : true}).panelInstance(id);

            })


            $("#addPages1").on("change",function () {
                $(".childs").not("#child"+$(this).val()).hide();
                $(".childs").not("#child"+$(this).val()).attr("disabled","disabled");
                $("#child"+$(this).val()).show();
                $("#child"+$(this).val()).removeAttr("disabled");
            })


			var c = $(".ss").length;
            $("#hidCount").val(c);
        })







	</script>
</section>	
<!--  -->
@stop