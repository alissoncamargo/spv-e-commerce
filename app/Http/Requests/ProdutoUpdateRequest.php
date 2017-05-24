<?php

namespace Shoppvel\Http\Requests;

use Shoppvel\Http\Requests\Request;

class ProdutoUpdateRequest extends Request
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
            'nome' => 'required|min:3',
            'qtde_estoque' => 'required|numeric',
            'preco_venda' => 'required|numeric',
            'categoria_id' => 'required',
            'marca_id' => 'required',
        ];
    }
}
