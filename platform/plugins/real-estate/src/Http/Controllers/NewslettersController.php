<?php

namespace Botble\RealEstate\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\RealEstate\Forms\InvestorForm;
use Botble\RealEstate\Http\Requests\InvestorRequest;
use Botble\RealEstate\Http\Requests\NewslettersRequest;
use Botble\RealEstate\Repositories\Interfaces\InvestorInterface;
use Botble\RealEstate\Repositories\Interfaces\NewslettersInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Exception;
use Botble\RealEstate\Tables\NewslettersTable;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\RealEstate\Forms\NewslettersForm;
use Botble\Base\Forms\FormBuilder;
use Illuminate\View\View;
use Throwable;

class NewslettersController extends BaseController
{

    /**
     * @var NewslettersInterface
     */
    protected $NewslettersRepository;

    /**
     * InvestorController constructor.
     * @param NewslettersInterface $NewslettersRepository
     */
    public function __construct(NewslettersInterface $NewslettersRepository)
    {
        $this->NewslettersRepository = $NewslettersRepository;
    }

    /**
     * @var NewslettersInterface
     */

    /**
     * Display all consults
     * @param NewslettersTable $dataTable
     * @return Factory|View
     * @throws Throwable
     */
    public function index(NewslettersTable $table)
    {

        page_title()->setTitle(trans('plugins/real-estate::newsletters.name'));

        return $table->renderTable();
    }


    /**
     * Show edit form
     *
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $news = $this->NewslettersRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $news));

        page_title()->setTitle(trans('plugins/real-estate::newsletters.edit') . ' "' . $news->email . '"');

        return $formBuilder->create(NewslettersForm::class, ['model' => $news])->renderForm();
    }
    /**
     * @param $id
     * @param Newslettersrequest $request
     * @return BaseHttpResponse
     */
    public function update($id, Newslettersrequest $request, BaseHttpResponse $response)
    {
        $news = $this->NewslettersRepository->findOrFail($id);

        $news->fill($request->input());

        $this->NewslettersRepository->createOrUpdate($news);

        event(new UpdatedContentEvent(INVESTOR_MODULE_SCREEN_NAME, $request, $news));

        return $response
            ->setPreviousUrl(route('newsletters.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }
    /**
     * @param $id
     * @param Request $request
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $consult = $this->NewslettersRepository->findOrFail($id);

            $this->NewslettersRepository->delete($consult);

            event(new DeletedContentEvent(CONSULT_MODULE_SCREEN_NAME, $request, $consult));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.cannot_delete'));
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $news = $this->NewslettersRepository->findOrFail($id);
            $this->NewslettersRepository->delete($news);
            event(new DeletedContentEvent(NEWSLETTERS_MODULE_SCREEN_NAME, $request, $news));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
