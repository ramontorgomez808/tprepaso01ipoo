<?php
/******************************************
* GOMEZ HECTOR RAMON - 81039 
******************************************/


/**
* genera un arreglo de estrucutura asociativa de vinos
* @return array $coleccionVinos
*/
function cargarVinoteca(){
  $coleccionVinos = array();
    
  $coleccionVinos["merlot"]=array
      (
        "año"=>[2000,2002,2003,2004],
        "cantidad"=>[1000,1100,1200,1300],
        "precioUnitario"=>[500,600,700,800],
        
      );
      $coleccionVinos["cabernet"]=array
      (
        "año"=>[2010,2012,2013,2014,2015],
        "cantidad"=>[2000,2100,2200,2300,2400],
        "precioUnitario"=>[800,900,950,800,990],
        
      );
      $coleccionVinos["malbec"]=array
      (
        "año"=>[1990,1995,1996],
        "cantidad"=>[3000,3100,3200],
        "precioUnitario"=>[1500,1600,1700],
        
      );
  
  return $coleccionVinos;
}
/**
* genera un arreglo de estrucutura asociativa de estadistica de vinos
* @param array $coleccionVinosEnt
* @return array $estadisticaVinos
*/
function cargarEstadisticas($coleccionVinosEnt){
    $estadisticaVinos = array();

    $estadisticaVinos["merlot"]=array
    (
               "totalBotellas"=>[0],
               "promedio"=>[0],
    );
    $estadisticaVinos["cabernet"]=array
    (
               "totalBotellas"=>[0],
               "promedio"=>[0],
    );
    $estadisticaVinos["malbec"]=array
    (
               "totalBotellas"=>[0],
               "promedio"=>[0],
    );

$i=0;$j=0;$promedioPrecio=0;
foreach($coleccionVinosEnt as $key=>$datos){
    $i=count ($datos["cantidad"]);
   
    $totalBotellas=0; $totalPrecio=0;
        for($j=0;$j<$i;$j++){
            $totalBotellas=$totalBotellas+($datos["cantidad"][$j]);
            $totalPrecio=$totalPrecio+($datos["precioUnitario"][$j]);
        }
   $estadisticaVinos[$key]["totalBotellas"]=$totalBotellas;
   $promedioPrecio=$totalPrecio/$i;
   $estadisticaVinos[$key]["promedio"]=$promedioPrecio;
   
}
return $estadisticaVinos;
}
 
/**
* muestra la estadistica de los vinos con arreglo asocitativo
* @param array $estadisticaVinosEnt
* @param array $coleccionVinosEnt
* 
*/
function mostrarEstadisticas($estadisticaVinosEnt, $coleccionVinosEnt){

  $i=0;$j=0;$promedioPrecio=0;
  echo("vinos         Año produccion    cantidad        Precio unitario \n");
  foreach($coleccionVinosEnt as $key=>$datos){
      $i=count ($datos["cantidad"]);
    
    for($j=0;$j<$i;$j++){
      echo $key."    -       ".($datos["año"][$j])."   -       ".($datos["cantidad"][$j])."        -     ".($datos["precioUnitario"][$j])."\n";
    }
    echo"_______________________________________________________\n";
  }
  foreach($estadisticaVinosEnt as $key=>$datos1){
    echo "Total **botellas:** ".$key." = ".$estadisticaVinosEnt[$key]["totalBotellas"]."\n";
    echo "Total **promedio precios:** ".$key." = $".$estadisticaVinosEnt[$key]["promedio"]."\n";
    echo"_______________________________________________________\n";
      
  }
}

/*******************************************/
/************** PROGRAMA PRINCIPAL *********/
/*******************************************/
/**
 * array $coleccionVinos
 * array $estadisticaVinos
 *integer $i
 *  
 */

$coleccionVinos=cargarVinoteca();
$estadisticaVinos=cargarEstadisticas($coleccionVinos);
mostrarEstadisticas($estadisticaVinos,$coleccionVinos);

