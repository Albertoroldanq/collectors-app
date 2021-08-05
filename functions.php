<?php

function createWineCards(array $allWines): string {
        $htmlWineCards = '';
        $invalidInput = false;

        foreach ($allWines as $wine) {
            if(!is_string($wine['name']) || !is_string($wine['type']) || !is_string($wine['origin']) || !is_string($wine['grape'])){
                $invalidInput = true;
            } else {
                if ($wine['type'] == 'Red'){
                    $htmlWineCards .= '
                    <div class ="wine-card-wrapper red-label">
                        <div class="wine-card">
                        <h2 class="red-wine-title">'
                        . $wine['name'] .
                        '</h2>
                        <div class="wine-characteristics-wrapper">
                            <div class="wine-characteristic">
                                <h3>WINE TYPE</h3>
                                <p>' . $wine['type'] . '</p>
                            </div>
                            <div class="wine-characteristic">
                                <h3>COUNTRY</h3>
                                <p>' . $wine['origin'] . '</p>
                            </div>
                            <div class="wine-characteristic">
                                <h3>GRAPE</h3>
                                <p>' . $wine['grape'] . '</p>
                            </div>
                        </div>
                      </div>
                    </div>';
                } else if ($wine['type'] == 'White')
                $htmlWineCards .= '
                    <div class ="wine-card-wrapper white-label">
                        <div class="wine-card">
                        <h2 class="white-wine-title">'
                        . $wine['name'] .
                        '</h2>
                        <div class="wine-characteristics-wrapper">
                            <div class="wine-characteristic">
                                <h3>WINE TYPE</h3>
                                <p>' . $wine['type'] . '</p>
                            </div>
                            <div class="wine-characteristic">
                                <h3>COUNTRY</h3>
                                <p>' . $wine['origin'] . '</p>
                            </div>
                            <div class="wine-characteristic">
                                <h3>GRAPE</h3>
                                <p>' . $wine['grape'] . '</p>
                            </div>
                        </div>
                      </div>
                    </div>';
            }
            if ($invalidInput) {
                return 'incorrect data inserted';
            }
        }
    return $htmlWineCards;
}

