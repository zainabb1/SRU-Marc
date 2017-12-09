<?php namespace Scriptotek\Sru;

use Danmichaelo\QuiteSimpleXMLElement\QuiteSimpleXMLElement;

/**
 * Single record from a SRU response
 */
class Record
{
    /** @var int */
    public $position;

    /** @var string */
    public $packing;

    /** @var string */
    public $schema;

    /** @var QuiteSimpleXMLElement */
    public $data;

    static $recordTpl = '<s:record xmlns:s="http://www.loc.gov/zing/srw/">
            <s:recordSchema>{{recordSchema}}</s:recordSchema>
            <s:recordPacking>{{recordPacking}}</s:recordPacking>
            <s:recordPosition>{{position}}</s:recordPosition>
            <s:recordData>{{data}}</s:recordData>
          </s:record>';

    /**
     * Create a new record
     * @param QuiteSimpleXMLElement $doc
     */
    public function __construct(QuiteSimpleXMLElement $doc)
    {
        $this->position = intval($doc->text('./srw:recordPosition'));
        $this->packing = $doc->text('./srw:recordPacking');
        $this->schema = $doc->text('./srw:recordSchema');
        $this->data = $doc->first('./srw:recordData');
    }

    /**
     * @param int $position
     * @param string|QuiteSimpleXMLElement $data
     * @param string $recordSchema
     * @param string $recordPacking
     * @return Record
     */
    public static function make($position, $data, $recordSchema='marcxchange', $recordPacking='xml')
    {
        $record = str_replace(
            array('{{position}}', '{{data}}', '{{recordSchema}}', '{{recordPacking}}'),
            array($position, $data, $recordSchema, $recordPacking),
            self::$recordTpl
        );

        return new Record(QuiteSimpleXMLElement::make($record, Response::$nsPrefixes));
    }
}
