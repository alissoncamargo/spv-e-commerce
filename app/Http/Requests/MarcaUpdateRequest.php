<?php

namespace Shoppvel\Http\Requests;

use Shoppvel\Http\Requests\Request;

class MarcaUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'min:3|required',
        ];
    }
}
