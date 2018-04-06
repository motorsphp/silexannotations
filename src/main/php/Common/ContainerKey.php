<?php namespace Motorphp\SilexAnnotations\Common;

use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Annotation used to denote a controller key
 *
 * @Annotation
 * @Target("PROPERTY")
 */
class ContainerKey
{
    /**
     * @var string
     */
    public $for;
}