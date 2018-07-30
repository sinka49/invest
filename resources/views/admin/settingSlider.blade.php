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
					<li class="activeItem"><a href="/admin/change/settingSlider">Настройка слайдов</a></li>
					<li><a href="/admin/change/settingMediaSlider">Слайдер медиа</a></li>
				</ul>
			</div>
		</div>
	</section>

	<section>
		<div class="settingSlider">
			<h3>Настройка слайдов </h3>

			<h4>Слайд 1 (статистика)</h4>

			<form action="/admin/change/Bigslider/slide1" class="settingSliderForm" method="POST" enctype="multipart/form-data">
				<div class="blockWrapper">
					@if(count($slide1))
                        <?$data = json_decode($slide1->params); $count = 1;?>
						@foreach($data as $d)
						<div class="blockWrapper__item">
							<h4>Блок {{$count}}</h4>
							<div class="settingSliderForm__group">
								<input type="text" name="addParam{{$count}}" value="{{$d->title}}"  required >
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Введите заголовок</label>
								<h5>Не более 40 символов</h5>
							</div>

							<div class="settingSliderForm__group">
								<input type="text" name="addParamVal{{$count}}" value="{{$d->val}}"  required >
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Введите значение (число)</label>
							</div>
							<div class="settingSliderForm__group">
								<input type="text" name="addParamValText{{$count}}" value="{{$d->valText}}"  required >
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Введите значение (текст)</label>
							</div>
						</div>
						<? $count++; ?>
						@endforeach
					@else
						<div class="blockWrapper__item">
							<h4>Блок 1</h4>
							<div class="settingSliderForm__group">
								<input type="text" name="addParam1"  required >
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Введите заголовок</label>
								<h5>Не более 40 символов</h5>
							</div>

							<div class="settingSliderForm__group">
								<input type="text" name="addParamVal1"  required >
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Введите значение (число)</label>
							</div>
							<div class="settingSliderForm__group">
								<input type="text" name="addParamValText1"  required >
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Введите значение (текст)</label>
							</div>
						</div>

						<div class="blockWrapper__item">
							<h4>Блок 2</h4>
							<div class="settingSliderForm__group">
								<input type="text" name="addParam2"  required >
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Введите заголовок</label>
								<h5>Не более 40 символов</h5>
							</div>

							<div class="settingSliderForm__group">
								<input type="text" name="addParamVal2"  required >
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Введите значение (число)</label>
							</div>
							<div class="settingSliderForm__group">
								<input type="text" name="addParamValText2"  required >
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Введите значение (текст)</label>
							</div>
						</div>

						<div class="blockWrapper__item">
							<h4>Блок 3</h4>
							<div class="settingSliderForm__group">
								<input type="text" name="addParam3"  required >
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Введите заголовок</label>
								<h5>Не более 40 символов</h5>
							</div>

							<div class="settingSliderForm__group">
								<input type="text" name="addParamVal3"  required >
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Введите значение (число)</label>
							</div>
							<div class="settingSliderForm__group">
								<input type="text" name="addParamValText3"  required >
								<span class="highlight"></span>
								<span class="bar"></span>
								<label>Введите значение (текст)</label>
							</div>
						</div>
					@endif
				</div>
				<div class="addImgForm__content">
					<div class="imagePrev2" style="position: relative; width:20%;">
						@if(count($slide1->link)>0)

								<img src="{{$slide1->link}}" alt="" style="height:90px">


						@endif
					</div>
				</div>{{csrf_field()}}
				<div class="usefulLinksButtonWrapper" style="margin:0">
					<label class="CUSTOMBUTT">

						<div class="customFileDocs">
							<div class="customFileDocs__img2"></div>
							<div class="customFileDocs__text">Изменить фото</div>
						</div>
						<div class="inptHideDocs">
							<input name="prewImgSlide1" size="50"  class="prewImgNews2" type="file" >
						</div>
					</label>
				</div>
				<div style="color:#909090;; font-size: 20px; text-align: right">
					<label for="">Отображать? <input type="checkbox" value="1" @if( $slide1->visible == 1) checked @endif name="view1"></label>
				</div>
				<button type="submit">Сохранить</button>
			</form>


			<h4>Слайд 2</h4>
			<form action="/admin/change/Bigslider/slide2" class="settingSliderForm2" method="POST" enctype="multipart/form-data">
				<div class="blockWrapper" >
					@if(count($slide2))
                        <?$data = json_decode($slide2->params); $count = 1;?>
					<div class="blockWrapper__item" style="width:50%; height: 550px !important;">
						<h4>Мэр</h4>
						<div class="settingSliderForm2__group">      
							<input type="text" name="addnameMer" value="{{$data->title}}" required >
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Введите имя</label>
						</div>

						<div class="settingSliderForm2__group">      
							<textarea name="textgovno" cols="80" rows="4" placeholder="Описание">{{$data->val}}</textarea>
						</div>
						<div class="addImgForm__content">
							<div class="imagePrev1">
								@if(count($slide2->link))
									<img src="{{$slide2->link}}" alt="" style="height:90px" >
								@endif
							</div>
						</div>
						<div class="usefulLinksButtonWrapper" style="margin:0">
							<label class="CUSTOMBUTT">

								<div class="customFileDocs">
									<div class="customFileDocs__img"></div>
									<div class="customFileDocs__text">Изменить фото</div>
								</div>
								<div class="inptHideDocs">
									<input name="prewImgMer" size="50"  class="prewImgNews1" type="file"  id="customFileLink1">
								</div>
							</label>
						</div>

					</div>
						{{csrf_field()}}
						@endif
				</div>
				<div style="color:#909090;; font-size: 20px; text-align: right">
					<label for="">Отображать? <input type="checkbox" value="1" name="view2" @if( $slide2->visible == 1) checked @endif></label>
				</div>
					<button type="submit">Сохранить</button>
				</form>

		</div>
			</section>


			<!--  -->
			@stop