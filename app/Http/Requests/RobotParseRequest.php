<?php
namespace App\Http\Requests;
/**
* [These Class makes validation for parsing robot instructions]
* class RobotParseRequest
* @package App\Http\Requests
* @author Abdullah Alnahhal <abdullah.alnahhal@gmail.com> <https://www.linkedin.com/in/abdullah-al-nahhal-436319a9/>
*/
use Illuminate\Foundation\Http\FormRequest;

class RobotParseRequest extends FormRequest
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
            'instructions' => ['required', 'string', 'regex:/^(f|b|r|l)+$/i'],
        ];
    }
}
