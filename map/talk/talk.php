<script>
var talker_y;
var talker_x_i = 0;
var talk_fi_url;
var talk_fi_url_i;
var num_of_conversation = 0;

function talk_talk(){
  document.getElementById("mv_none").style.display = "block";
  button_none();
  document.getElementById("cmd").style.display = "none";
  document.getElementById("senmon_icon").style.display = "none";
  var talk_i_count = 0;
  var talk_i = 0;
  for (var fun_talk_i=0; fun_talk_i<nm; fun_talk_i++){
    //横から
    if(Y[fun_talk_i]-0.001 <= lat && lat <= Y[fun_talk_i]+0.001){
      if(X[fun_talk_i]-0.001 <= lng && lng <= X[fun_talk_i]+0.001){
        talk_i_count++;
        talk_i = fun_talk_i;
      }
    }
    talker_y = Y[talk_i];
    talker_x = X[talk_i];
  }
  console.log('count：'+talk_i_count);
  console.log('user：'+user);
  var people_talk_id = people_id[talk_i] + 1;//DBのtalkテーブルのpeople_id
  var people_talk_type_temp = people_talk_type[talk_i];//type情報
  //console.log('people_id：'+people_talk_id);
  if(talk_i_count == 1){//あるひとりとトークができる状態
      var parameter = {"user_id": user,"hero_id": shujinko, "people_id": people_talk_id,"people_talk_type":people_talk_type_temp};
      exePHPFunc_2_1(parameter).done(function(data_1){
        exePHPFunc_1_1_2(parameter).done(function(data_1_2){
          console.log(data_1);
          help_text_log = help_text_log + data_1_2;
          if(data_1 >= 1){
            exePHPFunc(parameter).done(function(data){
              console.log(data);
              data = JSON.parse(data);
              document.getElementById("foot").style.display = "block";
              document.getElementById("foot_name").style.display = "block";
              var message = new MessageViewer({
                data
              }, function() {//終了オプション
                yami_2(shujinko,people_talk_id,people_talk_type_temp);
              });
            });
          }else{
            exePHPFunc(parameter).done(function(data){
              console.log(data);
              data = JSON.parse(data);
              document.getElementById("foot").style.display = "block";
              document.getElementById("foot_name").style.display = "block";
              var message = new MessageViewer({
                data
              }, function() {//終了オプション
                talk_fi(shujinko,people_talk_id,people_talk_type_temp);
              });
            });
          }
        });
      });
  }else if(talk_i_count > 1){//トークが出来ない状態
    document.getElementById("foot").style.display = "block";
    var message = new MessageViewer({
      "data": [
        {
          "message":"近くに複数人いるようです。近くには1人だけにしてください。"
      }]
    }, function() {//終了オプション
       talk_fi_el();
    });
  }else{//トークが出来ない状態
    document.getElementById("foot").style.display = "block";
    var message = new MessageViewer({
      "data": [
        {
          "message":"周りに人がいないようです。"
      }]
    }, function() {//終了オプション
       talk_fi_el();
    });
  }
  //const timeStamp = Math.round((new Date()).getTime() / 1000);
  //console.log(timeStamp);
  //talk_ajax();
}

function talk_fi_el(){
  document.getElementById("foot").style.display = "none";
  document.getElementById("foot_name").style.display = "none";
  document.getElementById("senmon_icon").style.display = "block";
  document.getElementById("data_img").style.display = "none";
  document.getElementById("mv_none").style.display = "none";
  position = 0;
  button_block();
}

function talk_fi(hero_talk_id,people_talk_id,people_talk_type_temp){
  document.getElementById("foot").style.display = "none";
  document.getElementById("foot_name").style.display = "none";
  document.getElementById("data_img").style.display = "none";
  document.getElementById("mv_none").style.display = "none";
  position = 0;
  num_of_conversation++;
  if(num_of_conversation == 10){
    document.getElementById("level").style.display = "block";
    var parameter = {"user_id": user};
    exePHPFunc_level(parameter).done(function(data_level){
      level_bef.innerHTML = data_level-1;
      level_up.innerHTML = data_level;
      var audio_file_name = 'levelup';
      audio_play(audio_file_name);
    });
  }else{
    document.getElementById("senmon_icon").style.display = "block";
    var parameter = {"hero_id": hero_talk_id, "people_id": people_talk_id,"people_talk_type":people_talk_type_temp};
    exePHPFunc_href(parameter).done(function(data_href){
      console.log('data_href:'+data_href);
      if (data_href != "") {
    talk_fi_url++;
    talk_fi_url = new google.maps.Marker({
      position: new google.maps.LatLng(talker_y+0.0001, talker_x+0.001),
      map: map,
      icon: '../img/takara1.png'
    });
    google.maps.event.addListener(talk_fi_url, 'click', (function(){
      console.log(data_href);
          window.open(data_href);
        }));
        }
        });
    button_block();
  }
}

function yami_2(hero_talk_id,people_talk_id,people_talk_type_temp){
  var parameter = {"hero_id": hero_talk_id, "people_id": people_talk_id,"people_talk_type":people_talk_type_temp};
  exePHPFunc_3_1(parameter).done(function(data_2){
    exePHPFunc_2_1_2(parameter).done(function(data2_2){
      console.log(data_2);
      help_text_log = help_text_log + data2_2;
      if(data_2 >= 1){
        document.getElementById("foot").style.display = "none";
        document.getElementById("foot_name").style.display = "none";
        document.getElementById("data_img").style.display = "block";
        exePHPFunc_2(parameter).done(function(data2){
          console.log(data2);
          data = JSON.parse(data2);
          var message = new MessageViewer({
            data
          }, function() {//終了オプション
            yami_3(hero_talk_id,people_talk_id,people_talk_type_temp);
          });
        });
      }else{
        document.getElementById("foot").style.display = "none";
        document.getElementById("foot_name").style.display = "none";
        document.getElementById("data_img").style.display = "block";
        exePHPFunc_2(parameter).done(function(data2){
          console.log(data2);
          data = JSON.parse(data2);
          var message = new MessageViewer({
            data
          }, function() {//終了オプション
            talk_fi(hero_talk_id,people_talk_id,people_talk_type_temp);
          });
        });
      }
    });
  });

}

function yami_3(hero_talk_id,people_talk_id,people_talk_type_temp){
  var parameter = {"hero_id": hero_talk_id, "people_id": people_talk_id,"people_talk_type":people_talk_type_temp};
  /*exePHPFunc_3_1(parameter).done(function(data_3){
    console.log(data_3);
  });*/
  document.getElementById("data_img").style.display = "none";
  document.getElementById("foot").style.display = "block";
  document.getElementById("foot_name").style.display = "block";
  exePHPFunc_3(parameter).done(function(data3){
    exePHPFunc_3_1_2(parameter).done(function(data3_2){
      help_text_log = help_text_log + data3_2;
      console.log(data3);
      data = JSON.parse(data3);
      var message = new MessageViewer({
        data
      }, function() {//終了オプション
         talk_fi(hero_talk_id,people_talk_id,people_talk_type_temp);
      });
    });
  });
}

/* -----------------------------------
 * phpを呼び出す
 * ----------------------------------*/
 function exePHPFunc_level(parameter)
 {
   var defer = $.Deferred();
   $.ajax({
     url: "talk/level_ajax.php",
     type: "POST",
     data: parameter,
     scriptCharset: 'utf-8',
     success: defer.resolve,
   });
   return defer.promise();
 }
 function exePHPFunc_href(parameter)
 {
   var defer = $.Deferred();
   $.ajax({
     url: "talk/talk_ajax_href.php",
     type: "POST",
     data: parameter,
     scriptCharset: 'utf-8',
     success: defer.resolve,
   });
   return defer.promise();
 }
 function exePHPFunc_1(parameter)
 {
   var defer = $.Deferred();
   $.ajax({
     url: "talk/talk_ajax_2.php",
     type: "POST",
     data: parameter,
     scriptCharset: 'utf-8',
     success: defer.resolve,
   });
   return defer.promise();
 }
function exePHPFunc(parameter)
{
	var defer = $.Deferred();

	$.ajax({
		url: "talk/talk_ajax.php",
		type: "POST",
		data: parameter,
		scriptCharset: 'utf-8',
		success: defer.resolve,
	});
	return defer.promise();
}
function exePHPFunc_1_1_2(parameter)
{
  var defer = $.Deferred();
  $.ajax({
    url: "talk/talk_ajax1_1_2.php",
    type: "POST",
    data: parameter,
    scriptCharset: 'utf-8',
    success: defer.resolve,
  });
  return defer.promise();
}
function exePHPFunc_2_1(parameter)
{
  var defer = $.Deferred();
  $.ajax({
    url: "talk/talk_ajax2_2.php",
    type: "POST",
    data: parameter,
    scriptCharset: 'utf-8',
    success: defer.resolve,
  });
  return defer.promise();
}
function exePHPFunc_2(parameter)
{
	var defer = $.Deferred();

	$.ajax({
		url: "talk/talk_ajax2.php",
		type: "POST",
		data: parameter,
		scriptCharset: 'utf-8',
		success: defer.resolve,
	});
	return defer.promise();
}
function exePHPFunc_2_1_2(parameter)
{
	var defer = $.Deferred();

	$.ajax({
		url: "talk/talk_ajax2_1_2.php",
		type: "POST",
		data: parameter,
		scriptCharset: 'utf-8',
		success: defer.resolve,
	});
	return defer.promise();
}
function exePHPFunc_3_1(parameter)
{
  var defer = $.Deferred();
  $.ajax({
    url: "talk/talk_ajax3_2.php",
    type: "POST",
    data: parameter,
    scriptCharset: 'utf-8',
    success: defer.resolve,
  });
  return defer.promise();
}
function exePHPFunc_3(parameter)
{
	var defer = $.Deferred();

	$.ajax({
		url: "talk/talk_ajax3.php",
		type: "POST",
		data: parameter,
		scriptCharset: 'utf-8',
		success: defer.resolve,
	});
	return defer.promise();
}
function exePHPFunc_3_1_2(parameter)
{
	var defer = $.Deferred();

	$.ajax({
		url: "talk/talk_ajax3_1_2.php",
		type: "POST",
		data: parameter,
		scriptCharset: 'utf-8',
		success: defer.resolve,
	});
	return defer.promise();
}
/*
function talk_ajax(){
  $.ajax({
    type: "POST",
    url: "talk/talk_ajax.php",
    async: false,
    data: {"people_id":people_talk_id}
  });
}
*/
</script>
