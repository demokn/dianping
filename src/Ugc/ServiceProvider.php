<?php

namespace Demokn\Dianping\Ugc;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['ugc'] = function ($app) {
            return new Client($app);
        };
    }
}
