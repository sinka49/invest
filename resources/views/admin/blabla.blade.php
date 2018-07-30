<div class="changeNews__wrapper">
	<h3>Редактирование новости</h3>
</div>
<div class="blabla">
	<div class="changeNews__left">
		<div class="wrapperNews__content">
			<div class="wrapperNews__content--item">
				<a href="#">
					<div class="newsItem__img" style="background-image: url(../../public/images/news/1.jpg);"></div>
					<div class="newsItem__info">
						<div class="newsItem__info--date"><p>111111</p></div>
						<div class="newsItem__info--text"> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, hic.</p></div>
					</div>
				</a>
			</div> 
		</div>
	</div>
	<div class="changeNews__right">
		<form action="#" class="changeNewsForm">

			<div class="changeNewsForm__group">      
				<input type="text" name="changeNewsCaption"  required value="">
				<span class="highlight"></span>
				<span class="bar"></span>
				<label>Заголовок новости</label>
			</div>

			<div class="newsEditor">
				<div id="sample">
					<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
					<script type="text/javascript">
							//<![CDATA[
							bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
					 	 //]]>
					 	</script>

					 	<textarea name="changeNews" style="width: 100%;height: 180px;"></textarea><br>

					 </div>
					 <div class="wrapperPrevImg">
					 	<label>
					 		<div class="customFile">
					 			<div class="customFile__img"></div>
					 			<div class="customFile__text">Добавить фото</div>
					 		</div>
					 		<div class="inptHide">
					 			<input name="changePrewImgNews[]" class="prewImgNews" type="file" multiple>
					 		</div>

					 	</label>
					 	<div class="imagePrevWrapper">
					 		<div class="imagePrev"></div>
					 	</div>

					 	<button type="submit" class="saveNews">Сохранить изменения</button>

					 </div>

					</div>
				</form>
			</div>


		</div>