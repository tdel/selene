<?php


namespace App\Backend\ApiPlatform;


use ApiPlatform\Core\Operation\PathSegmentNameGeneratorInterface;
use Doctrine\Common\Inflector\Inflector;

final class SpecificNameGenerator implements PathSegmentNameGeneratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function getSegmentName(string $name, bool $collection = true): string
    {
        return strtolower(preg_replace('~(?<=\\w)([A-Z])~', '-$1', $name));
    }

}
