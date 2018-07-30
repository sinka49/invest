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
					<li class="activeItem"><a href="/admin/settings/usefullink">Настройка полезных ссылок</a></li>
					<li><a href="/admin/settings/menu">Настройка пунктов меню</a></li>
					<li><a href="/admin/settings/ad">Настройка объявлений</a></li>
					<li><a href="/admin/settings/red">Красное меню</a></li>
					<li><a href="/admin/settings/mail">Рассылка</a></li>
				</ul>
			</div>
		</div>
	</section>

	<section>
		<div class="settingsUsefulLinks">
			<h3>Добавление полезных ссылок</h3>

			<form action="/admin/settings/add/link" class="settingsUsefulLinksForm" method="POST" enctype="multipart/form-data">
				<div class="usefulLinksButtonWrapper">
					{{csrf_field()}}
					<label class="CUSTOMBUTT">

						<div class="customFileDocs">
							<div class="customFileDocs__img"></div>
							<div class="customFileDocs__text">Загрузить иконку</div>
						</div>
						<div class="inptHideDocs">
							<input name="prewLink" size="50" required  class="prewImgNews" type="file"  id="customFileLink1">
						</div>
					</label>

					<button type="submit">Добавить ссылку</button>
				</div>
				<div class="linkFormInputwrapper">
					<div class="linkFormInputwrapper__left">
						<div class="settingsUsefulLinksForm__group">      
							<input type="text" name="siteNameLink" id="siteNameLink"  required >
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Название сайта</label>
						</div>

						<div class="settingsUsefulLinksForm__group">      
							<input type="text" name="siteAdressLink" id="siteAdressLink" required >
							<span class="highlight"></span>
							<span class="bar"></span>
							<label>Адрес сайта</label>
						</div>
					</div>

					<div class="linkFormInputwrapper__right">
						<div class="usefulLinks__wrapper--item">

							<div id="i" class="usefulLinks__item--logo imagePrev" style="overflow:hidden;">

							</div>
							<div class="usefulLinks__item--text">
								<span id="t"></span> <br>
								<span id="l"></span>
							</div>
						</div>


					</div>
					

				</div>
				
			</form>



			<div class="usefulLinksContainer">
				@foreach($items as $item)
				<div class="usefulLinks__wrapper--item">
					<a href="{{$item->link}}"></a>
					<a href="/admin/settings/remove/link/{{$item->id}}" class="deleteLinks"><span>x</span></a>
					<div class="usefulLinks__item--logo">
						<img src="{{$item->img}}" alt="">
					</div>
					<div class="usefulLinks__item--text">
						{{$item->title}}<br>
						{{$item->link}}
					</div>
				</div>
					@endforeach
			</div>
			

		</section>

<script>
    $(document).ready(function(){
// checker **************************************************
    var prewImgNews = $(".prewImgNews");
    prewImgNews.change(() => {
        var preview = document.querySelector('.imagePrev');
    	var files   = document.querySelector('input[type=file]').files;
		$("#t").html($("#siteNameLink").val());
        $("#l").html($("#siteAdressLink").val());
    function readAndPreview(file) {

        // Расширение у выбранного фото
        if ( /\.(jpe?g|png|gif)$/i.test(file.name)) {
            var reader = new FileReader();
            preview.innerHTML= "";
            reader.addEventListener("load", function () {
                var image = new Image();
                image.src = this.result;
                preview.appendChild( image );
            }, false);

            reader.readAsDataURL(file);
        };

    };

    if (files) {
        [].forEach.call(files, readAndPreview);
    };

    });
        $("#siteNameLink").on("change", function () {
            $("#t").html($("#siteNameLink").val());
            $("#l").html($("#siteAdressLink").val());
        })
        $("#siteAdressLink").on("change", function () {
            $("#t").html($("#siteNameLink").val());
            $("#l").html($("#siteAdressLink").val());
        })

	/*doc.ready-end*/
    });
</script>




		<!--  -->
		@stop