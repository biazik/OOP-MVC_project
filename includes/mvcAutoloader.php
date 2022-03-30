<?php
spl_autoload_register('ControllersAutoload');
spl_autoload_register('ViewsAutoload');
spl_autoload_register('ModelsAutoload');
spl_autoload_register('IncludesAutoload');

function ControllersAutoload($className){
  $file = "controller/";
  $ext = ".contr.php";
  $fullPath = $file . $className . $ext;
  if (!file_exists($fullPath)) {
    return false;
  }
    include_once($fullPath);
}

function ViewsAutoload($className){
  $file = "view/";
  $ext = ".view.php";
  $fullPath = $file.$className.$ext;
  if (!file_exists($fullPath)) {
    return false;
  }
    include_once($fullPath);
}

function ModelsAutoload($className){
  $file = "model/";
  $ext = ".model.php";
  $fullPath = $file.$className.$ext;
  if (!file_exists($fullPath)) {
    return false;
  }
    include_once($fullPath);
}

function IncludesAutoload($className){
  $file = "includes/";
  $ext = ".inc.php";
  $fullPath = $file.$className.$ext;
  if (!file_exists($fullPath)) {
    return false;
  }
    include_once($fullPath);
}
