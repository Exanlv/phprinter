<?php

namespace Exan\Phprint\Services;

class PrintService
{
    public function __construct(
        private readonly string $printerName,
    ) {
    }

    public function printFile(string $file): void
    {
        shell_exec("lp -d {$this->printerName} {$file}");
    }
}
