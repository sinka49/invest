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
    <script src="/public/js/scripts.js"></script>
</head>
<body>
    <header>
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
                                <h3><span>Прямая</span> связь</h3>
                                <p>Канал прямой связи с администрацией</p>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="wrapperRighttopHeader">
                    <div class="wrapperRighttopHeader__top">
                        <div class="mainSearch">
                            <form action="#" class="formMainSearch">
                                <input type="search" placeholder="{{trans("menu.input_search")}}" name="mainSearch" class="formMainSearch__input">
                                <span><i class="fa fa-search" aria-hidden="true"></i></span>
                                <a href="#" class="formMainSearch__button">{{trans("menu.btn_find")}}</a>
                            </form>

                        </div>
                        <div class="feedBackLanguage">
                            <div class="feedBack">
                                <a href="/feedBack"></a>
                                <div class="feedBack__img">
                                    <img src="/public/images/feedBack.png" alt="">
                                </div>
                                <div class="feedBack__text">
                                    Контакты
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
                                        <a href="{{$itemmenu->link}}">{{$itemmenu->title}}</a>
                                        @if(count($itemmenu->items))
                                            <div class="dropNav">
                                                <div class="dropNav__content">
                                                    <ul>
                                                        @foreach($itemmenu->items as $itemMenuL1)
                                                        <li>
                                                            <a href="{{$itemMenuL1->link}}">{{$itemMenuL1->title}}</a>
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
                    <li><a href="#">{{trans("menu.investment_activity")}}</a></li>
                    <li><a href="#">Инвестору</a></li>
                    <li><a href="#">Малое и среднее предпринимательство</a></li>
                    <li><a href="#">Медиа</a></li>
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
                    <form action="#" class="formFooterSearch">
                        <input type="search" placeholder="{{trans("menu.input_search")}}" name="footerSearch" class="formFooterSearch__input">
                        <span><i class="fa fa-search" aria-hidden="true"></i></span>
                        <a href="#" class="formFooterSearch__button">{{trans("menu.btn_find")}}</a>
                    </form>

                </div>
            </div>
        </div>
    </div>

</footer>

</body>
</html>

