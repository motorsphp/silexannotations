<?php namespace Motorphp\SilexAnnotations\Common;

use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Annotations used to denote a service factory
 *
 * @Annotation
 * @Target("METHOD")
 */
class Parameter
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $default;
}