<main>
	<section>
		<aside>aside</aside>
		<?php
			$actual_link = substr("$_SERVER[REQUEST_URI]",5);
			if($actual_link == "/") {include 'content/home.php';}
			else{include 'content'.$actual_link;}
		?>
	</section>
</main>