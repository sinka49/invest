
<div class="changeNews__wrapper">
	<h3>Редактирование проектов</h3>
	<form action="/admin/search/projects" class="searchNewsForm" method="POST">
		<div class="searchNewsForm__group">      
			<input type="text" name="search" @if(isset($search)) value="{{$search}}" @endif required >
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Поиск</label>
			{{csrf_field()}}
			<i class="fa fa-search" aria-hidden="true"></i>
		</div>
	</form>
</div>
<div class="wrapperNews__content">
	@foreach($items as $item)
	<div class="wrapperNews__content--item">
		<div class="deleteNews">
			<a href="/admin/remove/projects/{{$item->id}}">x</a>
		</div>
		<a href="/admin/edit/projects/{{$item->id}}">
			<div class="newsItem__img" style="background-image: url({{$item->img}});"></div>
			<div class="newsItem__info">
				<div class="newsItem__info--date"><p>{{ $item->created_at->formatLocalized('%d-%m-%y')}}</p></div>
				<div class="newsItem__info--text"> <p>{{$item->title}}</p></div>
			</div>
		</a>
	</div>
		@endforeach


	

</div>{{ $items->links() }}