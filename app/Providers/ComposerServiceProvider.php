<?php
/**
 * ComposerServiceProvider.php
 *
 * Composer Service Provider
 *
 * @category Providers
 * @package  MyASC
 * @author   Jeanne Mitchell <jeanne@anthemred.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://myasc.club
 */
namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

/**
 * Composer Service Provider
 *
 * Service provider for view composers.
 *
 * PHP version 5.6.3
 *
 * @category Providers
 * @package  MyASC
 * @author   Jeanne Mitchell <jeanne@anthemred.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://myasc.club
 */
class ComposerServiceProvider extends ServiceProvider
{

    /**
     * Register bindings in the container
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', 'App\Http\ViewComposers\RouteComposer');
    }

    /**
     * Register the service provider
     *
     * @return void
     */
    public function register()
    {
    }

}
