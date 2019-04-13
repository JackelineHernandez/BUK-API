<?php

namespace BukApi\Traits;

use Illuminate\Support\Collection;
use BukApi\Constants\RequestCode;
use Illuminate\Support\Facades\DB;
use BukApi\Constants\ColumnName;

use BukApi\Constants\GeneralConstant;

trait Enums{

    protected function getEnums($query){

        $columns = DB::select($query);

        $cadenavalor=$columns[GeneralConstant::CERO]->Type;
        $enums = explode(GeneralConstant::EXPLODE_DELIMITER,preg_replace(GeneralConstant::PREG_REPLACE_PATTERN,GeneralConstant::PREG_REPLACE_REPLACEMENT, $cadenavalor));
        
        return $enums;

    }

    protected function getEnum($id, $query){
        
        $columns = $this->getEnums($query);

        if($id<=count($columns)&&$id>0)
            {
                $index=$id;
                $condition=[];
                
                array_push($condition, [ColumnName::ID => (String)$index, ColumnName::NAME => $columns[--$id]]); 
                $columns = collect($condition);
                
                return $columns;
            }
        
        return null;
            
    }

    protected function getCollection(Array $enums){
        $index=GeneralConstant::ONE;
        $array=[];
        foreach($enums as $item)
            {
                array_push($array, [ColumnName::ID => (String)$index, ColumnName::NAME => $item]); 
                $index++;
            }
        
        foreach ($array as $clave => $fila) {
                $firstValue[$clave] = $fila[ColumnName::ID];
                $secondValue[$clave] = $fila[ColumnName::NAME];
            }
            
        array_multisort($secondValue, SORT_ASC, $firstValue, SORT_ASC, $array);    
        
        $enums = collect($array);

        return $enums;
    }

    protected function getCollectionOrderById(Array $enums){
        $index=GeneralConstant::ONE;
        $array=[];
        foreach($enums as $item)
            {
                array_push($array, [ColumnName::ID => (String)$index, ColumnName::NAME => $item]); 
                $index++;
            }
        
        foreach ($array as $clave => $fila) {
                $firstValue[$clave] = $fila[ColumnName::ID];
                $secondValue[$clave] = $fila[ColumnName::NAME];
            }
            
        array_multisort($firstValue, SORT_ASC, $secondValue, SORT_ASC, $array);    
        
        $enums = collect($array);

        return $enums;
    }
    
}