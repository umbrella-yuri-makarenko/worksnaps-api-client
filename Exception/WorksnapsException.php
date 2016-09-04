<?php
// src/Umbrella/Worksnaps/Exception/WorksnapsException.php
namespace Umbrella\WorksnapsBundle\Exception;

/**
 * Class WorksnapsException
 * @package Umbrella\WorksnapsBundle\Exception
 */
class WorksnapsException extends \Exception
{
    /**
     * WorksnapsException constructor.
     *
     * @param string $message
     * @param int $code
     * @param \Exception|null $previous
     */
    public function __construct($message = "", $code = 0, \Exception $previous = null)
    {
        $message = "Worksnaps API Exception: $message";
        parent::__construct($message, $code, $previous);
    }
}
