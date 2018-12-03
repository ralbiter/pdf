<?php

use Illuminate\Database\Eloquent\Model;
class Pdf extends Model{
protected $table='pdf';
protected $primaryKey = 'identificador';
protected $fillable =["Nombre","Autor","Url"];
public $timestamps = false;
}
