@extends('admin.adminWrap')
@section('content')
<!--  -->
<section style="height: calc(100% - 70px);margin-left: 105px;margin-top: 70px;">
	@include('admin.editTopPanel')

	<section>
		<div class="addContent">
			<div class="addContent__header">
				<a href="/admin/home">
					<div class="addContent__header--arrow">
						<div class="imgArrow"></div>
					</div>
				</a>
				
				<ul>
					<li><a href="/admin/change/news">Редактирование новостей</a></li>
					<li class="activeItem"><a href="/admin/change/docs">Редактирование документов</a></li>
					<li><a href="/admin/change/projects">Редактирование проекта</a></li>
					<li><a href="/admin/change/articles">Редактирование статей</a></li>
					<li><a href="/admin/change/pages">Редактирование уникальных страниц</a></li>
				</ul>
			</div>
		</div>
	</section>

	<section>
		<div class="changeDocs">
			
			<div class="changeDocs__wrapper">
				<h3>Редактирование документов</h3>
				<form action="#" class="searchDocsForm">
					<div class="searchDocsForm__group">      
						<input type="text" name="searchDocs"  required >
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>Поиск</label>
						<i class="fa fa-search" aria-hidden="true"></i>
					</div>
				</form>
			</div>


			<div class="docsContent">

					<div class="docsContentItem">
						<div class="docsContentItemDelete">
							<a href="#">x</a>
						</div>
						<div class="docsContentItem__img"></div>
						<div class="docsContentItem__text">Здесь будет название документа</div>
					</div>

					<div class="docsContentItem">
						<div class="docsContentItemDelete">
							<a href="#">x</a>
						</div>
						<div class="docsContentItem__img"></div>
						<div class="docsContentItem__text">Здесь будет название документа</div>
					</div>

					<div class="docsContentItem">
						<div class="docsContentItemDelete">
							<a href="#">x</a>
						</div>
						<div class="docsContentItem__img"></div>
						<div class="docsContentItem__text">Здесь будет название документа</div>
					</div>

					<div class="docsContentItem">
						<div class="docsContentItemDelete">
							<a href="#">x</a>
						</div>
						<div class="docsContentItem__img"></div>
						<div class="docsContentItem__text">Здесь будет название документа</div>
					</div>

					<div class="docsContentItem">
						<div class="docsContentItemDelete">
							<a href="#">x</a>
						</div>
						<div class="docsContentItem__img"></div>
						<div class="docsContentItem__text">Здесь будет название документа</div>
					</div>

					<div class="docsContentItem">
						<div class="docsContentItemDelete">
							<a href="#">x</a>
						</div>
						<div class="docsContentItem__img"></div>
						<div class="docsContentItem__text">Здесь будет название документа</div>
					</div>

			</div>

		</div>


	</section>






	<!--  -->
	@stop