<?php

namespace BukApi\Traits;

use Illuminate\Support\Collection;
use BukApi\Constants\RequestCode;
use Illuminate\Support\Facades\DB;
use BukApi\Constants\ColumnName;

use BukApi\Constants\GeneralConstant;

trait Enum{

    protected function getEnums($query){

        $columns = DB::select($query);

        $cadenavalor=$columns[GeneralConstant::CERO]->Type;
        $enum = explode(GeneralConstant::EXPLODE_DELIMITER,preg_replace(GeneralConstant::PREG_REPLACE_PATTERN,GeneralConstant::PREG_REPLACE_REPLACEMENT, $cadenavalor));
        
        return $enum;

    }

    protected function getEnum($id, $query){
        
        $columns = $this->getEnums($query);

        if($id<=count($columns)&&$id>0)
            {
                $index=$id;
                $condition=[];
                
                array_push($condition, [ColumnName::INDEX => (String)$index, ColumnName::VALUE => $columns[--$id]]); 
                $columns = collect($condition);
                
                return $columns;
            }
        
        return null;
            
    }

    protected function getCollection(Array $enum){
        $index=GeneralConstant::ONE;
        $array=[];
        foreach($enum as $item)
            {
                array_push($array, [ColumnName::INDEX => (String)$index, ColumnName::VALUE => $item]); 
                $index++;
            }
        
        foreach ($array as $clave => $fila) {
                $firstValue[$clave] = $fila[ColumnName::INDEX];
                $secondValue[$clave] = $fila[ColumnName::VALUE];
            }
            
        array_multisort($secondValue, SORT_ASC, $firstValue, SORT_ASC, $array);    
        
        $enum = collect($array);

        return $enum;
    }

    protected function getCollectionOrderById(Array $enum){
        $index=GeneralConstant::ONE;
        $array=[];
        foreach($enum as $item)
            {
                array_push($array, [ColumnName::INDEX => (String)$index, ColumnName::VALUE => $item]); 
                $index++;
            }
        
        foreach ($array as $clave => $fila) {
                $firstValue[$clave] = $fila[ColumnName::INDEX];
                $secondValue[$clave] = $fila[ColumnName::VALUE];
            }
            
        array_multisort($firstValue, SORT_ASC, $secondValue, SORT_ASC, $array);    
        
        $enum = collect($array);

        return $enum;
    }
    
}