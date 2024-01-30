// アコーディオンメニュー
// $('.menu-btn').click(function(){
//   $(this).toggleClass('is-open');
//   $(this).siblings('.menu').toggleClass('is-open');
// });

// $('.menu').on("click", function() {
//     $(".menu ul").slideToggle();
//     $('.menu-btn').removeClass("active");
// });

// アコーディオンメニュー候補２

	// $(function(){
	// 	//クリックで動く
	// 	$('.nav-open').click(function(){
	// 		$(this).toggleClass('active');
	// 		$(this).next('nav').slideToggle();
	// 	});
    // });

$(function () {
    // 非表示にする
    $('.accordion-text').hide();
    // クリックすると
    $(".js-title").on("click", function () {
        // 中身を表示する
        $(this).next().slideToggle(200);
        // 矢印の向きを変える。
    $(this).toggleClass("open",200);
  });
});


// 投稿編集のモーダル[https://pengi-n.co.jp/blog/modalwindow/]
$(function () {
  // 編集クラス"js-modal-open")を押したら
  $('.js-modal-open').on('click', function () {
    // モーダル部分(fadeInで表示)
      $( '.js-modal' ).fadeIn();
      var post = $(this).attr('post');
      var post_id = $(this).attr('post_id');
    //更新内容とIDをモーダルに
    //   投稿は文字列(text)で、IDは変数(.val)で送る
    $('.modal_post').text(post);
     $('.modal_id').val(post_id);
      return false;
  });
  // モーダル外や閉じるボタンを押すと閉じる。
  $( '.js-modal-close' ).on( 'click',function () {
      $('.js-modal').fadeOut();
      return false;
  });
});
