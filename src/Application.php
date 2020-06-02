<?php

namespace Demokn\Dianping;

use Demokn\Dianping\Core\ServiceContainer;

/**
 * Class Application.
 * @package Demokn\Dianping
 *
 * @property \Demokn\Dianping\OAuth\Client $oauth
 * @property \Demokn\Dianping\OAuth\SessionClient $session
 * @property \Demokn\Dianping\Poi\Client $poi
 * @property \Demokn\Dianping\MerchantData\Client $merchant_data
 * @property \Demokn\Dianping\Ugc\Client $ugc
 * @property \Demokn\Dianping\Book\Client $book
 * @property \Demokn\Dianping\Tuangou\Client $tuangou
 */
class Application extends ServiceContainer
{
    protected $providers = [
        OAuth\ServiceProvider::class,
        Poi\ServiceProvider::class,
        MerchantData\ServiceProvider::class,
        Ugc\ServiceProvider::class,
        Book\ServiceProvider::class,
        Tuangou\ServiceProvider::class,
    ];
}
