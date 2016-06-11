<?php

namespace EpicKris;

use EpicKris\DataFormats\CsvInterface;
use EpicKris\DataFormats\JsonInterface;
use EpicKris\DataFormats\NativeInterface;
use EpicKris\DataFormats\XmlInterface;

/**
 * Data format.
 *
 * Convert between various data formats.
 *
 * @package EpicKris
 */
class DataFormat implements NativeInterface, CsvInterface, JsonInterface, XmlInterface
{
    use DataFormats\Native;
    use DataFormats\Csv;
    use DataFormats\Json;
    use DataFormats\Xml;
}
