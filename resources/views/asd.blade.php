@extends('uniquePage')
@section('main')<!--  Уникальная страница -->
<section>
    @if(count($media))<div class="media" style="height: 432px;">@include('mediaSlide')</div>@endif

        <?$data = json_decode($item->description);?>
        @foreach($data as $d)
            <div class="objectivesProj">
                <h3>{{$d->title}}</h3>
                <p>{!!$d->d!!}</p>
            </div>
        @endforeach


       <div class="costProject">
           @if(strlen($item->price)>1) <h3>ОРИЕНТИРОВАЧНАЯ СТОИМОСТЬ ПРОЕКТА</h3>
        <p> {{$item->price}} </p> @endif
        <button class="OpenPopUpForm">СТАТЬ ИНВЕСТОРОМ</button>
    </div>
</section>
<!--************************** PopUp form **************************-->
    <div class="goInvestForm">
        <div class="goInvestFormBlock">
            <h3>Стать инвестором <div class="goInvestFormBlockCloseForm"></div></h3>
            <div class="sendMessage">
                <p>Отправьте сообщение</p>
            </div>

            <form action="/messages/project" method="POST" class="goInvForm">
                {{csrf_field()}}
                <div class="goInvForm__group">   
                    <input type="text" name="goInvFormFIO"  required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Фамилия Имя Отчество</label>
                </div>


                <div class="goInvForm__group">      
                    <input type="email" name="goInvFormEmail" class="goInvFormEmail"  required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label class="goInvFormLabel">Email</label>
                </div>

                <div class="goInvForm__group">   
                    <input type="text" name="goInvFormCompany"  required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Компания</label>
                </div>

                <div class="goInvForm__group">   
                    <input type="text" name="goInvFormMessage"  required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Сообщение</label>
                </div>

                <label class="labelFile">
                    <div class="file">
                        <div class="file__img"><img src="/public/images/prikrepitFile.png" alt=""></div>
                        <div class="file__text">Прикрепить файл</div>
                    </div>
                    <input type="file" class="fileInpt">
                </label>
                
                <button type="submit" class="goInvForm__button">Отправить</button>

            </form>
        </div>
    </div>
    <!--********************* End PopUp form *********************-->
@stop