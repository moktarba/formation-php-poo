<?php


 function __autoload($class){

   $directories = array(
     'classes',
     'classes/Enfants/'
   );

   foreach ($directories as $directory) {
     if (file_exists($directory.ucfirst($class).".class.php")) {
         require $directory.ucfirst($class).".class.php";
     }
   }

}
