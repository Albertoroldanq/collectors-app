<?php

function createWineCards(array $allWines): string {
        $htmlWineCards = '';
        $invalidInput = false;
        foreach ($allWines as $wine) {
            if(!is_string($wine['name'])|| !is_string($wine['type']) || !is_string($wine['origin']) || !is_string($wine['grape'])){
                $invalidInput = true;
            } else {
                $htmlWineCards .= '<div class="wine-card">
                        <h2>'
                        . $wine['name'] .
                        '</h2>
                        <div class="wine-characteristics">
                            <h3>' . $wine['type'] . '</h3>
                            <h3>' . $wine['origin'] . '</h3>
                            <h3>' . $wine['grape'] . '</h3>
                        </div>
                      </div>';
            }
            if ($invalidInput) {
                return 'incorrect db format';
            }
        }
    return $htmlWineCards;
}
