<?
   session_start();
   if (isset($_SESSION['user'])) {
   // удаляем элемент "user"
      unset($_SESSION['user']);
   }

   header ("location: index.php");

?>