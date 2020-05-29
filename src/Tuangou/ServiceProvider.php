<?php

namespace Demokn\Dianping\Tuangou;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['tuangou'] = function ($app) {
            return new Client($app);
        };
    }
}
