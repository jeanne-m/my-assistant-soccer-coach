<?php
/**
 * RouteComposer.php
 *
 * Route View Composer
 *
 * @category ViewComposers
 * @package  MyASC
 * @author   Jeanne Mitchell <jeanne@anthemred.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://myasc.club
 */
namespace App\Http\ViewComposers;

/**
 * Route View Composer
 *
 * View composer that shares route data for all views.
 *
 * PHP version 5.6.3
 *
 * @category ViewComposers
 * @package  MyASC
 * @author   Jeanne Mitchell <jeanne@anthemred.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://myasc.club
 */
class RouteComposer
{

    /**
     * Route object
     * @var \Illuminate\Support\Facades\Route
     */
    protected $route;

    /**
     * Constructor
     *
     * @param \Illuminate\Support\Facades\Route $route Route object
     */
    public function __construct(\Illuminate\Support\Facades\Route $route)
    {
        $this->route = $route;
    }

    /**
     * Bind data to the view.
     *
     * @param \Illuminate\Contracts\View\View $view View object
     *
     * @return void
     */
    public function compose(\Illuminate\Contracts\View\View $view)
    {
        $view->with('currentRoute', $this->route->getFacadeRoot()->currentRouteName());
    }

}
