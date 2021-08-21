<?php

function createWineCards(array $allWines): string {
        $htmlWineCards = '';
        $invalidInput = false;

        foreach ($allWines as $wine) {
            if(!is_string($wine['name']) || !is_string($wine['type']) || !is_string($wine['origin']) || !is_string($wine['grape'])){
                $invalidInput = true;
            } else {
                $wineTypeClass = strtolower($wine['type']);
                $favoriteClass = $wine['favorite'] ? 'favorite-item' : 'non-favorite-item';
                $selectedFive = '';
                $selectedFour = '';
                $selectedThree = '';
                $selectedTwo = '';
                $selectedOne = '';
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
                }
                $checkedFavorite = $wine['favorite'] ? 'checked' : '';

                $htmlWineCards .= '
                    <div class ="wine-card-wrapper '.$wineTypeClass. '-label">
                        <div class="wine-card">
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
                            <form action="submitRating.php" method="POST" id="'.$wine['id'].'" name="'.$wine['id'].'">
                                <div class="wine-rating">
                                    <input type="radio" id="star5-'.$wine['id'].'" name="rating" value="5" '.$selectedFive.'/>
                                    <label for="star5-'.$wine['id'].'" title="text">5 stars</label>
                                    <input type="radio" id="star4-'.$wine['id'].'" name="rating" value="4" '.$selectedFour.'/>
                                    <label for="star4-'.$wine['id'].'" title="text">4 stars</label>
                                    <input type="radio" id="star3-'.$wine['id'].'" name="rating" value="3" '.$selectedThree.'/>
                                    <label for="star3-'.$wine['id'].'" title="text">3 stars</label>
                                    <input type="radio" id="star2-'.$wine['id'].'" name="rating" value="2" '.$selectedTwo.'/>
                                    <label for="star2-'.$wine['id'].'" title="text">2 stars</label>
                                    <input type="radio" id="star1-'.$wine['id'].'" name="rating" value="1" '.$selectedOne.'/>
                                    <label for="star1-'.$wine['id'].'" title="text">1 star</label>
                                    <button type="submit" name="id" value="'.$wine['id'].'">OKay</button>
                                </div>
                            </form>
                            <div class="heart-container">
                                 <form action="submitFavorite.php" method="POST">
                            <div class="wine-favorite">
                                <label for="favorite'.$wine['id'].'">
                                    <input type="checkbox" name="favorite" id="favorite'.$wine['id'].'" value="1" '.$checkedFavorite. ' />
                                    <span class="lbl padding-8"></span>
                                </label>
                                <button type="submit" name="id" value="'.$wine['id'].'">OKay</button>
                            </div>
                           </form>
                            </div>
                        </div>
                      </div>
                    </div>';
            if ($invalidInput) {
                return 'incorrect data inserted';
            }
        }
    }
    return $htmlWineCards;
}

