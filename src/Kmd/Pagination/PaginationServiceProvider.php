<?php

namespace Kmd\Pagination;

use Illuminate\Support\ServiceProvider;

class PaginationServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('kmd/pagination');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['pagination'] = $this->app->share(function ($app) {
            $paginator = new Environment($app['request'], $app['view'], $app['translator']);

            $paginator->setViewName($app['config']['view.pagination']);

            return $paginator;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('pagination');
    }
}
