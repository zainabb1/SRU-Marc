<?php namespace Scriptotek\Sru;

class RecordTest extends TestCase
{
	public function testMake() {
		$record = Record::make(29, 'Hello world');

		$this->assertInstanceOf('Scriptotek\Sru\Record', $record);
		$this->assertEquals(29, $record->position);
	}
}