<?php

// echo md5("admin123");
// strtoupper(md5("aaa"));
// var_export(CRYPT_SHA256);


// forward_static_call("aa",[123, "ppp"]);

function aa(){
    return 123;
}

function pp(){
    return <<<HEREDOC
    day la noi dung sau the 
    HEREDOC;
}

function heredoc($str = "")
{
    return(
        <<<AREA
            day la noi dung cua function heredoc:
            $str
        AREA
    );
}

// var_dump(pp());
    var_export(heredoc(
        "nội dung trong đây sẽ giữ nguyên vị trí và cấu trúc
        kể cả phần xuống dòng nữa."
    ));
?>