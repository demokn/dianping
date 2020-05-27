<?php

namespace Demokn\Dianping\Book;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['book'] = function ($app) {
            return new Client($app);
        };
    }
}
