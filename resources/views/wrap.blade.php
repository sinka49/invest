<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/normalize.min.css">
    <link rel="stylesheet" href="/public/css/animate.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/fonts.css">
    <link rel="stylesheet" href="/public/css/owl.carousel.css">
    <link rel="stylesheet" href="/public/css/swiper.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="/public/fonts/font-awesome/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="/public/js/swiper.jquery.min.js"></script>
    <script src="/public/js/owl.carousel.min.js"></script>
    <script src="/public/js/goalProgress.js"></script>
    <script src="/public/js/jquery.viewportchecker.js"></script>
    <script src="/public/js/scripts.js"></script>

</head>
<body>
    <header>
            <?php
            if ($local == 'en'){
                $cookie= '/ru/en';

            }
            else{

                $cookie= 'ru';
            }
            setcookie("googtrans", $cookie);
            ?>
          <div class="topHeader">
            <div class="topHeader__container centerBlock">
                <div class="mainLogo">
                    <a href="/" class="logoHeader">
                        <img src="/public/images/logo.png" alt="Logo">
                    </a>

                    <div class="singleWindow">
                        <a href="/ru/direct">
                        <div class="singleWindow__img"><img src="/public/images/singleWinMenu.png" alt=""></div>
                            <div class="singleWindow__text">
                                <h3><span>{{trans("menu.com")}}</span> {{trans("menu.direct")}}</h3>
                                <p>{{trans("menu.channel")}}</p>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="wrapperRighttopHeader">
                    <div class="wrapperRighttopHeader__top">
                        <div class="mainSearch">
                            <form action="/{{$local}}/search" class="formMainSearch" method="POST">
                                {{csrf_field()}}
                                <input type="text" placeholder="{{trans("menu.input_search")}}" name="mainSearch" class="formMainSearch__input">
                                <span><i class="fa fa-search" aria-hidden="true"></i></span>
                                <button type="submit" class="formMainSearch__button">{{trans("menu.btn_find")}}</button>
                            </form>

                        </div>
                        <div class="feedBackLanguage">
                            <div class="feedBack">
                                <a href="/feedBack"></a>
                                <div class="feedBack__img">
                                    <img src="/public/images/feedBack.png" alt="">
                                </div>
                                <div class="feedBack__text">
                                    {{trans("menu.contacts")}}
                                </div>
                            </div>
                            <div class="ChangeLanguage downArrow">
                                <div class="ChangeLanguage__select"><a class="ChangeLanguageLinkRu setLang" data-lang="ru" href="#"><img src="/public/images/changeLanguage.png" alt="">Русский язык </a>
                                </div>
                                <div class="ChangeLanguage__select">
                                    <a class="ChangeLanguageLinkEn setLang" data-lang="en" href="#"><img src="/public/images/changeLanguageEn.png" alt="">English </a>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="wrapperRighttopHeader__down">

                        <div class="downHeader__nav">
                            <ul>
                                @foreach($menu as $itemmenu)
                                    <li>
                                        <div class="downHeader__nav--logo">
                                            <div class="navLog1 navLog"></div>
                                        </div>
                                        <a href="{{$itemmenu->link}}">@if(!strcasecmp($local, "ru")) {{$itemmenu->title}} @else {{$itemmenu->title_en}}@endif</a>
                                        @if(count($itemmenu->items))
                                            <div class="dropNav">
                                                <div class="dropNav__content">
                                                    <ul>
                                                        @foreach($itemmenu->items as $itemMenuL1)
                                                        <li>
                                                            <a href="{{$itemMenuL1->link}}">@if($local=="ru") {{$itemMenuL1->title}} @else {{$itemMenuL1->title_en}}@endif</a>
                                                        </li>

                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                             </ul>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </header>


    @yield('content')  


    <footer class="footer">
        <div class="centerBlock">
            <div class="footer__nav">
                <ul>

                    @foreach($menu as $itemmenu)
                        <li><a href="{{$itemmenu->link}}">{{($local=="ru")?$itemmenu->title:$itemmenu->title_en}}</a></li>
                    @endforeach

                </ul>
            </div>
            <div class="footer__info">
                <div class="hotLine">
                    <div class="hotLine__text">
                        {{trans("menu.btn_hotline")}}:
                    </div>
                    <div class="hotLine__number">
                        <div class="hotLine__number--item"><i class="fa fa-phone-square" aria-hidden="true"></i> +7 (8722) 55-07-57</div>
                        <div class="hotLine__number--item"><i class="fa fa-phone-square" aria-hidden="true"></i> +7 (8722) 55-45-57</div>
                    </div>
                </div>

                <div class="footer__info--logo">
                  <a href="/"> <img src="/public/images/logFoot.png" alt=""></a>
              </div>

              <div class="footer__info--search">
                <div class="footerSearch">
                    <form action="/{{$local}}/search" class="formFooterSearch" method="POST">
                        {{csrf_field()}}
                        <input type="text" placeholder="{{trans("menu.input_search")}}" name="mainSearch" class="formFooterSearch__input">
                        <span><i class="fa fa-search" aria-hidden="true"></i></span>
                        <button href="#" class="formFooterSearch__button">{{trans("menu.btn_find")}}</button>
                    </form>

                </div>
            </div>
        </div>
          
<div class="statistic">
	<div class="statistic__left">
		<a href="http://republic05.ru/"><h3>Сайт разработан - Republic</h3></a>
	</div>
	<div class="statistic__right">
		<!-- Yandex.Metrika informer --> <a href="https://metrika.yandex.ru/stat/?id=46083015&amp;from=informer" target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/46083015/3_1_FFFFFFFF_EFEFEFFF_0_pageviews" style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="46083015" data-lang="ru" /></a> <!-- /Yandex.Metrika informer --> <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter46083015 = new Ya.Metrika({ id:46083015, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/46083015" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
	</div>
</div>


    </div>

</footer>
    <div id="google_translate_element"></div><script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'ru', includedLanguages: 'en,ru', layout: google.translate.TranslateElement.FloatPosition.BOTTOM_RIGHT, autoDisplay: false, multilanguagePage: true}, 'google_translate_element');
        }
    </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>



