<?php include '_last_modified_date.php'; ?>
<?php include '_getcaptcha.php'; ?>

<?php
$product_name = $_GET['product'];
?>

<!DOCTYPE html>
<html>

<head>
    <?php include '_head.php'; ?>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY ?>"></script>
</head>

<body id="body">
    <nav>
        <?php include '_nav.php'; ?>
    </nav>
    <header id="header">
        <?php include '_header.php'; ?>
    </header>
    <div id="support">제품아이디를 get으로 전달받아 디테일 정보를 보여주는 페이지</div>
    <div>get: </div>
    <div><?php echo $_GET['product'] ?></div>
    <div><?php echo $product_name ?></div>

    <div id="product_section">
        <?php
        include '_select_product_detail_db.php';

        if ($detail = mysqli_fetch_assoc($result)) {
            echo $detail['description'];
        } else {
        ?>
            <script type='text/javascript'>
                location.href = './new';
            </script>
        <?php
        }
        ?>



    </div>
    <footer>
        <?php include '_footer.php'; ?>
    </footer>
</body>

</html>