<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crud_usuario extends Model
{
    protected $primaryKey = 'id_usuario';


     public function localizaEmail($email) //Localizar se existe o email cadastrado
   {
   		

   		$pegaEmail = crud_usuario::where('email', '=', $email)->first();

   		return 	$pegaEmail;
   } 
}
