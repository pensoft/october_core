<?php

namespace Pensoft\Maintenance\exceptions;

use Carbon\Carbon;
use Symfony\Component\HttpKernel\Exception\HttpException;

class MaintenanceModeException extends HttpException {

    public $wentDownAt;

    public $retryAfter;

    public $willBeAvailableAt;

    public function __construct($time, $retryAfter = null, $message = null, \Exception $previous = null, $code = 0)
    {
        $this->wentDownAt = Carbon::createFromTimestamp($time);

        $headers = [];
        if ($retryAfter) {
            $this->retryAfter = $retryAfter;
            $headers = ['Retry-After' => $this->retryAfter];
            $this->willBeAvailableAt = Carbon::createFromTimestamp($time)->addSeconds($this->retryAfter);
        }

        parent::__construct(503, $message, $previous, $headers, $code);
    }
}