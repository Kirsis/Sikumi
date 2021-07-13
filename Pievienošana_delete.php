<?php
$data  = @json_decode(file_get_contents('data.json'),true);
if(!is_array($data)){
	$data = [
		 'items' => []
		];
}

if(count($_POST) > 0) //1. uzdevuma es isti nesapratu ko si rinda dara. Tagat sapratu un pievienoju vinu.(ievietoju cikla to kam tur bija jabut)
{
if(isset($_POST['addNew']) && !empty($_POST['addNew'])) 
		{
	 		$data['items'][] = [
			'text' =>$_POST['addNew'],
			'done' => false
		];//2.seit man bija 1 kvadratiekava pa daudz.
}
	// Labojam ierakstu 
if(isset($_POST['editId'])) { 
 $id = $_POST['editId']; 
 		// Dzçðana
 		if(isset($_POST['delete'])) {
			unset($data['items'][$id]);
	} else { 
		// Atzîmçjam kâ izdarîtu / neizdarîtu 
		$data['items'][$id]['done'] = isset($_POST['done']); 
	} 
 } 
file_put_contents('data.json', json_encode($data, JSON_PRETTY_PRINT));
header('Location: .');
die();
}
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
			<input type="hidden" name="editId" value="<?=$index?>"/> <!-- 3. bija nepareizas pedinas(pareizas = ") -->
			<input type="checkbox" name="done" onchange="this.form.submit()" <?=($item['done'] ? 'checked="checked"' : '')?>/>
	 	 	<?=$item['text']?>
			<button name="delete">Dzest</button> <!-- 4. bija nepareizas pedinas pirms delete -->
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