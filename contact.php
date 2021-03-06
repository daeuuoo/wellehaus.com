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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#category').change(function() {
                var e = document.getElementById("category");
                var selectedValue = e.options[e.selectedIndex].value;

                console.log(selectedValue);
                if (selectedValue == 'service') {
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
                    $('#date').attr("required", true);
                    $('#date').attr("max", today);

                } else {
                    $('#date').attr("required", false);
                    $('#date-form').css("display", "none");

                }
            });
        });
    </script>
    <div id="contact-form-boxz">
        <form id="contact-form" action="/contact.php" method="POST">
            <div><?php echo $lang_array['email_contact'] ?></div>
            <p>
                <label for="category"><?php echo $lang_array['category'] ?></label><br>
                <select class="input-box" id="category" name="category" required>
                    <option selected disabled><?php echo $lang_array['select_category'] ?></option>
                    <option value="alliance"><?php echo $lang_array['partnership'] ?></option>
                    <option value="product"><?php echo $lang_array['product_inquiry'] ?></option>
                    <option value="service"><?php echo $lang_array['product_service'] ?></option>
                    <option value="other"><?php echo $lang_array['others'] ?></option>
                </select>
            </p>
            <p id="date-form" style="display: none;">
                <label for="date"><?php echo $lang_array['purchase_date'] ?></label><br>
                <input type="date" class="input-box" id="date" name="date" min="2016-01-01" max="2030-12-31">
            </p>
            <p>
                <label for="your-name"><?php echo $lang_array['name'] ?></label><br>
                <input type="text" class="input-box" id="your-name" name="your-name" value="" required>
            </p>
            <p>
                <label for="your-email"><?php echo $lang_array['email'] ?></label><br>
                <input type="email" class="input-box" id="your-email" name="your-email" placeholder="input@your.email" value="" required>
            </p>
            <p>
                <label for="your-title"><?php echo $lang_array['title'] ?></label><br>
                <input type="text" class="input-box" id="your-title" name="your-title" value="" required>
            </p>
            <p>
                <label for="your-content"><?php echo $lang_array['content'] ?></label><br>
                <textarea class="input-box" id="your-content" name="your-content" rows="10" required></textarea>
            </p>
            <p>
                <div><?php echo $lang_array['agree'] ?></div>
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
                <label for="do-you-agree"><?php echo $lang_array['are_you_agree'] ?></label>
                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
            </p>
            <input type="submit" id="submit-form" value="<?php echo $lang_array['send'] ?>">
            <div id="reCAPTCHAv3">
                <div>This site is protected by reCAPTCHA and the Google</div>
                <a href="https://policies.google.com/privacy">Privacy Policy</a> and
                <a href="https://policies.google.com/terms">Terms of Service</a> apply.
            </div>
        </form>
        <script>
            grecaptcha.ready(function() {
                grecaptcha.execute('<?php echo SITE_KEY ?>', {
                    action: 'homepage'
                }).then(function(token) {
                    document.getElementById('g-recaptcha-response').value = token;
                });
            });
        </script>
    </div>
    <footer>
        <?php include '_footer.php'; ?>
    </footer>
</body>

</html>