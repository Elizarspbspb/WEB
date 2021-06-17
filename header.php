<?php
session_start();
    // error_reporting(0);
?>
<header class="back">
    <div class="container_header header_inner flex_row  flex-xs-column space_around">
        <!-- <div class="flex-5 header_logo"><img src="home.svg" ></div> -->
		<? if($_SESSION[ "userID" ] ): ?>
			<a href="index.php"> <img src="home.svg" width="150" > </a> </div>
		<? elseif($_SESSION[ "userIDM" ] ): ?>
			<a href="index.php"> <img src="home.svg" width="150" > </a> </div>
		<? else: ?>
			<a href="in_admin.php"> <img src="home.svg" width="150" > </a> </div>
		<? endif; ?>
        <nav class="flex-7">
            <ul class="flex_row  space_around flex-xs-column ">
				<? if($_SESSION[ "userIDM" ] ): ?> <!-- если пользователь авторизован -->
                    <a href="account_admin.php">Профиль</a> <!--отображаем данную строчку-->
					<a href="admin_apart_del.php">Апартаменты (Del/Red)</a> <!--отображаем данную строчку-->
					<a href="admin_apart_add.php">Апартаменты (Add)</a> <!--отображаем данную строчку-->
					<a href="admin_meneger_del.php">Менеджеры (Del/Red)</a> <!--отображаем данную строчку-->
					<a href="admin_meneger_add.php">Менеджеры (Add)</a> <!--отображаем данную строчку-->
					<a href="admin_zastroy_del.php">Застройщик (Del/Red)</a> <!--отображаем данную строчку-->
					<a href="admin_zastroy_add.php">Застройщик (Add)</a> <!--отображаем данную строчку-->					
					<a href="admin_pokupatel_del.php">Покупатель (Del/Red)</a> <!--отображаем данную строчку-->
					<a href="Sdelki.php">Сделки</a> <!--отображаем данную строчку-->					
                    <a href="exit.php">Выйти</a> <!--отображаем данную строчку-->
                <? elseif($_SESSION[ "userID" ] ): ?> <!-- если пользователь авторизован -->
					<li><a href="index.php">Главная</a> </li>
				    <li><a href="catalog.php">Каталог</a> </li>
				    <li><a href="email.php">Обратная связь</a></li>
                    <a href="account.php">Профиль</a> <!--отображаем данную строчку-->
                    <a href="exit.php">Выйти</a> <!--отображаем данную строчку-->
                <? else: ?> <!-- в противном случае -->
					<li><a href="index.php">Главная</a> </li>
					<li><a href="catalog.php">Каталог</a> </li>				
				    <li><a href="email.php">Обратная связь</a></li>
                    <a href="auth.php">Регистрация</a> <!--отображаем данную строчку-->
                    <a href="in.php">Войти</a> <!--отображаем данную строчку-->
				 <!--   <a href="in_admin.php">Админ</a> <!--отображаем данную строчку-->
                <? endif; ?> <!-- заканчиваем if -->
            </ul>
        </nav>
    </div>
</header>