$(function() {
    $('#registration_btn').on('click', function() {
        if(!confirm('商品情報を登録しますか?')) {
            return false;
        } else {}
    });

    $('#return_btn').on('click', function() {
        if (!confirm('入力内容は保存されません。前画面に戻りますか?')) {
            return false;
        } else {}
    });

    $('#update_btn').on('click', function() {
        if (!confirm('商品情報を更新しますか?')) {
            return false;
        } else {}
    });

    $('#delete_btn').on('click', function() {
        if (!confirm('商品情報を削除しますか?')) {
            return false;
        } else {}
    });
});
