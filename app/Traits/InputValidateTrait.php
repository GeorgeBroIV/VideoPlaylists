<?php

namespace App\Traits;

trait InputValidateTrait
{
    /**
     * Code Author
     * George T. Brotherston IV
     * StackOverflow: https://stackoverflow.com/users/13029167/george-brotherston
     * Github: https://github.com/GeorgeBroIV
     *
     * Performs input validation checking using Laravel Validation trait.
     * https://laravel.com/docs/7.x/validation#available-validation-rules
     *
     * This trait is intended to be the single location (DRY code paradigm) where all input element values
     * can undergo data validation (with custom messages for each rule) and sanitized.  Ideally this would
     * be called from a 'Form Request' class which defines which input elements are to be validated for any
     * given controller method.
     *
     * @param array $fields
     * @return $this|false|array
     */
    public function ValidationInputRules($fields)
    {
        // This returns a single-dimension array where each element's key is the field and the value is the rule
        foreach($fields as $field) {
            switch ($field) {
                case 'username':
                    $rules[$field] = 'required|min:2|max:20|unique:users,username|regex:/^[A-Z][a-zA-Z0-9_-]+$/';
                    break;
                case 'firstname':
                    $rules[$field] = 'required|min:2|max:20|regex:/^[A-Z][a-zA-Z0-9_-]+$/';
                    break;
                case 'lastname':
                    $rules[$field] = 'required|min:2|max:30|regex:/^[A-Z][a-zA-Z0-9_-]+$/';
                    break;
                case 'displayname':
                    $rules[$field] = 'required|min:2|max:20|regex:/^[A-Z][a-zA-Z0-9_-]+$/';
                    break;
                case 'email':
                    $rules[$field] = 'required|email|unique:users,email';
                    break;
                case 'avatar':
                    $rules[$field] = 'image|mimes:jpeg,png,jpg,gif|max:2048';
                    break;
                case 'password':
                    $rules[$field] = 'required|min:8|max:20';
                    break;
                case 'visible':
                    $rules[$field] = 'boolean';
                    break;
                case 'active':
                    $rules[$field] = 'boolean';
                    break;
                case 'notes':
                    $rules[$field] = 'nullable|regex:/^[A-Z][a-zA-Z0-9_-]+$/';
                    break;
            }
        }
        return $rules;
    }

    /**
     * Custom validation messages for each validation rule violation
     *
     * @param array $fields
     * @return $this|false|array
     */
    public function ValidationOutputMessages($fields)
    {
        // This returns a single-dimension array where each element's key is the field and the value is the rule
        $messages = [];
        foreach($fields as $field) {
            switch ($field) {
                case 'username':
                    $messages = array_merge($messages, [
                        'username.required' => 'User Name is required.',
                        'username.min' => 'User Name must be at least 2 characters.',
                        'username.max' => 'User Name cannot exceed 20 characters.',
                        'username.unique' => 'User Name is already taken, please choose another.',
                        'username.regex' => 'User Name can only start with a capital letter and can only contain letters, numbers, dashes and underscores.'
                    ]);
                    break;
                case 'firstname':
                    $messages = array_merge($messages, [
                        'firstname.required' => 'First Name is required.',
                        'firstname.min' => 'First Name must be at least 2 characters.',
                        'firstname.max' => 'First Name cannot exceed 20 characters.',
                        'firstname.regex' => 'First Name can only start with a capital letter and can only contain letters, numbers, dashes and underscores.'
                    ]);
                    break;
                case 'lastname':
                    $messages = array_merge($messages, [
                        'lastname.required' => 'Last Name is required.',
                        'lastname.min' => 'Last Name must be at least 2 characters.',
                        'lastname.max' => 'Last Name cannot exceed 30 characters.',
                        'lastname.regex' => 'Last Name can only start with a capital letter and can only contain letters, numbers, dashes and underscores.'
                    ]);
                    break;
                case 'displayname':
                    $messages = array_merge($messages, [
                        'displayname.required' => 'Display Name is required.',
                        'displayname.min' => 'Display Name must be at least 2 characters.',
                        'displayname.max' => 'Display Name cannot exceed 20 characters.',
                        'displayname.regex' => 'Display Name can only start with a capital letter and can only contain letters, numbers, dashes and underscores.'
                    ]);
                    break;
                case 'email':
                    $messages = array_merge($messages, [
                        'email.required' => 'Email is required.',
                        'email.email' => 'Email must be a valid formatted e-mail address.',
                        'email.unique' => 'Email is already in use, please request password reset or choose another.'
                    ]);
                    break;
                case 'avatar':
                    $messages = array_merge($messages, [
                        'avatar.image' => 'Avatar must be a valid image file.',
                        'avatar.mimes' => 'Avatar must be jpeg, png, jpg, or gif formats.',
                        'avatar.max' => 'Avatar file size must not exceed 2 MB.'
                    ]);
                    break;
                case 'password':
                    $messages = array_merge($messages, [
                        'password.required' => 'Password is required.',
                        'password.min' => 'Password must be at least 8 characters long.',
                        'password.max' => 'Password cannot exceed 20 characters.'
                    ]);
                    break;
                case 'visible':
                    $messages = array_merge($messages, [
                        'visible.boolean' => 'Visible must be a boolean (true, false, 0, 1).'
                    ]);
                    break;
                case 'active':
                    $messages = array_merge($messages, [
                        'active.boolean' => 'Visible must be a boolean (true, false, 0, 1).'
                    ]);
                    break;
                case 'notes':
                    $messages = array_merge($messages, [
                        'notes.regex' => 'Notes can only start with a capital letter and can only contain letters, numbers, dashes and underscores.'
                    ]);
                    break;
            }
        }
        return $messages;
    }
    /**
     * Sanitizes field values
     * https://github.com/Waavi/Sanitizer
     *
     * @param array $fields
     * @return $this|false|array
     */
    public function FieldSanitize($fields)
    {
        foreach($fields as $field) {
            switch ($field) {
                case 'username':
                    $sanitizes[$field] = 'trim|escape';
                    break;
                case 'firstname':
                    $sanitizes[$field] = 'trim|capitalize|escape';
                    break;
                case 'lastname':
                    $sanitizes[$field] = 'trim|capitalize|escape';
                    break;
                case 'displayname':
                    $sanitizes[$field] = 'trim|escape';
                    break;
                case 'email':
                    $sanitizes[$field] = 'trim|lowercase';
                    break;
                case 'notes':
                    $sanitizes[$field] = 'trim|capitalize|escape';
                    break;
            }
        }
        return $sanitizes;
    }
}
