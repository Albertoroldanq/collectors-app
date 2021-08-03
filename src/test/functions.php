<?php
require_once '../../functions.php';

use PHpUnit\Framework\TestCase; // magic code needed for the PHPUnit

//copied from the unit testing exercise

class Functions extends TestCase {
    public function testSuccessCreateWineCard() {
        $expectedOutput =
            '<div class="wine-card">
                        <h2>Vinalba Malbec</h2>
                        <div class="wine-caracteristics">
                            <h3>Red</h3>
                            <h3>Argentina</h3>
                            <h3>Malbec</h3>
                        </div>
                      </div>';
        $input = [0 => [
            'id'=> 1,
            'name'=>'Vinalba Malbec',
            'origin'=> 'Argentina',
            'type'=> 'Red',
            'grape'=> 'Malbec']
        ];
        $actualOutput = createWineCard($input);
        // what makes the test flag up as pass or fail
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testFailureCreateWineCard() {
        $expectedOutput = 'incorrect db format';
        $input = [0 => [
            'id'=> 1,
            'name'=>[],
            'origin'=> 'Argentina',
            'type'=> 1,
            'grape'=> 'Malbec']
        ];;
        $actualOutput = createWineCard($input);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testMalformedCreateWineCard() {
        $input = 'hello';

        // telling the test to expect this tpe of error when the function bring tested is called
        $this->expectException(TypeError::class);
        $actualOutput = createWineCard($input);
    }
}
