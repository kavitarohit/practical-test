<?php
namespace App\Http\Requests\Organization;

use App\Models\AdminAccount;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrganizationRequest extends FormRequest
{
    // Determine if the user is authorized to make this request.
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $arrRules['name'] = 'required';
        if (!empty($this->input('email')) )
        {
           $arrRules['email'] = 'email';
        }
        if (!empty($this->input('website'))) 
        {
           $arrRules['website'] = 'url';
        }            
        return $arrRules;
    }
}
