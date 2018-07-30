@extends('uniquePage')
@section('main')

<section class="projIvs">
	@if(count($items))
		@foreach($items as $item)
			<a href="/article/{{$item->id}}">
				<div class="tab-item-investmentPro__item">
					<div class="tab-item-investmentPro__item--img" style="background-image: url({{$item->img}});"></div>
					<div class="tab-item-investmentPro__item--text">
						{{$item->title}}
					</div>
				</div>
			</a>
		@endforeach
			<div class="loadMoreNews">
				<p class="loadMoreProject-js"  onclick="ss(this)" @if($items->nextPageUrl()) data-page="{{$items->currentPage()+1}}" @else style="display:none;" @endif >загрузить еще</p>
			</div>
	@else

		<p class="empty">Пока нет записей</p>

	@endif





</section>
<script>
    function ss(th) {
        var loadMorePsButton = $(".loadMoreProject-js");
        var page =  loadMorePsButton.attr("data-page");
        console.log(page);
        $.ajax({
            type: 'GET',
            url: location.href+"?page=" +page
        }).done(function(data) {

            $(".loadMoreNews").detach();
            var data = $(data);
            var newItems = data.find('.projIvs').html();
            $(".projIvs").append(newItems);
        }).fail(function() {
            console.log('fail');
        });

        console.log(page);

        return false;

    }
</script>

@stop



