<?php

namespace App\Http\Requests;

use App\Contracts\Likeable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Exists;

class LikeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'likeable' => [
                "required",
                "string",
                function ($attribute, $value, $fail) {
                    $class = $this->getClass($value);

                    if (! class_exists($class, true)) {
                        $fail($value." is not a valid class");
                    }

                    if (! in_array(Model::class, class_parents($class))) {
                        $fail($value." is not a model");
                    }

                    if (! in_array(Likeable::class, class_implements($class))) {
                        $fail($value." is not a likeable");
                    }
                },
            ],
            'id' => [
                "required",
                function ($attribute, $value, $fail) {

                    $class = $this->getClass($value);

                    if (! $class::where('id', $value)->exists()) {
                        $fail($value." is not present in database");
                    }
                },
            ],
        ];
    }

    public function likeable(): Likeable
    {
        $class = $this->getClass($this->input('likeable'));

        return $class::findOrFail($this->input('id'));
    }

    protected function getClass($value): string
    {
//        return Str::studly($value);
        return "App\\NewsItem";
    }
}
