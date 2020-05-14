<?php

namespace Botble\RealEstate\Http\Requests;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\RealEstate\Enums\ConsultStatusEnum;
use Botble\RealEstate\Enums\NewsletterStatusEnum;
use Botble\Support\Http\Requests\Request;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Validation\Rule;

class NewslettersRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     *
     * @throws FileNotFoundException
     */
    public function rules()
    {
        return [
            'status' => Rule::in(BaseStatusEnum::values()),
        ];
    }
}
