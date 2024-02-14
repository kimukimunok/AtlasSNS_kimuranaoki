// アコーディオンメニュー
$(function () {
    $('.accordion_text').hide();
    $(".js-title").on("click", function () {
        $(this).next().slideToggle(200);
    $(this).toggleClass("open",200);
  });
});

// 投稿編集のモーダル
$(function () {
  $('.js-modal-open').on('click', function () {
      $( '.js-modal' ).fadeIn();
      var post = $(this).attr('post');
      var post_id = $(this).attr('post_id');
    $('.modal_post').text(post);
     $('.modal_id').val(post_id);
      return false;
  });
  $( '.js-modal-close' ).on( 'click',function () {
      $('.js-modal').fadeOut();
      return false;
  });
});
// 確認OK
