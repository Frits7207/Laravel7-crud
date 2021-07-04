<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
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
            'task' => "required|max:200|unique:Tasks",
            'begindate' => "required",
            'enddate' => "required",
            'user_id'=>  "integer|exists:users,id",
            'project_id'=>  "integer|exists:projects,id",
            'activity_id'=>  "integer|exists:activities,id",

        ];
    }
}
