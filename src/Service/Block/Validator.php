<?php

namespace App\Service\Block;

use App\Entity\Block;

class Validator
{

    private Hasher $hasher;

    /**
     * @param Hasher $hasher
     */
    public function __construct(Hasher $hasher)
    {
        $this->hasher = $hasher;
    }

    /**
     * @param Block $oldBlock
     * @param Block $newBlock
     * @return bool
     */
    public function Validate(Block $oldBlock, Block $newBlock): bool
    {

        // проверка правильности индекса
        if ($oldBlock->getIndex() + 1 != $newBlock->getIndex()) {
            return false;
        }

        // проверка одинаковости хэшей
        if ($oldBlock->getHash() != $newBlock->getPrevHash()) {
            return false;
        }

        //проверка правильно ли вычислен хэш для нового блока
        if ($newBlock->getHash() != $this->hasher->getHash($newBlock)) {
            return false;
        }

        return true;
    }

}