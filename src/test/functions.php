<?php
require_once '../../functions.php';

use PHpUnit\Framework\TestCase;

class Functions extends TestCase {
    public function testSuccessCreateWineCards() {
        $expectedOutput =
            '
                    <div class ="wine-card-wrapper red-label">
                        <div class="wine-card">
                        <h2 class="red-wine-title">Vinalba Malbec</h2>
                        <div class="wine-characteristics-wrapper">
                            <div class="wine-characteristic">
                                <h3>WINE TYPE</h3>
                                <p>Red</p>
                            </div>
                            <div class="wine-characteristic">
                                <h3>COUNTRY</h3>
                                <p>Argentina</p>
                            </div>
                            <div class="wine-characteristic">
                                <h3>GRAPE</h3>
                                <p>Malbec</p>
                            </div>
                        </div>
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
        $expectedOutput = 'incorrect data inserted';
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
