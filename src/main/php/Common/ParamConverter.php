<?php namespace Motorphp\SilexAnnotations\Common;

use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Annotations used to configure a converter for request parameter
 *
 * @Annotation
 * @Target("METHOD")
 */
class ParamConverter
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