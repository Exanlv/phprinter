<?php

namespace Exan\Phprint;

use Exan\Phprint\Services\FileNamingService;
use Exan\Phprint\Services\PrintService;

class PrintController
{
    public function __construct(
        private readonly FileNamingService $fileNamingService,
        private readonly PrintService $printService,
        private readonly string $uploadDir,
    ) {
    }

    public function upload(): void
    {
        $filePath = $this->uploadDir . '/' . $this->fileNamingService->createUniqueName($_FILES['pdf']['name']);

        move_uploaded_file(
            $_FILES['pdf']['tmp_name'],
            $filePath,
        );

        $this->printService->printFile($filePath);

        header( "Refresh:5; url=/", true, 303);

        echo 'File print has started';
    }
}
