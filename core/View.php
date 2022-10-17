<?php
class View{
    public function show(string $nombre, array $vars = array() )
    {
        $ruta = 'vistas/'.$nombre.'.php';
        if(is_array($vars))
        {
            extract($vars);
            //['nombre' => 'Pedro']
            //extract => $nombre donde su valor es 'Pedro'
        }
        if(is_file($ruta))
        {
            include($ruta);
        }
        else{
            throw new Exception('La vista no existe');
        }
    }
}