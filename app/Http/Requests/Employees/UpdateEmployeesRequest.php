<?php
namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeesRequest extends FormRequest
{
    // Determine if the user is authorized to make this request.
    public function authorize()
    {
        return true;
    }

   public function rules()
    {
        $arrRules['first_name'] = 'required';
        $arrRules['last_name'] = 'required';
        $arrRules['organization_id'] = 'required';
        if (!empty($this->input('email')) )
        {
           $arrRules['email'] = 'email';
        }
        if (!empty($this->input('phone_no'))) 
        {
           $arrRules['phone_no'] = 'min:12|numeric';
        }            
        return $arrRules;
    }
}
