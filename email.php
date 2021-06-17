<?
    session_start();
    require_once("function.php");
    require_once("db.php");
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
	
    <title>Апартаменты</title>
</head>

<body>

   <? require_once("header.php");?>
<div  class="container_header allDisp">
        <h3 class="section_suptitle">Есть вопросы? Напишите нам!</h3>
        <form  method="post"  class="myForm">
            <p id="sendEr"></p>
            <input  required  name="email" class="input" type="text" placeholder="Введите ваш email">
            <br>
            <textarea name="userText" placeholder="Ваше сообщение"></textarea>
            <br>

            <input type="submit" class="input_form" value="Отправить">
        </form>
</div>


<?
    if(isset($_POST['email'])){
        mail("test@mail.ru","Обратная связь", $_POST['userText'], $_POST['email']);
        
    }
?>

   <? require_once("footer.php");?>
</body></html>