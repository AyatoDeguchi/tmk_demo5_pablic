<script>
function twenty_tamaru(){
//-----------注意 idは0スタートDBのidより1少ない
 var tamaru_nm = <?php echo $map_tamaru_2035 ?>; //人数
 var myurl = "../img/people/";

 // 一番左上のキャラの座標を入力

 // キャラ同士の間隔は　x座標を＋0.003する
 // キャラの折り返しの際は　y座標を-0.003する
 var x_tamaru=136.60060980000043;
 var y_tamaru=34.49577990000005;
 var tamaru_x=[];
 var tamaru_y=[];

 var tama_num=[];
 var tama_num_n = 0;

 var tamaru_front=[];
 var tamaru_i=0;
 var tamaru_j=0;
 tama_num[tama_num_n]=0;

 for(tamaru_i=0;tamaru_i < <?php echo round($map_tamaru_2035_m_60_100); ?>;tamaru_i++,tamaru_j++){
   tamaru_front[tamaru_j] = db_people_front[4];
   tama_num[tama_num_n]++;
 }
 for(tamaru_i=0;tamaru_i < <?php echo round($map_tamaru_2035_w_60_100); ?>;tamaru_i++,tamaru_j++){
   tamaru_front[tamaru_j] = db_people_front[6];
   tama_num[tama_num_n]++;
 }

 tama_num_n++;
 tama_num[tama_num_n] = tama_num[tama_num_n - 1];

 for(tamaru_i=0;tamaru_i < <?php echo round($map_tamaru_2035_m_20_59);?>;tamaru_i++,tamaru_j++){
   tamaru_front[tamaru_j] = db_people_front[0];
   tama_num[tama_num_n]++;
 }
 for(tamaru_i=0;tamaru_i < <?php echo round($map_tamaru_2035_w_20_59);?>;tamaru_i++,tamaru_j++){
   tamaru_front[tamaru_j] = db_people_front[2];
   tama_num[tama_num_n]++;
 }

 tama_num_n++;
 tama_num[tama_num_n] = tama_num[tama_num_n - 1];

 for(tamaru_i=0;tamaru_i < <?php echo round($map_tamaru_2035_m_10_19); ?>;tamaru_i++,tamaru_j++){
   tamaru_front[tamaru_j] = db_people_front[8];
   tama_num[tama_num_n]++;
 }
 for(tamaru_i=0;tamaru_i < <?php echo round($map_tamaru_2035_w_10_19); ?>;tamaru_i++,tamaru_j++){
   tamaru_front[tamaru_j] = db_people_front[10];
   tama_num[tama_num_n]++;
 }

 tama_num_n++;
 tama_num[tama_num_n] = tama_num[tama_num_n - 1];

 for(tamaru_i=0;tamaru_i < <?php echo round($map_tamaru_2035_m_0_9); ?>;tamaru_i++,tamaru_j++){
   tamaru_front[tamaru_j] = db_people_front[12];
   tama_num[tama_num_n]++;
 }
 for(tamaru_i=0;tamaru_i < <?php echo round($map_tamaru_2035_w_0_9); ?>;tamaru_i++,tamaru_j++){
   tamaru_front[tamaru_j] = db_people_front[14];
   tama_num[tama_num_n]++;
 }


 var n=tamaru_front.length;
 console.log('n：'+n);
 var count=100;

var load=new Array(); for(var p=0; p<n; p++){load[p]=new Image(); load[p].src=myurl+tamaru_front[p];}//画像先読み


// -----------------------------------------------------------------------------キャラ表示

var k=0;

for(j=0;j<=n;j++){
    if (j==tama_num[0]){k=0;}
    if (j==tama_num[1]){k=0;}
    if (j==tama_num[2]){k=0;}
    tamaru_x[j] = x_tamaru + (0.003*k++);
    tamaru_y[j] = y_tamaru;
    if(j>=tama_num[0]){
      tamaru_y[j] = y_tamaru - 0.003;
    }
    if(j>=tama_num[1]){
      tamaru_y[j] = y_tamaru - 0.006;
    }
    if(j>=tama_num[2]){
      tamaru_y[j] = y_tamaru - 0.008;
    }
}

//var tamaru_marker=[];
for (var i=0; i<n; i++){
  tamaru_marker[i] = new google.maps.Marker({
    position: new google.maps.LatLng(tamaru_y[i], tamaru_x[i]),
    map: map,
    //icon : myurl+Pic[i%n]
    icon : myurl+tamaru_front[i]
  });
  //Y[i]=people_y[i];
  //X[i]=people_x[i];
}
}
</script>
