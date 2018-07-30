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
					<li><a href="/admin/edit/news">Добавление новостей</a></li>
					<li class="activeItem"><a href="/admin/edit/docs">Добавление документов</a></li>
					<li><a href="/admin/edit/projects">Добавление проекта</a></li>
					<li><a href="/admin/edit/articles">Добавление статей</a></li>
					<li><a href="/admin/edit/pages">Добавление уникальных страниц</a></li>
				</ul>
			</div>
		</div>
	</section>

	<section>
		<div class="addDocs">
			<h3>Добавление документа</h3>

			<form action="#" class="addDocsForm">
				<div class="addDocsButtonWrapper">
					<label class="CUSTOMBUTT">
						<div class="customFileDocs">
							<div class="customFileDocs__img"></div>
							<div class="customFileDocs__text">Выбрать документы</div>
						</div>
						<div class="inptHideDocs">
							<input name="prewDocs" size="50" required multiple class="asdasd" type="file" id="customFileDocs1" >

						</div>
					</label>

					<button type="submit">Добавить документы</button>
				</div>

				<div class="addDocsForm__content">

				</div>
				

			</form>
			

		</div>
	</section>


</section>	
<!--  -->
@stop