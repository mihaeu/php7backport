<?php

require_once __DIR__ . '/BackporterFunctionalTestAbstract.php';


class ScalarTypehintTest extends BackporterFunctionalTestAbstract
{
    /**
     * @dataProvider invalidTypeHintProvider
     */
    public function testScalarTypeHint(string $typeHint)
    {
        $code = '<?php function foo(' . $typeHint . ' $x, SomeClass $y) {}';
        $expected = '<?php function foo($x, SomeClass $y) {}';
        $this->assertEquals($expected, $this->backporter->port($code));
    }


    public function invalidTypeHintProvider() : array
    {
        return [
            ['float'],
            ['double'],
            ['string'],
            ['int'],
            ['bool'],
            ['boolean'],
            ['iterable'],
        ];
    }
}
