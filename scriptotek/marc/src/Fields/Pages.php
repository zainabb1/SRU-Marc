<?php

namespace Scriptotek\Marc\Fields;

use Scriptotek\Marc\Record;

class Pages extends Field implements FieldInterface
{
    public function __toString()
    {
        $a = $this->field->getSubfield('a');
        if (!$a) {
            return '';
        }

        return $a->getData();
    }

    public static function get(Record $record)
    {
        return parent::makeFieldObject($record, '300');
    }
}
