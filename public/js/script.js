// 投稿編集のモーダル[https://pengi-n.co.jp/blog/modalwindow/]
$(function () {
  // 編集クラス"js-modal-open")を押したら
  $('.js-modal-open').click(function () {
    // モーダル部分(fadeInで表示)
      $('.js-modal').fadeIn();
      //   投稿を特定する為にIDも必要
      // 更新内容とIDを取得
    //   this(変数)にpostとpost_idの属性を加える（取得する）
      var post = $(this).attr('post');
      var post_id = $(this).attr('post_id');
          //   コンソールで結果を調べた際、変数が無いと表示される。
      //更新内容とIDをモーダルに
    //   投稿は文字列(text)で、IDは変数(.val)で送る
    $('.modal_post').text(post);
     $('.modal_id').val(post_id);
      return false;
  });
  // モーダル外や閉じるボタンを押すと閉じる。
  $('.js-modal-close').click (function () {
   // モーダル部分(fadeOutで非表示)
    $('.js-modal').fadeOut();
      return false;
    //   return false＝ブラウザの更新処理を止める記述
  });
});
