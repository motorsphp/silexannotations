<?php namespace Motorphp\SilexAnnotations\Common;

use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Annotation designating a class method as a view handler
 *
 * @Annotation
 * @Target("METHOD")
 */
class ViewHandler
{
    /**
     * @var string
     */
    public $service;

    /**
     * @var string
     */
    public $operation;
}