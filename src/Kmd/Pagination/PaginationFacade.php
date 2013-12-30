<?php

namespace Kmd\Pagination;

use Illuminate\Support\Facades\Facade;

class PaginationFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @access protected
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pagination';
    }
}
