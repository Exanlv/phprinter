<?php

namespace Exan\Phprint\Services;

use Carbon\Carbon;

class FileNamingService
{
    public function createUniqueName(string $filename): string
    {
        [$filename] = explode('.', $filename);

        $filename = str_replace(' ', '_', $filename);

        return base64_encode(Carbon::now()->toIso8601String())
            . '.' . $filename . '.pdf';
    }
}
