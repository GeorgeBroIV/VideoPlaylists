<?php

namespace App\Http\Requests;

// "The Smart Way To Handle Request Validation In Laravel"
// https://medium.com/@kamerk22/the-smart-way-to-handle-request-validation-in-laravel-5e8886279271

use App\Traits\InputValidateTrait;

class UserStoreRequest extends BaseFormRequest
{
    use InputValidateTrait;
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
     * Input fields to undergo validation checks
     *
     */
    public $fields = [
        'username',
        'firstname',
        'lastname',
        'displayname',
        'email',
        'avatar',
        'password',
        'visible',
        'notes'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Laravel Validation Rule-based Messages
        $rules = $this->ValidationInputRules($this->fields);
        return $rules;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        // Laravel Validation Rule-based Messages
        $messages = $this->ValidationOutputMessages($this->fields);
        return $messages;
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        // Sanitizes field values
        $sanitizes = $this->FieldSanitize($this->fields);
        return $sanitizes;
    }
}
