<?php

namespace Scriptotek\Marc\Fields;

use Scriptotek\Marc\Record;

//other author like translator, editor etc...
class Contributor extends Field implements FieldInterface
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
        return parent::makeFieldObjects($record, '700');
    }
}
