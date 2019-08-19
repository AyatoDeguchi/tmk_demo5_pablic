/*比率拡大表示計算*/
$(window).on('touchmove.noScroll', function(e) {
    e.preventDefault();
});
$(document).ready(function () {
  modal_content_size();
});
$(window).resize(function () {
  modal_content_size();
});

var modal_content_height;
var modal_content_width;

function modal_content_size(){

  //整数の最小値
  modal_contenth_size = 187;//縦の比率
  modal_contentw_size = 256;//横の比率


  window.scrollTo(0,0);
  iamgehsize = $(window).height();
  modal_contentwsize = $(window).width();
  console.log(modal_contenthsize);
  console.log(modal_contentwsize);
  //window_show.innerHTML ='wh'+hsize+'ww'+wsize;
  if(modal_contenthsize%modal_contenth_size==0 && modal_contentwsize%modal_contentw_size==0){
    $('.modal_content').css('height', 100+'%');
    $('.modal_content').css('width', 100+'%');
    $('.modal_content').css('margin', 0);
    modal_content_width = wsize;
    modal_content_height = hsize;
    //window_show.innerHTML='good:'+'　wh'+hsize+'　ww'+wsize;
  }else{
    if(modal_contenthsize/modal_contenth_size>modal_contentwsize/modal_contentw_size){
      modal_contentwsize_w = modal_contentwsize/modal_contentw_size;
      modal_contentheight_t = modal_contenth_size*modal_contentwsize_w;
      $('.modal_content').css('height', modal_contentheight_t+'px');
      $('.modal_content').css('width', 100+'%');
      $('.modal_content').css('margin', "auto 0");
      modal_content_width = modal_contentwsize;
      modal_content_height = modal_contentheight_t;
      //window_show.innerHTML='h&gt;w:'+'　wh'+hsize+'　h'+height_t+'　ww'+wsize;
    }
    else if(modal_contenthsize/modal_contenth_size<modal_contentwsize/modal_contentw_size){
      modal_contenthsize_w = modal_contenthsize/modal_contenth_size;
      modal_contentwidth_t = modal_contentw_size*modal_contenthsize_w;
      $('.modal_content').css('height', 100+'%');
      $('.modal_content').css('width', modal_contentwidth_t+'px');
      $('.modal_content').css('margin', "0 auto");
      modal_content_width = modal_contentwidth_t;
      modal_content_height = modal_contenthsize;
      //window_show.innerHTML='h&lt;w:'+'　wh'+hsize+'　ww'+wsize+'　w'+width_t;
    }
  }
}
