<main>
	<section>
		<aside>aside</aside>
		<?php
			$actual_link = substr("$_SERVER[REQUEST_URI]",5);
			if($actual_link == "/") {include 'content/home.php';}
			else{
				$actual_link = explode("?",$actual_link);
				include 'content'.$actual_link[0];
			}
		?>
	</section>
</main>