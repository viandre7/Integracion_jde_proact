<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\ProactivanetApiController;
use App\Http\Controllers\JdeApiController;
use App\Models\Software;

class CompararArrays extends Controller
{
   

    public function comparar(){

        $prac = new ProactivanetApiController();
        $proacApi = $prac->proComp();

        $jde = new JdeApiController();
        $jdeApi = $jde->jdeComp();


        //Fucnión para sacar solo las placas de los inventarios de los software
        function placasArray($array){
            $arrayPlacas = [];
            foreach($array as $arr)
            {
                $arrlimpio = str_replace(['PL','_', '', '.', '-'], '', $arr->placa );
                ;
                array_push($arrayPlacas, $arrlimpio);                       
            }
            return $arrayPlacas;
        }

        // Obtener las placas por medio de la función 
        $jdePlacasArray = placasArray($jdeApi);
        $proPlacasArray = placasArray($proacApi);

        // Obtener los equipos que coinciden en los inventarios de ambos software y aquellos que estan en JDE y no Proac

        function equiposCoinciden($arrayInventario, $arrayPlacas){

            $coinciden = [];
            $noCoincidenJDE = [];
            foreach($arrayInventario as $arr)
            {
                $arrlimpio = str_replace(['PL','_', '', '.', '-'], '', $arr->placa );
    
                if(in_array($arrlimpio, $arrayPlacas) ){
    
                    array_push($coinciden, $arr); 
                }
                else{
                    array_push($noCoincidenJDE, $arr); 
                }
    
                $contar = count($coinciden);
                $contar1 = count($noCoincidenJDE);
            }

            return $coinciden;
        }

        $coincidenInven = equiposCoinciden($jdeApi, $proPlacasArray);

        // Encontrar los equipos que se encuentran en proactivanet y no en jde
        $noCoincidenPoact = [];
        foreach($proacApi as $pro)
        {
            $proLimpio = str_replace(['PL','_', '', '.', '-'], '', $pro->placa );

            if(!in_array($proLimpio, $jdePlacasArray) ){
                array_push($noCoincidenPoact, $pro); 
            }
            else{
            }

            $contarpro = count($noCoincidenPoact);
        }

        // Guardar y editar la información de acuerdo a la lista que obtenemos de el cruce de inventario
        foreach ($coincidenInven as $value) {
            // Asignamos la información en un array para proceder a guardar o editar
            $save['placa'] = $value->placa;
            $save['nserie'] = $value->nserie;
            $save['proceso'] = $value->proceso;
            $save['tipo_equipo'] = $value->tipo_equipo;
            $save['modelo'] = $value->modelo;
            $save['usuario'] = $value->usuario;

            //Obtenemos el id del equipo de acuerdo a la placa
            $encontrar = Software::find(1)->where('placa', $value->placa)->get('id'); 
            //Desestructurar el array, para sacar el id
            $encontrarId = !$encontrar->isEmpty() && $encontrar != null ? $encontrar[0]->id : '';  
            // Log::info($encontrarId);

            // Condicional que permite verificar si el id existe para guardar o editar
            if($encontrarId){
                Software::find($encontrarId)->update($save);
         
            } else{
                Software::create($save);
            }
        }


        return view('coinciden', ['data' => $coincidenInven]);
    }


    public function llenarBD () {

        $coincidenInven = $this-> equiposCoinciden($this->$jdeApi, $this->$proPlacasArray);
        // Guardar y editar la información de acuerdo a la lista que obtenemos de el cruce de inventario
        foreach ($coincidenInven as $value) {
            // Asignamos la información en un array para proceder a guardar o editar
            $save['placa'] = $value->placa;
            $save['nserie'] = $value->nserie;
            $save['proceso'] = $value->proceso;
            $save['tipo_equipo'] = $value->tipo_equipo;
            $save['modelo'] = $value->modelo;
            $save['usuario'] = $value->usuario;

            Software::create($save);

        }

    }

   
    
}
