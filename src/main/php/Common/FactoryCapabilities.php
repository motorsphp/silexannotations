<?php namespace Motorphp\SilexAnnotations\Common;

use Doctrine\Common\Annotations\Annotation\Target;

/**
 * Annotations used to denote a service factory
 *
 * @Annotation
 * @Target("METHOD")
 */
class FactoryCapabilities
{
    /**
     * @var string
     */
    public $firewall;
}