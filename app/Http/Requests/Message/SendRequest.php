<?php

declare(strict_types=1);

namespace App\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Illuminate\Contracts\Validation\Validator;

/**
 * @property int $receiver_number
 * @property string $content
 */
class SendRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'receiver_number' => ['required', 'integer'],
            'content' => ['required', 'string', 'url:http,https']
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Validation errors',
                'data' => $validator->errors()
            ],
                ResponseAlias::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
