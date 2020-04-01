<?php
define('COOKIE_1', 'language_main');
define('COOKIE_2', 'language_sub');
define('COOKIE_EXPIRE', 5);

if (isset($_COOKIE[COOKIE_1])) {
    $lang_main = $_COOKIE[COOKIE_1];
    if (isset($_COOKIE[COOKIE_2])) {
        $lang_sub = $_COOKIE[COOKIE_2];
    } else {
        $lang_sub = "none";
    }
} else {
    $H_A_L = strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']);
    $langs = explode("-", explode(";", explode(",", $H_A_L)[0])[0]);
    $lang_main = $langs[0];
    setcookie(COOKIE_1, $lang_main, time() + COOKIE_EXPIRE, "/");
    if (isset($langs[1])) {
        $lang_sub = $langs[1];
    } else {
        $lang_sub = "none";
    }
    setcookie(COOKIE_2, $lang_sub, time() + COOKIE_EXPIRE, "/");
}

switch ($lang_main) {
    case "ko":
        require_once "language/ko.php";
        break;
    case "ja":
        require_once "language/ja.php";
        break;
        // case "zh":
        //     switch ($lang_sub) {
        //         case "sg":
        //             echo "<br>말레이시아, 싱가포르-";
        //             echo $lang_sub;
        //             // echo "<meta http-equiv='Refresh' content='0; URL=/sg'>";
        //             break;
        //         case "mo":
        //             echo "<br>마카오-";
        //             echo $lang_sub;
        //             // echo "<meta http-equiv='Refresh' content='0; URL=/mo'>";
        //             break;
        //         case "tw":
        //             echo "<br>대만-";
        //             echo $lang_sub;
        //             // echo "<meta http-equiv='Refresh' content='0; URL=/tw'>";
        //             break;
        //         case "hk":
        //             echo "<br>홍콩-";
        //             echo $lang_sub;
        //             // echo "<meta http-equiv='Refresh' content='0; URL/hk'>";
        //             break;
        //         default:
        //             echo "<br>중국어-";
        //             echo $lang_sub;
        //             // echo "<meta http-equiv='Refresh' content='0; URL=/cn'>";
        //     }
        //     break;
    default:
        require_once "language/en.php";
}
?>

<script type="text/javascript">
    var userLang = navigator.language || navigator.userLanguage;
    userLang = userLang.toLowerCase();
    var userLangs = userLang.split('-', 2);

    if (getCookie("<?php echo COOKIE_1 ?>") == "" ||
        getCookie("<?php echo COOKIE_1 ?>") == "undefined" ||
        getCookie("<?php echo COOKIE_1 ?>") == null ||
        getCookie("<?php echo COOKIE_2 ?>") == "none"
    ) {
        console.log("cookie is blank, null, undefined");
        setCookie("<?php echo COOKIE_1 ?>", userLangs[0], <?php echo COOKIE_EXPIRE ?>);
        setCookie("<?php echo COOKIE_2 ?>", userLangs[1], <?php echo COOKIE_EXPIRE ?>);
    } else {
        console.log("have value");
    }


    function setLangCookies(lang_main, lang_sub) {
        setCookie("<?php echo COOKIE_1 ?>", lang_main, <?php echo COOKIE_EXPIRE ?>);
        setCookie("<?php echo COOKIE_2 ?>", lang_sub, <?php echo COOKIE_EXPIRE ?>);
    }

    function setCookie(cname, cvalue, exseconds) {
        var d = new Date();
        d.setTime(d.getTime() + (exseconds * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
</script>