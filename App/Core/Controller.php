<?php
class Controller{

public function model($model)
{
  require_once '../App/Model/'  . $model . '.php';
  return new $model();
}

public function view($view, $data = [])
{
 extract($data);
  require_once '../App/Views/' . $view . '.php';
}



}


 ?>
