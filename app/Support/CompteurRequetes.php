<?php

namespace App\Support;

class CompteurRequetes
{
    public int $total = 0;

    public function incrementer(): void
    {
        $this->total++;
    }
}