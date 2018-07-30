
<ul>
    @foreach($right as $m)

            <li >
                <a href="{{$m->link}}"><span>{{($local=="ru")?$m->title:$m->title_en}}</span></a>
            </li>


    @endforeach
   <!--<li class="navOfferJS">
       <a><span>Пример</span></a>
        <p><a href="#">Impedit.</a></p>
    </li>-->

</ul>