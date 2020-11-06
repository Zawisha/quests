<?php

namespace App\Http\View\Composers\System;

use App\Models\System\Status;
use Illuminate\View\View;

class StatusesComposer
{
    /**
     * Статусы
     */
    protected $statuses;

    /**
     * StatusesComposer constructor.
     */
    public function __construct()
    {
        $this->statuses = Status::toBase()
            ->get();
    }

    /**
     * Отдаем на шаблон
     *
     * @param View $view
     * @return View
     */
    public function compose(View $view)
    {
        return $view->with('statuses', $this->statuses);
    }
}
