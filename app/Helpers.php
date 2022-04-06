<?php


use App\Models\Categoria;
use App\Models\Config;
use App\Models\Galeria;
use App\Models\Whatsapp;



function setting()
{
	
	return Config::get()->last();
}


function categorias()
{
	
	return Categoria::get();
}


function whapp()
{
	
	return Whatsapp::get();
}


function galeria()
{
	
	return Galeria::paginate(6);
}


function formatoNumero($numero)
{
	if ($numero > 1) {
		return number_format($numero, 2, ',', ' ');
	}else{
		return '0.00';
	}
	
}