

<a href="?module=users&option=Login&view=logout&id_user=<?=base64_encode(session_id());?>">Logout</a>
<?php 

foreach($view_login as $item):

	echo $item->title .'<br />';

endforeach;	
?>