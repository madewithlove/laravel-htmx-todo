<?php

namespace App\Http;

use Illuminate\Http\Response;
use Illuminate\View\Component;
use Illuminate\View\View;

class ViewComponentResponse extends Response
{
    public function __construct(Component $component, $status = 200, array $headers = [])
    {
        $view = value($component->resolveView(), $component->data());
        $view = $view instanceof View
            ? $view->with($component->data())
            : view($view, $component->data());

        return parent::__construct($view->render(), $status, $headers);
    }
}
