<?php
include "seguridad.php"


?>


<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
		
		<span class="glyphicon glyphicon-user"></span>
		
		<p id="member"><?php echo $_SESSION["usuario"];?> <span class="glyphicon glyphicon-menu-down"></span>
			<br>


			<ol id="admin">
				<li><a href="salir.php"><span class="glyphicon glyphicon-remove"></span>Salir</a></li>
			</ol>

		</p>

	</div>
