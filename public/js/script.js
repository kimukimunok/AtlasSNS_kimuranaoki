// アコーディオンメニュー
// $(function () {
//     $('.accordion_text').hide();
//     $(".js_title").on("click", function () {
//         $(this).next().slideToggle(200);
//     $(this).toggleClass("open",200);
//   });
// });

$(".accordion_push").on('click', function () {
  //スライドするアニメーション
  //200：秒数！
  $(".accordion_text").slideToggle(200);
  //openクラスをつける
  $(this).toggleClass('open');
  //見えない状態にする
  //next().hide();
});

// 投稿編集のモーダル
$(function () {
  $('.js_modal_open').on('click', function () {
    $('.js_modal').fadeIn();
    //情報の取得
      var post = $(this).attr('post');
    var post_id = $(this).attr('post_id');
    // 変数定義↓
    $('.modal_post').text(post);
     $('.modal_id').val(post_id);
      return false;
  });
  $( '.js_modal_close' ).on( 'click',function () {
      $('.js_modal').fadeOut();
      return false;
  });
});
// 確認OK
