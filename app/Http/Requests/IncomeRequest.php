<?php

namespace App\Http\Requests;

use App\Models\Income;
use App\Models\IncomeDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class IncomeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'income_detail_id' => 'required',
            'count' => 'required|numeric',
            'created_at' => 'date'
        ];
    }
}
