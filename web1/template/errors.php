<?php

if(count($errors)>0):?>

	<div>
	<?php
  foreach($errors as $error):
	?>

	<u style="color: white"><b><p style="color: white;"><?php echo $error;?></p></b></u>
	<?php endforeach;?>
	</div>


<?php endif; ?>

