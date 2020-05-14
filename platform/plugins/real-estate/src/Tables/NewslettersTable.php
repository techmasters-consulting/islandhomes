<?php

namespace Botble\RealEstate\Tables;

use Auth;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\RealEstate\Enums\ConsultStatusEnum;
use Botble\RealEstate\Models\Consult;
use Botble\RealEstate\Models\Newsletters;
use Botble\RealEstate\Repositories\Interfaces\ConsultInterface;
use Botble\RealEstate\Repositories\Interfaces\NewslettersInterface;
use Botble\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Throwable;
use Yajra\DataTables\DataTables;

class NewslettersTable extends TableAbstract
{

    /**
     * @var bool
     */
    protected $hasActions = true;

    /**
     * @var bool
     */
    protected $hasFilter = true;

    /**
     * ConsultTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlDevTool
     * @param ConsultInterface $NewslettersRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlDevTool, NewslettersInterface $NewslettersRepository)
    {
        $this->repository = $NewslettersRepository;
        $this->setOption('id', 'table-plugins-newsletters');
        parent::__construct($table, $urlDevTool);

        if (!Auth::user()->hasAnyPermission(['newsletters.edit','newsletters.destroy'])) {
            $this->hasOperations = false;
            $this->hasActions = false;
        }
    }

    /**
     * Display ajax response.
     *
     * @return JsonResponse
     * @since 2.1
     */
    public function ajax()
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('email', function ($item) {
                if (!Auth::user()->hasPermission('newsletters.edit')) {
                    return $item->email;
                }
                return anchor_link(route('newsletters.edit', $item->id), $item->email);
            })
            ->editColumn('checkbox', function ($item) {
                return table_checkbox($item->id);
            })
            ->editColumn('created_at', function ($item) {
                return date_from_database($item->created_at, config('core.base.general.date_format.date'));
            })
            ->editColumn('status', function ($item) {
                return $item->status->toHtml();
            });

        return apply_filters(BASE_FILTER_GET_LIST_DATA, $data, $this->repository->getModel())
            ->addColumn('operations', function ($item) {
                return table_actions_news('newsletters.destroy', $item);
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Get the query object to be processed by table.
     *
     * @return \Illuminate\Database\Query\Builder|Builder
     * @since 2.1
     */
    public function query()
    {
        $model = $this->repository->getModel();
        $query = $model->select([
            'newsletters.id',
            'newsletters.email',
            'newsletters.created_at',
            'newsletters.status',
        ]);

        return $this->applyScopes(apply_filters(BASE_FILTER_TABLE_QUERY, $query, $model));
    }

    /**
     * @return array
     * @since 2.1
     */
    public function columns()
    {
        return [
            'id'         => [
                'name'  => 'newsletters.id',
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'email'       => [
                'name'  => 'newsletters.email',
                'title' => trans('core/base::tables.email'),
                'class' => 'text-left',
            ],
            'created_at' => [
                'name'  => 'newsletters.created_at',
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ],
            'status'     => [
                'name'  => 'newsletters.status',
                'title' => trans('core/base::tables.status'),
                'width' => '100px',
            ],
        ];
    }

    /**
     * @return array
     * @throws Throwable
     * @since 2.1
     */
    public function buttons()
    {
        return apply_filters(BASE_FILTER_TABLE_BUTTONS, [], Newsletters::class);
    }

    /**
     * @return array
     * @throws Throwable
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('newsletters.deletes'), 'newsletters.destroy', parent::bulkActions());
    }

    /**
     * @return array
     */
    public function getBulkChanges(): array
    {
        return [
            'newsletters.email'       => [
                'title'    => trans('core/base::tables.email'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],

            'newsletters.created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type'  => 'date',
            ],
        ];
    }
}
