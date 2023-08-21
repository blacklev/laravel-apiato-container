<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Requests;

use App\Ship\Requests\ApiRequest;

/**
 * Class FindDirectoryItemByIdRequest
 *
 * @property    string $id
 *
 * @package     App\Containers\DirectoryItemSection\DirectoryItem\UI\API\Requests
 */
class FindDirectoryItemByIdRequest extends ApiRequest
{
    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        'id',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'id' => config('directoryItemSection-directoryItem.rules.id')
        ];
    }
}
