<?php include '_last_modified_date.php'; ?>
<?php
define('SITE_KEY', '6Ld2u9MUAAAAADJuWJv1ygNbSRQExhiGA0WYyXvj');
define('SECRET_KEY', '6Ld2u9MUAAAAACFDWRvSJm7PmR_2icTJRafK-kf_');

if ($_POST) {
    function getCaptcha($SecretKey)
    {
        $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . SECRET_KEY . "&response={$SecretKey}");
        $Return = json_decode($Response);
        return $Return;
    }
    $Return = getCaptcha($_POST['g-recaptcha-response']);
    if ($Return->success == true && $Return->score > 0.5) {
        echo "<script>console.log('Contact Console Log: You are not a robot.');</script>";
        require_once '_email.php';
    } else {
        echo "<script>console.log('Contact Console Log: You are a robot.');</script>";
    }
}
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
    <div id="support">매뉴얼 및 고객에게 필요한 자료를 다운로드할 수 있는 게시판</div>
    <footer>
        <?php include '_footer.php'; ?>
    </footer>
</body>

</html>