<?php
/**
 * Created by PhpStorm.
 * User: ashe
 * Date: 7/24/17
 * Time: 6:57 PM
 */

namespace agangofkittens\vgwrap;

use Illuminate\Support\Facades\Facade as IlluminateFacade;

/**
 * Class Facade
 * @package agangofkittens\vgwrap
 */
class Facade extends IlluminateFacade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'vgwrap';
    }
}
