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
        require_once 'email.php';
    } else {
        echo "<script>console.log('Contact Console Log: You are a robot.');</script>";
    }
}
?>
<!DOCTYPE html>
<!-- Last Published: jan 20 2020 -->
<html>

<head>
    <meta charset="utf-8" />
    <title>wellehaus as a title</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta property="og:title" content="welle[vέlǝ] as a og_title">
    <meta property="og:url" content="www.wellehaus.com">
    <meta property="og:type" content="website">
    <meta property="og:image" content="http://www.wellehaus.com/image/og_image.jpg">
    <meta property="og:site_name" content="welle[vέlǝ] as a og_site_name">
    <meta property="og:description" content="welle[vέlǝ] as a og_description">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="welle[vέlǝ] as a twitter_title">
    <meta name="twitter:description" content="welle[vέlǝ] as a description">
    <meta name="twitter:image" content="http://www.wellehaus.com/image/og_image.jpg">
    <link href="https://fonts.googleapis.com/css?family=Signika&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montez" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:300&subset=japanese" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
    <link href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <script src="./js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY ?>"></script>
</head>

<body id="body">
    <nav>
        <ul>
            <li>menu1</li>
            <li>menu2</li>
            <li>menu3</li>
        </ul>
    </nav>

    <header id="header">
        <img id="welle_logo" src="./image/welle.svg" alt="welle">
    </header>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#category').change(function() {
                var selectedText = $("#category option:selected").text();
                if (selectedText == '제품서비스문의') {
                    // document.getElementById('#date').
                    $('#date-form').css("display", "block");
                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth() + 1; //January is 0
                    var yyyy = today.getFullYear();
                    if (dd < 10) {
                        dd = '0' + dd
                    }
                    if (mm < 10) {
                        mm = '0' + mm
                    }
                    today = yyyy + '-' + mm + '-' + dd;
                    $('#date').attr("max", today);
                    $('#date').attr("required", true);

                } else {
                    $('#date').attr("required", false);
                    $('#date-form').css("display", "none");
                    
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#do-you-agree').change(function() {
                var isChecked = $("#do-you-agree").is(":checked");
                if(isChecked){
                    console.log(isChecked);
                    $('#submit-form').attr("disabled", false);
                } else {
                    console.log(isChecked);
                    $('#submit-form').attr("disabled", true);
                }

            });
        });
    </script>


    <div id="contact-us">
        <form action="/contact.php" method="POST">
            <div>이메일 문의</div>
            <p>
                <label for="category">카테고리</label><br>
                <select class="input-box" id="category" name="category" required>
                    <option selected disabled>카테고리 선택</option>
                    <option value="alliance">제휴</option>
                    <option value="product">제품관련문의</option>
                    <option value=" service">제품서비스문의</option>
                    <option value="other">기타</option>
                </select>
            </p>
            <p id="date-form" style="display: none;">
                <label for="date">제품구매일</label><br>
                <input type="date" class="input-box" id="date" name="date" min="2016-01-01" max="2030-12-31">
            </p>
            <p>
                <label for="your-name">성명</label><br>
                <input type="text" class="input-box" id="your-name" name="your-name" value="" required>
            </p>
            <p>
                <label for="your-email">이메일</label><br>
                <input type="email" class="input-box" id="your-email" name="your-email" placeholder="input@your.email" value="" required>
            </p>
            <p>
                <label for="your-title">제목</label><br>
                <input type="text" class="input-box" id="your-title" name="your-title" value="" required>
            </p>
            <p>
                <label for="your-content">내용</label><br>
                <textarea class="input-box" id="your-content" name="your-content" rows="10" required></textarea>
            </p>
            <p>
                <div>개인정보 수집 및 이용 동의</div>
                <div id="welle-privacy-policy">
                    1. 개인정보의 수집 항목<br>
                    주식회사 벨레(이하 '회사'라 합니다)는 Contact 서비스 이용을 위해 아래와 같은 개인정보를 수집하고 있습니다.<br>
                    - 필수 : 이름, 이메일, 문의내역(제목, 내용, 카테고리)<br>
                    - 선택 : 제품구매일<br>
                    　<br>
                    2. 개인정보 이용목적<br>
                    “회사” 는 수집한 개인정보를 아래와 같은 목적을 위해 활용합니다.<br>
                    - 서비스 제공을 위한 정보 활용: 제휴, 상품관련, 상품서비스 등<br>
                    　<br>
                    3. 개인정보의 보유 및 이용기간<br>
                    “회사”는 아래와 같이 필요한 기간 동안 동의 받은 “이용자”의 개인정보를 이용 보관함을 원칙으로 합니다. 또한 해당 보유 기간이 도래하면 해당 정보를 지체 없이 파기 합니다.<br>
                    * 개인정보 외 A/S 및 상담 내용, 스마트 가전 기기 정보, 로그 정보 중 일부 등은 통계 및 서비스 개선 목적으로 개인을 식별할 수 없는 형태로 보관 될 수 있습니다.<br>
                    - 콜센터 및 홈페이지A/S 접수 / 상담 시 수집된 개인정보 : 5년<br>
                    - A/S 이용, 제품 교환/환불, 홈페이지 소모품 구매 시 수집된 개인정보: 5년<br>
                    - 홈페이지 이메일 문의 이용 시 수집된 개인정보 : 3년<br>
                    다만 상법, 국세기본법, 전자상거래 등에서의 소비자 보호에 관한 법률 등 관련 법령의 규정에 의하여 다음과 같이 거래 관련 권리 의무 관계의 확인 등을 이유로 일정기간 보유하여야 할
                    필요가 있을 경우에는 일정기간 보유합니다. 이 경우 회사는 보관하는 개인정보를 그 보관의 목적으로만 이용하며 보존 기간 및 보존 항목은 아래와 같습니다.<br>
                    - 계약 또는 청약철회 등에 관한 기록: 5 년(전자상거래 등에서의 소비자보호에 관한 법률)<br>
                    - 대금 결제 및 재화 등의 공급에 관한 기록: 5년(전자상거래 등에서의 소비자보호에 관한 법률)<br>
                    - 소비자 불만 또는 분쟁 처리에 관한 기록: 3년(전자상거래 등에서의 소비자보호에 관한 법률)<br>
                    - 납세 증거에 관한 기록 : 5년 (국세 기본법)<br>
                    - 전표 또는 이와 유사한 서류에 포함된 개인정보: 5년(상법)<br>
                    - 통신사실확인자료 제공 시 “이용자” 확인에 필요한 성명, 전화번호 등: 12개월(통신비밀보호법)<br>
                    - “회사”와 고객 간에 민원, 소송 등 분쟁이 발생한 경우에 그 보유기간 내에 분쟁이 해결되지 않을 경우: 그 분쟁이 해결될 때까지<br>
                    　<br>
                    4. 동의 거부권 및 미동의에 대한 불이익 안내<br>
                    고객님께서는 정보주체로서 개인정보 동의 거부권이 있으며, 미동의 시 A/S 서비스 신청 및 이용에 제약이 있을 수 있습니다.<br>
                </div>
                <input type="checkbox" id="do-you-agree" name="do-you-agree" value="agree" required>
                <label for="do-you-agree">개인정보 수집 및 이용에 동의합니다.</label>
                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">


            </p>

            <input type="submit" id="submit-form" value="문의하기" disabled>

        </form>

        <script>
            grecaptcha.ready(function() {
                grecaptcha.execute('<?php echo SITE_KEY ?>', {
                    action: 'homepage'
                }).then(function(token) {
                    console.log(token);
                    document.getElementById('g-recaptcha-response').value = token;
                });
            });
        </script>
    </div>
    <footer>
        <div id="footer_box_1">
            <img id="welle_logo" src="./image/welle_white.svg" alt="welle">
        </div>
        <div id="footer_box_2">
            Electronics R&D and ODM<br>
            Development and Manufacturing of AV/IT Products<br>
            Import/distribution of household/home appliances/IT gadgets
        </div>
        <div id="footer_box_3">
            <div>
                #1602, 49, Achasan-ro, Seongdong-gu, Seoul, Republic of Korea (04790)
            </div>
            <div>
                Copyright © 2020 welle CO., LTD All rights reserved.
            </div>
            <div>
                Privacy Policy
            </div>
        </div>
    </footer>
</body>

</html>