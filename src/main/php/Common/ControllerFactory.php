<?php namespace Motorphp\SilexAnnotations\Common;

use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Annotations used to denote a service factory
 *
 * @Annotation
 * @Target("METHOD")
 */
class ControllerFactory
{
    /**
     * @var string
     */
    public $containerKey;
}