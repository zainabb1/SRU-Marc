<?php

namespace Scriptotek\Marc\Fields;

use Scriptotek\Marc\Record;

class Publisher extends Field implements FieldInterface
{
    public static function get(Record $record, $tag)
    {
        return parent::makeFieldObject($record, $tag);
    }

    /**
     * Returns the string representation $a, $b, $c).
    */
    public function __ToString()
    {
        // $a is not repeated
        $b = $this->field->getSubfield('b');
        $publisher = $b ? trim($b->getData()) : '';
        return $publisher;
    }

     public function __DateOfPublicationToString()
    {
        // $a is not repeated
        $c = $this->field->getSubfield('c');
        $publisher = $c ? trim($c->getData()) : '';
        return $publisher;
    }

    public function __PlaceOfPublicationToString()
    {
        // $a is not repeated
        $a = $this->field->getSubfield('a');
        $publisher = $a ? trim($a->getData()) : '';
        return $publisher;
    }
}
