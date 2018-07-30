<section>
    <div class="usefulLinks centerBlock">
        <h2>ПОЛЕЗНЫЕ ССЫЛКИ</h2>
        <div class="usefulLinks__wrapper">
            @foreach($linkItems as $item)
                <div class="usefulLinks__wrapper--item">
                    <a href="{{$item->link}}" target="_blank"></a>
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


    </div>

</section>