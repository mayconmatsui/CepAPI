<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CepResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'cep'=> Str::replace('-', '', $this->cep),
            'label'=> $this->logradouro.','.$this->localidade,
            'logradouro'=> $this->logradouro,
            'complemento'=> $this->complemento,
            'bairro'=>$this->bairro,
            'localidade'=> $this->localidade,
            'uf'=> $this->uf,
            'ibge'=> $this->ibge,
            'gia'=> $this->gia,
            'ddd'=> $this->ddd,
            'siafi'=> $this->siafi,
        ];
    }
}
