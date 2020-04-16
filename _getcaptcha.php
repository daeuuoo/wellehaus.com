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
