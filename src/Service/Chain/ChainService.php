<?php

namespace App\Service\Chain;

use App\Controller\Chain;
use App\Entity\Block;
use App\Service\Block\BlockService;
use App\Service\Storage\DBStorage;
use mysql_xdevapi\Exception;

class ChainService
{

    private ChainValidator $chainValidator;
    private DBStorage $storage;

    public function __construct(ChainValidator $chainValidator, DBStorage $storage)
    {
        $this->chainValidator = $chainValidator;
        $this->storage = $storage;
    }

    public function appendNewBlock(Block $newBlock): Chain
    {

        $currentChain = $this->getCurrentChain();

        $blocks = $currentChain->getBlocks();

        $blocks[] = $newBlock;

        return $currentChain->updateBlocks($blocks);
    }

    private function getCurrentChain(): Chain
    {
        return $this->storage->get();
    }

    public function saveCurrentChain(Chain $chain): void
    {

        $isChainValid = $this->chainValidator->validate($chain);

        if (!$isChainValid) {
            throw new Exception("Invalid chain");
        }

        $this->storage->save($chain);
    }

    public function getLastBlock(Chain $chain): Block
    {
        $blocks = $this->getCurrentChain()->getBlocks();

        return end($blocks);
    }

}