<?php

namespace App\Service\Block;

use App\Entity\Block;

class Hasher
{

    /**
     * @param Block $block
     * @return string
     */
    public function getHash(Block $block): string
    {
        return hash("sha256", $block->getIndex() . $block->getPrevHash() . $block->getTimestamp() . $block->getData());
    }

}