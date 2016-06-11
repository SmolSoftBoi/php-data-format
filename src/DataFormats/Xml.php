<?php

namespace EpicKris\DataFormats;

/**
 * XML data format trait.
 *
 * @package EpicKris\DataFormats
 */
trait Xml
{
    /**
     * Format data to XML string.
     *
     * @param array|object $data Data.
     *
     * @return string                    Returns XML string.
     * @throws \InvalidArgumentException If data argument is not an array or object.
     */
    public static function toXml($data)
    {
        if (! is_array($data) && ! is_object($data)) {
            throw new \InvalidArgumentException('Data argument must be an array or object.');
        }

        if (is_object($data)) {
            $data = get_object_vars($data);
        }

        if (ini_get('zend.ze1_compatibility_mode') == true) {
            ini_set('zend.ze1_compatibility_mode', false);
        }

        $xmlElement = simplexml_load_string('<?xml version="1.0" encoding="utf-8"?><xml />');

        foreach ($data as $key => $value) {
            if (is_numeric($key)) {
                $key = 'item';
            }

            $key = preg_replace('/[^a-z_\-0-9]/i', '', $key);

            if (is_array($value) || is_object($value)) {
                $value = self::toXml($value);
            } else {
                if (is_bool($value)) {
                    $value = (int) $value;
                }

                $value = html_entity_decode($value, ENT_QUOTES, 'UTF-8');
                $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }

            $xmlElement->addChild($key, $value);
        }

        return $xmlElement->asXML();
    }

    /**
     * Format data array to XML string.
     *
     * @param array $data Data array.
     *
     * @return string                    Returns XML string.
     * @throws \InvalidArgumentException If data argument is not an array.
     */
    public static function arrayToXml($data)
    {
        if (! is_array($data)) {
            throw new \InvalidArgumentException('Data argument must be an array.');
        }

        self::toXml($data);
    }

    /**
     * Format data object to XML string.
     *
     * @param object $data Data object.
     *
     * @return string                    Returns XML string.
     * @throws \InvalidArgumentException If data argument is not an object.
     */
    public static function objectToXml($data)
    {
        if (! is_object($data)) {
            throw new \InvalidArgumentException('Data argument must be an object.');
        }

        self::toXml($data);
    }

    /**
     * Format XML string to data array.
     *
     * @param string $xml XML string.
     *
     * @return array                     Returns data array.
     * @throws \InvalidArgumentException If XML argument is not an XML string.
     */
    public static function xmlToArray($xml)
    {
        if (! is_string($xml)) {
            throw new \InvalidArgumentException('XML argument must be an XML string.');
        }

        $xml = trim($xml);
        $xmlElement = simplexml_load_string($xml);

        $array = [];
        foreach ($xmlElement as $key => $value) {
            $array[$key] = $value;
        }

        return $array;
    }

    /**
     * Format XML string to data object.
     *
     * @param string $xml XML string.
     *
     * @return object                    Returns data object.
     * @throws \InvalidArgumentException If XML argument is not an XML string.
     */
    public static function xmlToObject($xml)
    {
        if (! is_string($xml)) {
            throw new \InvalidArgumentException('XML argument must be an XML string.');
        }

        $xml = trim($xml);
        $xmlElement = simplexml_load_string($xml);

        $object = new \stdClass();
        foreach ($xmlElement as $key => $value) {
            $object->$key = $value;
        }

        return $object;
    }
}
