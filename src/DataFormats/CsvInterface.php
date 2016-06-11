<?php

namespace EpicKris\DataFormats;

/**
 * CSV data format interface.
 *
 * @package EpicKris\DataFormats
 */
interface CsvInterface
{
    /**
     * Format data to CSV string.
     *
     * @param array|object $data Data.
     *
     * @return string Returns CSV string.
     */
    public static function toCsv($data);

    /**
     * Format data array to CSV string.
     *
     * @param array $data Data array.
     *
     * @return string Returns CSV string.
     */
    public static function arrayToCsv($data);

    /**
     * Format data object to CSV string.
     *
     * @param object $data Data object.
     *
     * @return string Returns CSV string.
     */
    public static function objectToCsv($data);

    /**
     * Format CSV string to data array.
     *
     * @param string $csv CSV string.
     *
     * @return array Returns data array.
     */
    public static function csvToArray($csv);

    /**
     * Format CSV string to data object.
     *
     * @param string $csv CSV string.
     *
     * @return object Returns data object.
     */
    public static function csvToObject($csv);
}
