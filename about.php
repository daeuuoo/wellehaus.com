<?php include '_last_modified_date.php'; ?>
<?php include '_getcaptcha.php'; ?>

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
    <div id="support">벨레 소개</div>
    <footer>
        <?php include '_footer.php'; ?>
    </footer>
</body>

</html>