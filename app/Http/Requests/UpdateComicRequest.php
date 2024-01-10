<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComicRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:255|unique:comics',
            'type' => 'required',
            'series' => 'required|max:100',
            'price' => 'required|max:20|numeric',
            'sale_date' => 'nullable|date',
            'thumb' => 'nullable|url'
        ];
    }
    /**
     * Summary of messages
     */
    public function messages()
    {
        return [
            'title.required' => 'Il campo titolo è obbligatorio',
            'title.min' => 'Il campo titolo deve avere almeno :min caratteri',
            'title.max' => 'Il campo titolo deve avere massimo :max caratteri',
            'type.required' => 'Il campo tipo è obbligatorio',
            'series.required' => 'Il campo serie è obbligatorio',
            'series.max' => 'Il campo serie è obbligatorio',
            'price.required' => 'Il campo prezzo è obbligatorio',
            'price.max' => 'Il campo prezzo deve avere massimo :max caratteri',
            'thumb.url' => 'Il campo immagine deve essere un url',
            'sale_date.date' => 'Il campo data deve essere in un formato valido',
            'price.numeric' => 'Il campo prezzo deve essere un dato numerico'
        ];
    }
}
