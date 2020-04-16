<?php include '_last_modified_date.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <?php include '_head.php'; ?>
</head>

<body id="body">
    <nav>
        <?php include '_nav.php'; ?>
    </nav>
    <header id="header">
        <?php include '_header.php'; ?>
    </header>
    <div id="intro">
        <div id="intro_box_1">
            wave
        </div>
        <div id="intro_box_2">
            <p>
                welle[:velle] is a total lifestyle brand that offers living products that combine smart technology, the
                sensibility given by nature, while studying the lifestyle of people who change to rhythmic feeling.
            </p>
            <p>
                welle plan and introduce various categories of living products that increase the quality of living space
                and add daily sensibilities.
            </p>
        </div>
    </div>
    <div id="product_section">
        <?php
        include '_select_products_db.php';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<a href="./detail?product='. $row['model_name'] .'">';
            echo '<div class="product_box">';
            echo '<img src="' . $row['thumbnail_url'] . '" alt="">';
            echo '<div class="product_text">';
            echo '<div class="product_title">' . $row['product_name'] . '</div>';
            echo '<div class="product_description">' . $row['description'] . '</div>';
            echo '</div></div>';
            echo '</a>';
        }


        ?>



    </div>
    <footer>
        <?php include '_footer.php'; ?>
    </footer>
</body>

</html>