<?php

namespace App\Models;

use App\Models\Modelo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Marca extends Model
{
    use HasFactory;
    protected $fillable = ["nome", "imagem"];

    public function rules(): array
    {
        return [
            'nome' => 'required|unique:marcas,nome,' . $this->id . '|min:3',
            'imagem' => 'required|file|mimes:png',
        ];
    }
    public function feedback(): array
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'nome.unique' => 'O nome da marca já existe',
            'nome.min' => 'O nome deve ter no mínimo :min caracteres',
            'imagem.mimes' => 'O arquivo deve ser uma imagem do tipo png'
        ];
    }

    public function modelos()
    {
        return $this->hasMany(Modelo::class);
    }
}
