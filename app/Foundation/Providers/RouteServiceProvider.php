<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Foundation\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'CachetHQ\Cachet\Http\Controllers';

    /**
     * Define the route model bindings, pattern filters, etc.
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        $this->registerBindings();
    }

    /**
     * Register model bindings.
     *
     * @return void
     */
    protected function registerBindings()
    {
        $this->app->router->model('component', 'CachetHQ\Cachet\Models\Component');
        $this->app->router->model('component_group', 'CachetHQ\Cachet\Models\ComponentGroup');
        $this->app->router->model('incident', 'CachetHQ\Cachet\Models\Incident');
        $this->app->router->model('incident_template', 'CachetHQ\Cachet\Models\IncidentTemplate');
        $this->app->router->model('metric', 'CachetHQ\Cachet\Models\Metric');
        $this->app->router->model('metric_point', 'CachetHQ\Cachet\Models\MetricPoint');
        $this->app->router->model('setting', 'CachetHQ\Cachet\Models\Setting');
        $this->app->router->model('subscriber', 'CachetHQ\Cachet\Models\Subscriber');
        $this->app->router->model('subscription', 'CachetHQ\Cachet\Models\Subscription');
        $this->app->router->model('user', 'CachetHQ\Cachet\Models\User');
    }

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function (Router $router) {
            foreach (glob(app_path('Http//Routes').'/*.php') as $file) {
                $this->app->make('CachetHQ\\Cachet\\Http\\Routes\\'.basename($file, '.php'))->map($router);
            }
        });
    }
}
