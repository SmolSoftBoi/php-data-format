<?php

namespace EpicKris\DataFormats;

/**
 * CSV data format trait.
 *
 * @package EpicKris\DataFormats
 */
trait Csv
{
    /**
     * Format data to CSV string.
     *
     * @param array|object $data Data.
     *
     * @return string                    Returns CSV string.
     * @throws \InvalidArgumentException If data argument is not an array or object.
     */
    public static function toCsv($data)
    {
        if (! is_array($data) && ! is_object($data)) {
            throw new \InvalidArgumentException('Data argument must be an array or object.');
        }

        if (is_object($data)) {
            $data = get_object_vars($data);
        }

        $headings = array_keys($data);

        $output = implode(',', $headings) . '\r\n';
        foreach ($data as $value) {
            $output .= '"' . implode('","', $value) . '"\r\n';
        }

        return $output;
    }

    /**
     * Format data array to CSV string.
     *
     * @param array $data Data array.
     *
     * @return string                    Returns CSV string.
     * @throws \InvalidArgumentException If data argument is not an array.
     */
    public static function arrayToCsv($data)
    {
        if (! is_array($data)) {
            throw new \InvalidArgumentException('Data argument must be an array.');
        }

        return self::toCsv($data);
    }

    /**
     * Format data object to CSV string.
     *
     * @param object $data Data object.
     *
     * @return string                    Returns CSV string.
     * @throws \InvalidArgumentException If CSV argument is not an object.
     */
    public static function objectToCsv($data)
    {
        if (! is_object($data)) {
            throw new \InvalidArgumentException('Data argument must be an object.');
        }

        return self::toCsv($data);
    }

    /**
     * Format CSV string to data array.
     *
     * @param string $csv CSV string.
     *
     * @return array                     Returns data array.
     * @throws \InvalidArgumentException If CSV argument is not a CSV string.
     */
    public static function csvToArray($csv)
    {
        if (! is_string($csv)) {
            throw new \InvalidArgumentException('CSV argument must be a CSV string.');
        }

        $csv = trim($csv);

        return str_getcsv($csv);
    }

    /**
     * Format CSV string to data object.
     *
     * @param string $csv CSV string.
     *
     * @return object Returns data object.
     * @throws \InvalidArgumentException If CSV argument is not a CSV string.
     */
    public static function csvToObject($csv)
    {
        if (! is_string($csv)) {
            throw new \InvalidArgumentException('CSV argument must be a CSV string.');
        }

        $csv = trim($csv);
        $array = str_getcsv($csv);

        $object = new \stdClass();
        foreach ($array as $key => $value) {
            $object->$key = $value;
        }
    }
}
