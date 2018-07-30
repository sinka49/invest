	<div class="changeArticles__wrapper">
		<h3>Редактирование статьи</h3>
	</div>
	<form action="#" class="changeArticlesEditorForm">

		<div class="changeArticlesEditorForm__group">      
			<input type="text" name="changeArticlesEditorCaption"  required value="">
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Заголовок статьи</label>
		</div>


		<div class="articlesEditor">
			<div id="sample">
				<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
				<script type="text/javascript">
							//<![CDATA[
							bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
					 	 //]]>
					 	</script>

					 	<textarea name="changeNews" style="width: 100%;height: 180px;"></textarea><br>

					 </div>
					 <div class="addArticlesForm__right--buttons">

					 <label class="CUSTOMBUTT1 CCC">
					 		<div class="customFileImg">
					 			<div class="customFileImg__img"></div>
					 			<div class="customFileImg__text">Выбрать медиа</div>
					 		</div>
					 		<div class="inptHideImg">
					 			<input name="prewImgNews[]"  multiple  class="addArticlesMedia" type="file" >
					 		</div>
					 	</label>

					 	<label class="CUSTOMBUTT1 CCC">
					 		<div class="customFileDocs">
					 			<div class="customFileDocs__img"></div>
					 			<div class="customFileDocs__text">Выбрать документы</div>
					 		</div>
					 		<div class="inptHideDocs">
					 			<input name="prewDocsNews[]" size="50"  multiple class="asdasd" type="file" id="customFileDocs1" >
					 		</div>
					 	</label>



					 </div>	

					 <div class="addImgForm__content">
					 	<div class="articlesImagePrev"></div>
					 </div>
					 <div class="addDocsForm__content">

					 </div>



					 <!-- ********** -->

					</div>

					<button type="submit">Сохранить изменения</button>

				</form>