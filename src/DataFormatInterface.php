<?php

namespace EpicKris;

/**
 * Data format interface.
 *
 * @package EpicKris
 */
interface DataFormatInterface
{
    /**
     * Has format.
     *
     * @param string      $format Format.
     * @param string|null $to     To format.
     *
     * @return bool|string Returns true if format exists, method name if method exists, else false.
     */
    public static function hasFormat($format, $to = null);
}
