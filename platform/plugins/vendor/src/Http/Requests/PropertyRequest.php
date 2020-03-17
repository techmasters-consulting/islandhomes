<?php

namespace Botble\Vendor\Http\Requests;

use Botble\RealEstate\Http\Requests\PropertyRequest as BaseRequest;

class PropertyRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return parent::rules();
    }
}
