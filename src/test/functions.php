<?php
require_once '../../functions.php';

use PHpUnit\Framework\TestCase;

class Functions extends TestCase {
    public function testSuccessCreateWineCards() {
        $expectedOutput =
            '<div class="wine-card">
                        <h2>Vinalba Malbec</h2>
                        <div class="wine-characteristics">
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
        $actualOutput = createWineCards($input);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testFailureCreateWineCards() {
        $expectedOutput = 'incorrect db format';
        $input = [0 => [
            'id'=> 1,
            'name'=>[],
            'origin'=> 'Argentina',
            'type'=> 1,
            'grape'=> 'Malbec']
        ];;
        $actualOutput = createWineCards($input);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testMalformedCreateWineCards() {
        $input = 'hello';

        $this->expectException(TypeError::class);
        $actualOutput = createWineCards($input);
    }
}
