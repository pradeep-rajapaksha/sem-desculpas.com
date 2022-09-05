<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if(!$this->resource and !is_array($this->resource)) {
            return [];
        }
        $resource = $this->resource; 

        return [
            'categoryName'          => $resource['categoryName'] ?? '',
            'classDate'             => $resource['classDate'] ?? '',
            'classDescription'      => $resource['classDescription'] ?? '',
            'classDurationCategory' => $resource['classDurationCategory'] ?? '',
            'classId'               => $resource['classId'] ?? '',
            'classNickname'         => $resource['classNickname'] ?? '',
            'classTime'             => $resource['classTime'] ?? '',
            'classTimeMinutes'      => $resource['classTimeMinutes'] ?? '',
            'featuredCategory'      => $resource['featuredCategory'] ?? '',
            'fileName'              => $resource['fileName'] ?? '',
            'fitnessLevel'          => $resource['fitnessLevel'] ?? '',
            'musicType'             => $resource['musicType'] ?? '',
            'personal'              => $resource['personal'] ?? '',
            'serverUrl'             => $resource['serverUrl'] ?? '',
            'subCategory'           => $resource['subCategory'] ?? '',
            'Maxima Inclinacao'     => $resource['Maxima Inclinacao'] ?? '',
            'Maxima Velocidade'     => $resource['Maxima Velocidade'] ?? '',
            'Consumo Calorico'      => $resource['Consumo Calorico'] ?? '',
            'Destaque'              => $resource['Destaque'] ?? '',
            'Distancia percorrida'  => $resource['Distancia percorrida'] ?? '',
            'C, J'                  => $resource['C, J'] ?? '',
        ];
    }
}
