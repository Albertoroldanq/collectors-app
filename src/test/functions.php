<?php
require_once '../../functions.php';

use PHpUnit\Framework\TestCase;

class Functions extends TestCase {
    public function testSuccessCreateWineCards() {
        $expectedOutput = '
                    <div class ="wine-card-wrapper red-label">
                        <div class="wine-card" id="1">
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
                        <div class="item-settings">
                            <form class="submitRating" action="submitRating.php" method="POST" id="rating-1" name="rating-1">
                                <div class="wine-rating">
                                    <input class="stars" type="radio" id="star5-1" name="rating" value="5-1" />
                                    <label for="star5-1" title="text">5 stars</label>
                                    <input class="stars" type="radio" id="star4-1" name="rating" value="4-1" />
                                    <label for="star4-1" title="text">4 stars</label>
                                    <input class="stars" type="radio" id="star3-1" name="rating" value="3-1" />
                                    <label for="star3-1" title="text">3 stars</label>
                                    <input class="stars" type="radio" id="star2-1" name="rating" value="2-1" />
                                    <label for="star2-1" title="text">2 stars</label>
                                    <input class="stars" type="radio" id="star1-1" name="rating" value="1-1" />
                                    <label for="star1-1" title="text">1 star</label>
                                </div>
                            </form>
                            <div class="heart-container">
                                 <form action="submitFavorite.php" method="POST">
                            <div class="wine-favorite">
                                <label for="favorite-1">
                                    <input class ="" type="checkbox" name="favorite" id="favorite-1" value="0-1" />
                                    <span class="lbl padding-8"></span>
                                </label>
                            </div>
                           </form>
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
        ];
        $actualOutput = createWineCards($input);
        $this->assertEquals($expectedOutput, $actualOutput);
    }

    public function testMalformedCreateWineCards() {
        $input = 'hello';

        $this->expectException(TypeError::class);
        $actualOutput = createWineCards($input);
    }
}
