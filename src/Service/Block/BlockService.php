<?php

namespace App\Service\Block;

use App\Entity\Block;

class BlockService
{

    private ChainService $chainService;
    private Hasher $hasher;

    public function __construct(ChainService $chainService, Hasher $hasher)
    {
        $this->chainService = $chainService;
        $this->hasher = $hasher;
    }

    public function blockCreate(string $data): Block
    {
        $prevBlock = $this->chainService->getLastBlock();

        $index = $prevBlock->getIndex();
        $prevHash = $prevBlock->getHash();

        $newBlock = new Block($index, $prevHash, $data);

        $hash = $this->hasher->getHash($newBlock);
        $newBlock->setHash($hash);

        return $newBlock;

    }

}