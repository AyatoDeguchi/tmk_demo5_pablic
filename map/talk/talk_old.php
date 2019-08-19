<script>
function talk_talk(){
  button_none();
  document.getElementById("cmd").style.display = "none";
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
  }
  console.log('count：'+talk_i_count);
  console.log('user：'+user);
  var people_talk_id = people_id[talk_i] + 1;//DBのtalkテーブルのpeople_id
  var people_talk_type_temp = people_talk_type[talk_i];//type情報
  //console.log('people_id：'+people_talk_id);
  if(talk_i_count == 1){//あるひとりとトークができる状態
    if(people_talk_id%2 == 0){//病み時
      var parameter = {"user_id": user,"hero_id": shujinko, "people_id": people_talk_id,"people_talk_type":people_talk_type_temp};
      exePHPFunc_1(parameter).done(function(data_1){
        console.log(data_1);
      });
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
    }
    else if(people_talk_id%2 == 1){//通常時
      var parameter = {"user_id": user,"hero_id": shujinko, "people_id": people_talk_id,"people_talk_type":people_talk_type_temp};
      exePHPFunc(parameter).done(function(data){
        console.log(data);
        data = JSON.parse(data);
        document.getElementById("foot").style.display = "block";
        document.getElementById("foot_name").style.display = "block";
        var message = new MessageViewer({
          data
        }, function() {//終了オプション
           talk_fi();
        });
      });
    }
  }else if(talk_i_count > 1){//トークが出来ない状態
    document.getElementById("foot").style.display = "block";
    var message = new MessageViewer({
      "data": [
        {
          "message":"近くに複数人いるようです。近くには1人だけにしてください。"
      }]
    }, function() {//終了オプション
       talk_fi();
    });
  }else{//トークが出来ない状態
    document.getElementById("foot").style.display = "block";
    var message = new MessageViewer({
      "data": [
        {
          "message":"周りに人がいないようです。近くには1人だけにしてください。"
      }]
    }, function() {//終了オプション
       talk_fi();
    });
  }
  //const timeStamp = Math.round((new Date()).getTime() / 1000);
  //console.log(timeStamp);
  //talk_ajax();
}

function talk_fi(){
  document.getElementById("foot").style.display = "none";
  document.getElementById("foot_name").style.display = "none";
  position = 0;
  button_block();
}

function yami_2(hero_talk_id,people_talk_id,people_talk_type_temp){
  var parameter = {"hero_id": hero_talk_id, "people_id": people_talk_id,"people_talk_type":people_talk_type_temp};
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
}

function yami_3(hero_talk_id,people_talk_id,people_talk_type_temp){
  var parameter = {"hero_id": hero_talk_id, "people_id": people_talk_id,"people_talk_type":people_talk_type_temp};
  document.getElementById("data_img").style.display = "none";
  document.getElementById("foot").style.display = "block";
  document.getElementById("foot_name").style.display = "block";
  exePHPFunc_3(parameter).done(function(data3){
    console.log(data3);
    data = JSON.parse(data3);
    var message = new MessageViewer({
      data
    }, function() {//終了オプション
       talk_fi();
    });
  });
}

/* -----------------------------------
 * phpを呼び出す
 * ----------------------------------*/
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
