<?php
session_start();
require_once("db.php");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	
    <title>Апартаменты5</title>
</head>
<body>
    
    <? require_once("header.php");?>
	<div class="bg-img">
	<?if($_SESSION[userID] === null && $_SESSION[userIDM] === null):	?>
		<form  action="index.php" method="post">
			<div class="container1">
				<h1>Авторизация</h1>
				<label for="login"><b>Логин</b></label>
				<input class="input" name="login" type="text" placeholder="login">
				<label for="password"><b>Пароль</b></label>
				<input class="input"   name="password" type="password" placeholder="password">
				<br>
				<input type="submit"  class="input_form"  value="Войти">
			</div>
        </form>
	<?endif;?>
</div>
        <h3 class="section_suptitle"></h3>
        <div class="content container_header flex_row">
            <div class="flex-6  section_text">
                <p>  Апартаменты по самым доступным ценам в городе. Мы то, что Вы искали. Подбор апратаментов индивидульно для каждого покупателя! </p></div>
            <div class=" flex-6">
				<img class="block" src="homes.jpg"></img>
            </div>
        </div>
        <h3 class="section_suptitle"></h3>
        <div class="container app">
                <img src="11.jpg">
                <img src="12.jpg">
                <img src="13.jpg">
                <img src="14.jpg">
                <img src="15.jpg">
                <img src="16.jpg">

        </div>
		
		
		
		
		
		
		
		
		
		
		        <!-- Гостевая книга -->
		<?

$r=mysqli_query($dp, "SELECT * FROM Book2 ORDER BY id DESC limit 3");
while ($row=mysqli_fetch_array($r)) // для каждой записи организуем вывод.
{
	if ($c%2)
		$col="bgcolor='#f9f9f9'";  // нечетные записи
	else
		$col="bgcolor='#f0f0f0'";  // четные записи
}
?>
				<div class="flex-6  section_text">
                <p>
				<p>
				
				<h1>Гостевая книга</h1>
				</p> </p></div>
				
				
				
	<table border="0" cellspacing="3" cellpadding="0" width="90%" <? echo $col; ?> style="margin: 100px 100px;">
	<tr>
		<td width="150" style="color: #999999;">Имя пользователя:</td>
		<td><?php echo $row['idUser']; ?></td>
	</tr>
	
	<tr>
		<td width="150" style="color: #999999;">Дата публикования:</td>
		<td><?php echo $row['dataB']; ?></td>
	</tr>
	<tr>
		<td colspan="2" style="color: #999999;">----------------------------------------------------------------------------------------------------------------------------</td>
	</tr>
	<tr>
		<td colspan="2">
			<?php echo $row['Message']; ?>
			<br>
		</td>
	</tr>
	</table>


<form name="myForm" action="index.php" method="post" onSubmit="return splash();">
<input type="hidden" name="action" value="add">
<table border="0">
	<tr>
		<td width="160">
			Имя пользователя:
		</td>
		<td >
			<input name="username" style="width: 300px;">
		</td>
	</tr>
	<tr>
		<td width="160" valign="top" >
			Сообщение:
		</td>
		<td >
			<textarea name="msg" style="width: 300px;"></textarea>
		</td>
	</tr>
	<tr>
		<td width="160" >
			&nbsp;
		</td>
		<td>
			<input type="submit" value="Отправить сообщение">
		</td>
	</tr>
</table>


<!-- Проверка сообщения -->
<script>
function splash()
{
	if (document.myForm.username.value =='')
		{
			alert ("Заполните имя пользователя!");
			return false;
		}

	if (document.myForm.msg.value =='')
		{
			alert ("Заполните имя сообщения!");
			return false;
		}

	return true;
}
</script>

<!-- Форма -->
<form name="myForm" action="index.php" method="post" onSubmit="return splash();">

<?php
	include ("db.php");

// Получаем переменные из формы
$username=$_POST['username'];
$msg=$_POST['msg'];

$action=$_POST['action'];
print_r ($username, $msg);

if ($action=="add")
{

	// Добавление данных в БД
	
	$sql=mysqli_query($dp, "INSERT INTO Book2(idUser, dataB, Message) VALUES ('$username', CurDate(), '$msg')");

if ($sql)
{
	echo " Данные успешно добавлены";
}
else
{
	echo "Ошибка - ".mysqli_error($dp);

}
}
header("Location: index.php");
?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
        <!-- Статистика сайта -->
            <?
    $str=substr(basename($_SERVER["PHP_SELF"]),0,-4);
$data=date("d.m");
// определение ip -посетителя
$ip=$_SERVER["REMOTE_ADDR"];
// файл для сохранения ip
$file1="ip".$str.".txt";
//  файл для подсчета посещений, дата число посетителей за текущии сутки
$file2="count".$str.".txt";
//проверка на наличие файла
if (!file_exists($file2))
{
	$vsego=1;
	$segodny=1;
	$ipkol=1;
	$count=$vsego."\n".$data."\n".$segodny;
	//Создание нового файла для сохранения данных
	$chek=fopen($file2,"w+");
	fwrite($chek,$count);
	fclose($chek);
	$ip2=fopen($file1,"w+");
	fwrite($ip2,$ip."\n");
	fclose($ip2);
}
else
{
	  //формирование массива строк (кол-во посещений, дата,  всего посещений)
	$file=file($file2);
	foreach($file as $stroka)
	{
		$mass[]=$stroka;
	}
	$vsego=(int)$mass[0];
	$data2=(float)$mass[1];
	$segodny=(int)$mass[2];
	$vsego++;
	if($data2!=$data)
	{
	$segodny=1;}
	else
	{$segodny++;  }
//запись новой информации
$count2= $vsego."\n".$data."\n".$segodny;

    $chek=fopen($file2,"w+");
     // запирание файла
    flock($chek,LOCK_EX);
	fwrite($chek,$count2);
	// отпирание файла
	flock($chek,LOCK_UN);
	fclose($chek);
	$ip2=file($file1);
	$ipkol=count($ip2);
	if(in_array($ip."\n",$ip2)==false)
	{
	$ipopen=fopen($file1,"a");
	flock($ipopen,LOCK_EX);
	fwrite($ipopen,$ip."\n");
	 flock($ipopen,LOCK_UN);
	$ipkol++;
	fclose($ipopen);
	}
}
echo"
<h3 class='section_suptitle'>ПОСЕЩАЕМОСТЬ за $data</h3>
<table class='statNew' ><tr>
<tr><th class='title mytr'>Всего</th><th class='title mytr'>Сегодня</th></tr>
<tr><td>$vsego</td><td>$segodny</td></tr>
<tr><td>Посетителей IP: $ipkol</td></tr></table>";
?>
    <? require_once("footer.php"); ?>
</body>
</html>






    <?
        if(isset($_POST["login"])){
        $sql = 'select * from Покупатель where Логин = :id and Пароль = :pass';

        $params = [
            "id" => $_POST["login"],
            "pass" => $_POST["password"]
        ];
        
        $statement = $connection->prepare($sql);
        $statement->execute($params);
        $data1 = $statement->fetchAll(PDO::FETCH_ASSOC);  
        
        $_SESSION[ "userID" ]  = $data1[0]['idПокупатель'];
        }
    ?>