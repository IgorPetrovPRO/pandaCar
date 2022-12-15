<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class ViewComposer{
    public function compose(View $view): void
    {
        if (!is_null(request()->route())) {
            $layout = $this->layout($view);
            $view->with('layout', $layout);
        }
    }

    public function layout($view)
    {
        if (isset($view->layout)) {
            return $view->layout;
        } else {
            if (request()->has('layout')) {
                return request()->query('layout');
            }
        }

        return 'side-menu';
    }

}
