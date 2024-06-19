<?php

namespace App\Service\Storage;

use App\Controller\Chain;

interface StorageInterface
{

    public function Save(Chain $chain): void;

    public function get(): Chain;

}