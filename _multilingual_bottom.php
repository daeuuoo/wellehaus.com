
<!-- onmouseover="showLangList_bottom()" onmouseout="showLangList_bottom()"  onclick="showLangList_bottom()"   -->
<div id="lang_list_box_bottom" onclick="showLangList_bottom()"  >
    <span class="text-white">
        <span class="flag-icon flag-icon-kr" >
            <?php echo $lang_array['language'] ?>
        </span>
    </span>
    <ul id="lang_list_bottom">
        <li><a id="ko_bottom" href="" onclick="setLangCookies('ko','kr')"><span class="flag-icon flag-icon-kr"></span>한국어</a></li>
        <li><a id="ja_bottom" href="" onclick="setLangCookies('ja','jp')"><span class="flag-icon flag-icon-jp"></span>日本語</a></li>
        <li><a id="en_bottom" href="" onclick="setLangCookies('en','us')"><span class="flag-icon flag-icon-us"></span>English</a></li>
    </ul>
</div>

<script type="text/javascript">
    var cur_link = document.location.href;
    cur_link = cur_link.split("#", 1);
    document.getElementById('ko_bottom').setAttribute('href', cur_link);
    document.getElementById('ja_bottom').setAttribute('href', cur_link);
    document.getElementById('en_bottom').setAttribute('href', cur_link);

    function showLangList_bottom() {
        var curDisplay = document.getElementById('lang_list_bottom');
        console.log(curDisplay.style.display);
        if (curDisplay.style.display === 'none' || curDisplay.style.display === '') {
            curDisplay.style.display = 'block';
        } else {
            curDisplay.style.display = 'none';
        }
    }
</script>