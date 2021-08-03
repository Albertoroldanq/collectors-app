<?php
require_once '../../functions.php';

use PHpUnit\Framework\TestCase;

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
        $input = [[
            'id'=> 1,
            'name'=>'Vinalba Malbec',
            'origin'=> 'Argentina',
            'type'=> 'Red',
            'grape'=> 'Malbec'
        ]];
        $actualOutput = createWineCard($input);
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

        $this->expectException(TypeError::class);
        $actualOutput = createWineCard($input);
    }
}
