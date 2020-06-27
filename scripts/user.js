function check_input() {
    if (!document.info_form.pass.value) {
        alert("비밀번호를 입력하세요!");
        document.info_form.pass.focus();
        return;
    }

    if (!document.info_form.pass_confirm.value) {
        alert("비밀번호확인을 입력하세요!");
        document.info_form.pass_confirm.focus();
        return;
    }

    if (!document.info_form.name.value) {
        alert("이름을 입력하세요!");
        document.info_form.name.focus();
        return;
    }

    if (!document.info_form.email1.value) {
        alert("이메일 주소를 입력하세요!");
        document.info_form.email1.focus();
        return;
    }

    if (!document.info_form.email2.value) {
        alert("이메일 주소를 입력하세요!");
        document.info_form.email2.focus();
        return;
    }

    if (document.info_form.pass.value !=
        document.info_form.pass_confirm.value) {
        alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
        document.info_form.pass.focus();
        document.info_form.pass.select();
        return;
    }

    document.info_form.submit();
}

function check_id() {
    window.open("user_insert_check.php?userid=" + document.info_form.userid.value,
        "IDcheck",
        "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
}


