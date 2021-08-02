<html>
<head>
    <!--CUSTOM STYLESHEET-->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Winery List</h1>
<div class="wine-cards-container">
    <!-- >should  i create a wine class? and then call the class inside the html -->
    <?php
    foreach ($allWines as $wine) {
        echo '<div class="wine-card">
                    <h2>'
            .  $wine['name'] .
            '</h2>
                    <div class="wine-caracteristics">
                        <h3>' . $wine['type'] . '</h3>
                        <h3>' . $wine['origin'] . '</h3>
                        <h3>' . $wine['grape'] . '</h3>
                    </div>
                  </div>';
    } ?>
</div>

</body>
</html>


