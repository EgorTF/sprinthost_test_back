<?php

namespace App\Http\Api\Modules\Requests;
use App\Http\Api\Support\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateAnimalRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'animal_type_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
        ];
    }
}
