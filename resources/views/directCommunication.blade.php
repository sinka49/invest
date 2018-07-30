@extends('wrap')
@section('content')
<!-- ************************************************************************************** -->
<div class="CAPTION">
	<div class="centerBlock">
		<div class="CAPTION__wrapper">
			<p>
				ПРЯМАЯ СВЯЗЬ
			</p>
		</div>
	</div>
</div>

<div class="centerBlock">
	<div class="directCommunicationWrapper">
		<div class="directCommunicationContent">
			<div class="directCommunicationLeft">
				<h3 class="directCommunicationLeft__caption">
					Канал прямой связи с руководством города Махачкалы и структурными подразделениями по вопросам инвестиционного развития.
				</h3>
				<form action="/direct" class="directCommunicationForm" method="POST">
					{{csrf_field()}}
					@if(Session::has('message'))<p class="message"> {{Session::get('message')}} </p>@endif
					<div class="directCommunicationForm__group">      
						<input type="text" name="directCommunicationfio"  required>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label>ФИО (Обязательно)</label>
					</div>

					<div class="directCommunicationForm__group">      
						<input type="text" name="directCommunicationCompany" required>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label class="directCommunicationLabel">Компания</label>
					</div>

					<div class="directCommunicationForm__group">      
						<input type="email" name="directCommunicationEmail" class="directCommunicationEmail"  required>
						<span class="highlight"></span>
						<span class="bar"></span>
						<label class="directCommunicationLabel">Email</label>
					</div>

					<div class="directCommunicationForm__group">      

						<textarea name="directCommunicationMessage" class="directCommunicationEmail" required cols="63" rows="10"></textarea>
						<label class="directCommunicationLabel">Сообщение</label>
					</div>

					<button type="submit" class="directCommunication__button">Отправить</button>

				</form>
			</div>
			<div class="directCommunicationRight">
				<div class="directCommunicationRight__item">
					<div class="directComLeftSect">
						<h3>Мусаев Муса Асхабалиевич</h3>
						<span>Глава города Махачкалы</span>
						<div class="hr"></div>
						<p>Адрес: 367012, г.Махачкала, пл.Ленина, 2 Телефон (рабочий): 67-21-34 <br>E-mail: info@mkala.ru</p>
					</div>
					<div class="directComRightSect" style="background-image: url(/public/images/asdasdasd.png);"></div>
				</div>


				<div class="directCommunicationRight__item">
					<div class="directComLeftSect">
						<h3>Ашиков Хаким Гамзатович</h3>
						<span>Заместитель Главы Администрации</span>
						<div class="hr"></div>
						<p>Адрес: 367012, г.Махачкала, пл.Ленина, 2<br>
							Телефон (рабочий): 67-21-49<br>
							E-mail: AshikovHG@mkala.ru </p>
					</div>
					<div class="directComRightSect" style="background-image: url(/public/images/PS1.png);"></div>
				</div>


				<div class="directCommunicationRight__item">
					<div class="directComLeftSect">
						<h3>Ибрагимов Гитиномагомед
							Ибрагимович</h3>
						<span>Начальник Управления экономического развития</span>
						<div class="hr"></div>
						<p>Адрес: г.Махачкала, пл. Ленина, 2 <br>
							Телефон (рабочий): (8722) 68-30-81 <br>
							E-mail: econom@mkala.ru </p>
					</div>
					<div class="directComRightSect" style="background-image: url(/public/images/PS2.png);"></div>
				</div>


			</div>
		</div>
	</div>
</div>





<!-- ************************************************************************************** -->
@include('usefulLinks')


@stop