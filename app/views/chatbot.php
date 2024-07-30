<?php 




 ?>

 <div class="messenger">
 	
 	<div class="top-border">
 		
 		<div class="content-holder">
 			
 			<div class="messages">
 				<!-- 
				<div class="chatbot-msg">
					<p>
						lorem ipsum dolor met............
					</p>
				</div>
				<div class="client-msg">
					<p>
						
					</p>
				</div>
 				 -->
 			</div>

 			<div class="send-message">
 				<form id="_send">
 					<textarea class="query" resize="none"></textarea>
 					<button type="submit">Enviar</button>
 				</form>
 			</div>

 		</div>

 	</div>


 </div>

  <script>
 	$(document).on('submit', '#_send', function(e){
 		e.preventDefault();
 	});
 </script>