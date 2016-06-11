<?php

namespace EpicKris\DataFormats;

/**
 * Native data format interface.
 *
 * @package EpicKris\DataFormats
 */
interface NativeInterface
{
    /**
     * Format data to data array.
     *
     * @param array|object $data Data.
     *
     * @return array Returns data array.
     */
    public static function toArray($data);

    /**
     * Format data array to recursive data array.
     *
     * @param array|object $data Data array.
     *
     * @return array Returns recursive data array.
     */
    public static function toArrayRecursive($data);

    /**
     * Format data object to data array.
     *
     * @param object $data Data object.
     *
     * @return array Returns data array.
     */
    public static function objectToArray($data);

    /**
     * Format data object to recursive data array.
     *
     * @param object $data Data object.
     *
     * @return array Returns recursive data array.
     */
    public static function objectToArrayRecursive($data);

    /**
     * Format data to data object.
     *
     * @param array|object $data Data.
     *
     * @return object Returns data object.
     */
    public static function toObject($data);

    /**
     * Format data to recursive data object.
     *
     * @param array|object $data Data.
     *
     * @return object Returns recursive data object.
     */
    public static function toObjectRecursive($data);

    /**
     * Format data array to data object.
     *
     * @param array $data Data array.
     *
     * @return object Returns data object.
     */
    public static function arrayToObject($data);

    /**
     * Format data array to recursive data object.
     *
     * @param array $data Data array.
     *
     * @return object Returns recursive data object.
     */
    public static function arrayToObjectRecursive($data);
}
