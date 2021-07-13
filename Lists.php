<?php
$data  = @json_decode(file_get_contents('data.json'),true);
if(!is_array($data)){
	$data = [
		 'items' => []
		];
}

if(count($_POST) > 0) {
}
	
if(isset($_POST['addNew']) && !empty($_POST['addNew'])) 
	{
	 	$data['items'][] = ['text' =>$_POST['addNew']];
}

file_put_contents('data.json', json_encode($data, JSON_PRETTY_PRINT));
?>


<html>
<head>
	 <title>ToDo</title>
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
	 <ul>
	<? foreach($data['items'] as $index => $item) { ?>
	 <li>
	 	 <form method="POST">
	 	 	 <?=$item['text']?>
	 	 </form>
	 </li>
<? } ?>
</ul>
	 <form method="POST">
	 	 <input type="text" name="addNew" placeholder="Pievienot uzdevumu..."
autofocus/>
	 	 <input type="submit" value="Pievienot"/>
</form>
</body>
</html>