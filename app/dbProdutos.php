<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dbProdutos extends Model
{
    
	public function teste($id)
	{

		$dadosteste = dbProdutos::find($id);

		return $dadosteste;
	}



}
