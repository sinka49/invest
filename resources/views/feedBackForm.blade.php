<section>
	<div class="feedBackFilterBlock">
		<div class="feedBackFormBlock">
			<h3>БУДЕМ РАДЫ ВАМ ПОМОЧЬ <div class="closeFeedBackForm"></div></h3>
			<div class="feedBhr"></div>
			<form action="/feedBack" class="feedBackForm" method="POST">
{{csrf_field()}}
				@if(Session::has('message'))<p class="message"> {{Session::get('message')}} </p>@endif
				<div class="feedBack__group">      
					<input type="text" name="directCommunicationfio"  required>
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>ФИО</label>
				</div>

				<div class="feedBack__group" style="width: 40%">      
					<input type="text" name="directCommunicationCompany" required>
					<span class="highlight"></span>
					<span class="bar"></span>
					<label class="feedBackLabel">Организация</label>
				</div>

				<div class="feedBack__group" style="width: 40%">      
					<input type="number" name="directCommunicationTel" required>
					<span class="highlight"></span>
					<span class="bar"></span>
					<label class="feedBackLabel">Телефон</label>
				</div>

				<div class="feedBack__group">      
					<input type="email" name="directCommunicationEmail" class="feedBackFormEmail"  required>
					<span class="highlight"></span>
					<span class="bar"></span>
					<label class="feedBackLabel">Email</label>
				</div>

				<div class="feedBack__group">      
					<input type="text" name="directCommunicationMessage" required>
					<span class="highlight"></span>
					<span class="bar"></span>
					<label class="feedBackLabel">Комментарий</label>
				</div>
				
				

				<div class="feedBackFText">
					<p>Нажимая на кнопку «Отправить» Вы даёте согласие на обработку своих персональных данных в соответствии со статьей 9 Федерального закона от 27 июля 2006 г. N 152-ФЗ «О персональных данных»</p>
				</div>	

				<div class="feedBhr"></div>

				<div class="feedBack__button--wrapper">
					<input type="reset" value="Сбросить" class="resetfeddBackForm"> 
					<button type="submit" class="feedBack__button">Отправить</button>
					
				</div>

			</form>
		</div>
	</div>
</section>