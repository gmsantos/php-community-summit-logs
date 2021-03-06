<?php

namespace App\Logs;

use Monolog\Logger;
use Monolog\Handler\SocketHandler;

/**
 * Based on LogEntriesHandler from Monolog
 */
class InsightOpsHandler extends SocketHandler
{
    /**
     * @var string
     */
    protected $logToken;

    /**
     * @param string $token  Log token supplied by InsightOps
     * @param string $region Region where InsightOps account is hosted. Could be 'us' or 'eu'
     * @param bool   $useSSL Whether or not SSL encryption should be used
     * @param int    $level  The minimum logging level to trigger this handler
     * @param bool   $bubble Whether or not messages that are handled should bubble up the stack.
     *
     * @throws MissingExtensionException If SSL encryption is set to true and OpenSSL is missing
     */
    public function __construct($token, $region = 'us', $useSSL = true, $level = Logger::DEBUG, $bubble = true)
    {
        if ($useSSL && !extension_loaded('openssl')) {
            throw new MissingExtensionException('The OpenSSL PHP plugin is required to use SSL encrypted connection for LogEntriesHandler');
        }

        $endpoint = $useSSL
            ? 'ssl://'.$region.'.data.logs.insight.rapid7.com:443'
            : $region.'.data.logs.insight.rapid7.com:80';

        parent::__construct($endpoint, $level, $bubble);
        $this->logToken = $token;
    }

    /**
     * {@inheritdoc}
     *
     * @param  array  $record
     * @return string
     */
    protected function generateDataStream($record)
    {
        return $this->logToken . ' ' . $record['formatted'];
    }
}
