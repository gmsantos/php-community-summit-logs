<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function index(Request $request, LoggerInterface $log)
    {
        $log->info(
            'User {user} ({ip}) speaks {language}',
            [
                'user' => $request->getUser() ?? 'Anonymous',
                'ip' => $request->getClientIp(),
                'language' => $request->getDefaultLocale()
            ]
        );

        return new Response('Welcome');
    }
}
