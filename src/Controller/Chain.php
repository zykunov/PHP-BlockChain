<?php

namespace App\Controller;

class Chain
{

    private array $blocks;

    /**
     * @param array $blocks
     */
    public function __construct(array $blocks)
    {
        $this->blocks = $blocks;
    }

    /**
     * @return array
     */
    public function getBlocks(): array{
        return $this->blocks;
    }

    public function updateBlocks(array $blocks): self{
        $this->blocks=$blocks;
        return $this;
    }

}