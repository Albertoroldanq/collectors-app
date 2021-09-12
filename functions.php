<?php

function createWineCards(array $allWines): string {
        $htmlWineCards = '';
        $invalidInput = false;

        foreach ($allWines as $wine) {
            if(!is_string($wine['name']) || !is_string($wine['type']) || !is_string($wine['origin']) || !is_string($wine['grape'])){
                $invalidInput = true;
            } else {
                $wineTypeClass = strtolower($wine['type']);
                $selectedFive = '';
                $selectedFour = '';
                $selectedThree = '';
                $selectedTwo = '';
                $selectedOne = '';
                $checkedFavorite = "";
                $checkedValue = 0;
                if (isset($wine['rating']) && isset($wine['favorite'])){
                    switch($wine['rating']) {
                        case 5:
                            $selectedFive = 'checked';
                            break;
                        case 4:
                            $selectedFour = 'checked';
                            break;
                        case 3:
                            $selectedThree = 'checked';
                            break;
                        case 2:
                            $selectedTwo = 'checked';
                            break;
                        case 1:
                            $selectedOne = 'checked';
                            break;
                        default:
                            break;
                    }
                    $checkedFavorite = $wine['favorite'] ? 'checked' : "";
                    $checkedValue = $checkedFavorite ? 1 : 0;
                }
                $htmlWineCards .= '
                    <div class ="wine-card-wrapper '.$wineTypeClass. '-label">
                        <div class="wine-card" id="'.$wine['id'].'">
                        <h2 class="'.$wineTypeClass.'-wine-title">'
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
                        <div class="item-settings">
                            <form class="submitRating" action="submitRating.php" method="POST" id="rating-'.$wine['id'].'" name="rating-'.$wine['id'].'">
                                <div class="wine-rating">
                                    <input class="stars" type="radio" id="star5-'.$wine['id'].'" name="rating" value="5-'.$wine['id'].'" '.$selectedFive.'/>
                                    <label for="star5-'.$wine['id'].'" title="text">5 stars</label>
                                    <input class="stars" type="radio" id="star4-'.$wine['id'].'" name="rating" value="4-'.$wine['id'].'" '.$selectedFour.'/>
                                    <label for="star4-'.$wine['id'].'" title="text">4 stars</label>
                                    <input class="stars" type="radio" id="star3-'.$wine['id'].'" name="rating" value="3-'.$wine['id'].'" '.$selectedThree.'/>
                                    <label for="star3-'.$wine['id'].'" title="text">3 stars</label>
                                    <input class="stars" type="radio" id="star2-'.$wine['id'].'" name="rating" value="2-'.$wine['id'].'" '.$selectedTwo.'/>
                                    <label for="star2-'.$wine['id'].'" title="text">2 stars</label>
                                    <input class="stars" type="radio" id="star1-'.$wine['id'].'" name="rating" value="1-'.$wine['id'].'" '.$selectedOne.'/>
                                    <label for="star1-'.$wine['id'].'" title="text">1 star</label>
                                </div>
                            </form>
                            <div class="heart-container">
                                 <form action="submitFavorite.php" method="POST">
                            <div class="wine-favorite">
                                <label for="favorite-'.$wine['id'].'">
                                    <input class ="'.$checkedFavorite.'" type="checkbox" name="favorite" id="favorite-'.$wine['id'].'" value="'.$checkedValue.'-'.$wine['id'].'" />
                                    <span class="lbl padding-8"></span>
                                </label>
                            </div>
                           </form>
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

