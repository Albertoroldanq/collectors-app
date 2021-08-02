<?php

function createWineCard(array $allWines): string {
    $htmlWineCard = '';
    foreach ($allWines as $wine) {
        $htmlWineCard .= '<div class="wine-card">
                        <h2>'
                        . $wine['name'] .
                        '</h2>
                        <div class="wine-caracteristics">
                            <h3>' . $wine['type'] . '</h3>
                            <h3>' . $wine['origin'] . '</h3>
                            <h3>' . $wine['grape'] . '</h3>
                        </div>
                      </div>';
        }
    return $htmlWineCard;
}

