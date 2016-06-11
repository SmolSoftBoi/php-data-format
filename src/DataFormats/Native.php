<?php

namespace EpicKris\DataFormats;

/**
 * JSON data format trait.
 *
 * @package EpicKris\DataFormats
 */
trait Native
{
    /**
     * Format data to data array.
     *
     * @param array|object $data Data.
     *
     * @return array                     Returns data array.
     * @throws \InvalidArgumentException If data argument is not an array or object.
     */
    public static function toArray($data)
    {
        if (is_array($data)) {
            return $data;
        } elseif (is_object($data)) {
            return self::objectToArray($data);
        } else {
            throw new \InvalidArgumentException('Data argument must be an array or object.');
        }
    }

    /**
     * Format data array to recursive data array.
     *
     * @param array|object $data Data array.
     *
     * @return array                     Returns recursive data array.
     * @throws \InvalidArgumentException If data argument is not an array or object.
     */
    public static function toArrayRecursive($data)
    {
        if (is_array($data)) {
            $arrayRecursive = [];
            foreach ($data as $key => $value) {
                if (is_array($value) || is_object($value)) {
                    $value = self::toArrayRecursive($value);
                }

                $arrayRecursive[$key] = $value;
            }

            return $arrayRecursive;
        } elseif (is_object($data)) {
            return self::objectToArrayRecursive($data);
        } else {
            throw new \InvalidArgumentException('Data argument must be an array or object.');
        }
    }

    /**
     * Format data object to data array.
     *
     * @param object $data Data object.
     *
     * @return array                     Returns data array.
     * @throws \InvalidArgumentException If data argument is not an object.
     */
    public static function objectToArray($data)
    {
        if (! is_object($data)) {
            throw new \InvalidArgumentException('Data argument must be an object.');
        }

        return get_object_vars($data);
    }

    /**
     * Format data object to recursive data array.
     *
     * @param object $data Data object.
     *
     * @return array                     Returns recursive data array.
     * @throws \InvalidArgumentException If data argument is not an object.
     */
    public static function objectToArrayRecursive($data)
    {
        if (! is_object($data)) {
            throw new \InvalidArgumentException('Data argument must be an object.');
        }

        $vars = get_object_vars($data);

        $arrayRecursive = [];
        foreach ($vars as $key => $value) {
            if (is_object($value)) {
                $value = self::objectToArrayRecursive($value);
            }

            $arrayRecursive[$key] = $value;
        }

        return $arrayRecursive;
    }

    /**
     * Format data to data object.
     *
     * @param array|object $data Data.
     *
     * @return object Returns data object.
     */
    public static function toObject($data)
    {
        if (is_array($data)) {
            return self::arrayToObject($data);
        } elseif (is_object($data)) {
            return $data;
        } else {
            throw new \InvalidArgumentException('Data argument must be an array or object.');
        }
    }

    /**
     * Format data to recursive data object.
     *
     * @param array|object $data Data.
     *
     * @return object                    Returns recursive data object.
     * @throws \InvalidArgumentException If data argument is not an array or object.
     */
    public static function toObjectRecursive($data)
    {
        if (is_array($data)) {
            return self::arrayToObjectRecursive($data);
        } elseif (is_object($data)) {
            $array = self::objectToArray($data);

            foreach ($array as $key => $value) {
                if (is_array($value) || is_object($value)) {
                    $value = self::toObjectRecursive($data);
                }

                $data->$key = $value;
            }

            return $data;
        } else {
            throw new \InvalidArgumentException('Data argument must be an array or object.');
        }
    }

    /**
     * Format data array to data object.
     *
     * @param array $data Data array.
     *
     * @return object                    Returns data object.
     * @throws \InvalidArgumentException If data argument is not an array.
     */
    public static function arrayToObject($data)
    {
        if (! is_array($data)) {
            throw new \InvalidArgumentException('Data argument must be an array.');
        }

        $object = new \stdClass();
        foreach ($data as $key => $value) {
            $object->$key = $value;
        }

        return $object;
    }

    /**
     * Format data array to recursive data object.
     *
     * @param array $data Data array.
     *
     * @return object                    Returns recursive data object.
     * @throws \InvalidArgumentException If data argument is not an array.
     */
    public static function arrayToObjectRecursive($data)
    {
        if (! is_array($data)) {
            throw new \InvalidArgumentException('Data argument must be an array.');
        }

        $objectRecursive = new \stdClass();
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $value = self::arrayToObjectRecursive($data);
            }

            $objectRecursive->$key = $value;
        }

        return $objectRecursive;
    }
}
