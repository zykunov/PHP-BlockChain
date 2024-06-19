<?php

namespace App\Service\Chain;

use App\Controller\Chain;
use App\Service\Block\Validator;

class ChainValidator
{

    private Validator $blockValidator;

    public function __construct($blockValidator)
    {
        $this->blockValidator = $blockValidator;
    }

    public function validate(Chain $chain): bool
    {

        $blocks = $chain->getBlocks();

        $length = count($blocks);

        for ($i = 1; $i < $length; $i++) {
            if (!$this->blockValidator->Validate($blocks[$i - 1], $blocks[$i])) {
                return false;
            }
        }

        return true;
    }

}