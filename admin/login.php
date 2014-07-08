<?
if (isset($_POST['login'])) {
   $passwordHash = md5($_POST['password']);
   $login = $_POST['login'];
   // Проверка логина на плохие смиволы
   if (!preg_match("/^\w{3,}$/", $login)) {
      die('Неправильный логин!');
   }
   $link = mysql_connect("mysql.hostinger.ru","u211433583_admin","123456");
   if (!$link) {
      die('Не удалось соединиться с БД');
   }else{
      mysql_select_db("u211433583_admin", $link);
      $res = mysql_query("SELECT status FROM users WHERE login='$login'", $link);
      // Есть ли пользователь с таким логином?
      if (mysql_num_rows($res) < 1) {
         mysql_close($link);
         die('Такого пользователя нет!');
      }
      // Какой статус у пользователя?
      if (mysql_result($res, 0) != 1) {
         mysql_close($link);
         die('Логин не активирован!');
      }
      // Стартуем сессию и записываем логин в суперглобальный массив $_SESSION
      session_start();
      $_SESSION['user'] = $login;
      mysql_close($link);
      // Если определена страница с которой мы пришли,
      // на нее и переадресуем, либо на главную
      //if (isset($_SERVER['HTTP_REFERER'])) {
      //   header ("location: ".$_SERVER['HTTP_REFERER']);
      //}else {
         header ("location: admin_news.php");
      //}
   }
}
?>