<?php

declare(strict_types=1);

namespace Pensoft\Maintenance\Contracts;

use Symfony\Component\HttpFoundation\Response;

interface ResponseMaker
{
    public function getResponse(): Response;
    public function isDownForMaintenance();
}
