<?php

// "The Smart Way To Handle Request Validation In Laravel"
// https://medium.com/@kamerk22/the-smart-way-to-handle-request-validation-in-laravel-5e8886279271

	namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    use Waavi\Sanitizer\Laravel\SanitizesInput;

	abstract class BaseFormRequest extends FormRequest
	{
        use SanitizesInput;

        /**
         * For more sanitizer rule check https://github.com/Waavi/Sanitizer
         */
        public function validateResolved()
        {
            {
                $this->sanitize();
                parent::validateResolved();
            }
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        abstract public function rules();

        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        abstract public function authorize();

	}
