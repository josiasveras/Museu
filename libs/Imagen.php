<?php

class Imagen{

    function __construct(){}

    public static function leeDirectorio()
    {
    	$archivo = new RecursiveDirectoryIterator("img");
    	$archivo->setFlags(filesystemIterator::SKIP_DOTS | FilesystemIterator::UNIX_PATHS);
    	$archivo = new RecursiveIteratorIterator($archivo,RecursiveIteratorIterator::SELF_FIRST);
    	return $archivo;
    }

    public function buscaImagen($data)
    {
    	$db = new MySQL();
    	//
    	$sql = "SELECT id FROM imagenes ";
    	$sql.= "WHERE archivo='".$data["archivo"]."' AND ";
    	$sql.= "camino='".$data["camino"]."'";
    	$r = $db->query($sql);

    	if ($r==NULL) {
    		$sql = "INSERT INTO imagenes VALUES(0,";
    		$sql.= "'".$data["archivo"]."', ";
    		$sql.= "'".$data["camino"]."', ";
    		$sql.= $data["size"]."', ";
    		$sql.= $data["archivo"].")";

    		if ($db->queryNoSelect($sql)) {
    			$id = $db->recuperaId();
    		} else {
    			$id = NULL;
    		}

    	} else {
    		$id = $r["id"];
    	}
    	return $id;
    	
    }

}