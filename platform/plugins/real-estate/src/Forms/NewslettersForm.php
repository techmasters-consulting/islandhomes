<?php

namespace Botble\RealEstate\Forms;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\RealEstate\Http\Requests\NewslettersRequest;
use Botble\RealEstate\Models\Consult;
use Botble\RealEstate\Models\Newsletters;
use Botble\Base\Forms\FormAbstract;
use Botble\RealEstate\Enums\ConsultStatusEnum;
use Botble\RealEstate\Http\Requests\ConsultRequest;
use Throwable;

class NewslettersForm extends FormAbstract
{

    /**
     * @return mixed|void
     * @throws Throwable
     */
    public function buildForm()
    {
        $this
            ->setupModel(new Newsletters)
            ->setValidatorClass(NewslettersRequest::class)
            ->withCustomFields()
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->addMetaBoxes([
                'information' => [
                    'title'      => trans('plugins/real-estate::newsletters.newsletters_information'),
                    'content'    => view('plugins/real-estate::infoNews', ['newsletters' => $this->getModel()])->render(),
                    'attributes' => [
                        'style' => 'margin-top: 0',
                    ],
                ],
            ])
            ;
    }
}
