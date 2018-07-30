	<div class="changeArticles__wrapper">
		<h3>Редактирование уникальных страниц</h3>
		<form action="/admin/search/pages" class="searchArticlesForm" method="POST">
			<div class="searchArticlesForm__group">      
				<input type="text" name="search" @if(isset($search)) value="{{$search}}" @endif required >
				<span class="highlight"></span>
				<span class="bar"></span>
				{{csrf_field()}}
				<label>Поиск</label>
				<i class="fa fa-search" aria-hidden="true"></i>
			</div>
		</form>
	</div>


	<div class="articlesContent">
		@foreach($items as $item)

			<div class="articlesContentItem">

				<div class="hrAdm"></div>
				<div class="articlesContentItem__wrapper">
					<div class="articlesContentItem__left">

						<p>{{App\Menu::find($item->cat_id)->title}}</p>

					</div>

					<div class="articlesContentItem__center">{{ $item->created_at->formatLocalized('%d-%m-%y')}}</div>
					<div class="articlesContentItem__right">
						<a href="/admin/edit/pages/{{$item->id}}"><div class="articlesContentItem__right--change">
							<p>Редактировать</p>
						</div></a>
						<a href="/admin/remove/pages/{{$item->id}}"><div class="articlesContentItem__right--delete">
							<p>Удалить</p>
						</div></a>
					</div>
				</div>
				<div class="hrAdm"></div>
			</div>



@endforeach



	</div>
	{{ $items->links() }}