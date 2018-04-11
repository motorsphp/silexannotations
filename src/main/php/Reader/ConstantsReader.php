<?php namespace Motorphp\SilexAnnotations\Reader;

use Doctrine\Common\Annotations\Annotation\Target;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\DocParser;
use Doctrine\Common\Annotations\Reader;

class ConstantsReader implements Reader
{
    /**
     * @var DocParser
     */
    private $parser;

    /**
     * @var Reader
     */
    private $reader;

    public static function instance(): ConstantsReader
    {
        $parser = new DocParser();
        $reader = new AnnotationReader($parser);
        return new ConstantsReader($parser, $reader);
    }

    public function __construct(DocParser $parser, Reader $reader)
    {
        $this->parser = $parser;
        $this->reader = $reader;
    }

    public function getConstantAnnotations(\ReflectionClassConstant $constant) : array
    {
        $class   = $constant->getDeclaringClass();
        $this->reader->getClassAnnotations($class); // must build the imports cache of the parser

        $context = 'constant ' . $class->getName() . '::' . $constant->getName();

        $this->parser->setTarget(Target::TARGET_PROPERTY);
        return $this->parser->parse($constant->getDocComment(), $context);
    }

    public function getConstantAnnotation(\ReflectionClassConstant $method, $annotationName)
    {
        $annotations = $this->getConstantAnnotations($method);

        foreach ($annotations as $annotation) {
            if ($annotation instanceof $annotationName) {
                return $annotation;
            }
        }

        return null;
    }

    /**
     * Gets the annotations applied to a class.
     *
     * @param \ReflectionClass $class The ReflectionClass of the class from which
     *                                the class annotations should be read.
     *
     * @return array An array of Annotations.
     */
    function getClassAnnotations(\ReflectionClass $class)
    {
        return $this->reader->getClassAnnotations($class);
    }

    /**
     * Gets a class annotation.
     *
     * @param \ReflectionClass $class The ReflectionClass of the class from which
     *                                         the class annotations should be read.
     * @param string $annotationName The name of the annotation.
     *
     * @return object|null The Annotation or NULL, if the requested annotation does not exist.
     */
    function getClassAnnotation(\ReflectionClass $class, $annotationName)
    {
        return $this->reader->getClassAnnotation($class, $annotationName);
    }

    /**
     * Gets the annotations applied to a method.
     *
     * @param \ReflectionMethod $method The ReflectionMethod of the method from which
     *                                  the annotations should be read.
     *
     * @return array An array of Annotations.
     */
    function getMethodAnnotations(\ReflectionMethod $method)
    {
        return $this->reader->getMethodAnnotations($method);

    }

    /**
     * Gets a method annotation.
     *
     * @param \ReflectionMethod $method The ReflectionMethod to read the annotations from.
     * @param string $annotationName The name of the annotation.
     *
     * @return object|null The Annotation or NULL, if the requested annotation does not exist.
     */
    function getMethodAnnotation(\ReflectionMethod $method, $annotationName)
    {
        return $this->reader->getMethodAnnotation($method, $annotationName);
    }

    /**
     * Gets the annotations applied to a property.
     *
     * @param \ReflectionProperty $property The ReflectionProperty of the property
     *                                      from which the annotations should be read.
     *
     * @return array An array of Annotations.
     */
    function getPropertyAnnotations(\ReflectionProperty $property)
    {
        return $this->reader->getPropertyAnnotations($property);
    }

    /**
     * Gets a property annotation.
     *
     * @param \ReflectionProperty $property The ReflectionProperty to read the annotations from.
     * @param string $annotationName The name of the annotation.
     *
     * @return object|null The Annotation or NULL, if the requested annotation does not exist.
     */
    function getPropertyAnnotation(\ReflectionProperty $property, $annotationName)
    {
        return $this->reader->getPropertyAnnotation($property, $annotationName);
    }
}
