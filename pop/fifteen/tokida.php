<script>
function fifteen_tokida(){
//-----------注意 idは0スタートDBのidより1少ない
 var tokida_nm = <?php echo $map_tokida_2030 ?>; //人数
 var myurl = "../img/people/";

 // 一番左上のキャラの座標を入力

 // キャラ同士の間隔は　x座標を＋0.003する
 // キャラの折り返しの際は　y座標を-0.003する
 var x_tokida=136.5848598000009;
 var y_tokida=34.479529899999974;
 var tokida_x=[];
 var tokida_y=[];

 var toki_num=[];
 var toki_num_n = 0;

 var tokida_front=[];
 var tokida_i=0;
 var tokida_j=0;
 toki_num[toki_num_n]=0;

 for(tokida_i=0;tokida_i < <?php echo round($map_tokida_2030_m_60_100); ?>;tokida_i++,tokida_j++){
   tokida_front[tokida_j] = db_people_front[4];
      toki_num[toki_num_n]++;
 }
 for(tokida_i=0;tokida_i < <?php echo round($map_tokida_2030_w_60_100); ?>;tokida_i++,tokida_j++){
   tokida_front[tokida_j] = db_people_front[6];
      toki_num[toki_num_n]++;
 }

 toki_num_n++;
 toki_num[toki_num_n] = toki_num[toki_num_n - 1];

 for(tokida_i=0;tokida_i < <?php echo round($map_tokida_2030_m_20_59);?>;tokida_i++,tokida_j++){
   tokida_front[tokida_j] = db_people_front[0];
      toki_num[toki_num_n]++;
 }
 for(tokida_i=0;tokida_i < <?php echo round($map_tokida_2030_w_20_59);?>;tokida_i++,tokida_j++){
   tokida_front[tokida_j] = db_people_front[2];
      toki_num[toki_num_n]++;
 }

 toki_num_n++;
 toki_num[toki_num_n] = toki_num[toki_num_n - 1];

 for(tokida_i=0;tokida_i < <?php echo round($map_tokida_2030_m_10_19); ?>;tokida_i++,tokida_j++){
   tokida_front[tokida_j] = db_people_front[8];
      toki_num[toki_num_n]++;
 }
 for(tokida_i=0;tokida_i < <?php echo round($map_tokida_2030_w_10_19); ?>;tokida_i++,tokida_j++){
   tokida_front[tokida_j] = db_people_front[10];
      toki_num[toki_num_n]++;
 }

 toki_num_n++;
 toki_num[toki_num_n] = toki_num[toki_num_n - 1];

 for(tokida_i=0;tokida_i < <?php echo round($map_tokida_2030_m_0_9); ?>;tokida_i++,tokida_j++){
   tokida_front[tokida_j] = db_people_front[12];
      toki_num[toki_num_n]++;
 }
 for(tokida_i=0;tokida_i < <?php echo round($map_tokida_2030_w_0_9); ?>;tokida_i++,tokida_j++){
   tokida_front[tokida_j] = db_people_front[14];
      toki_num[toki_num_n]++;
 }


 var n=tokida_front.length;
 console.log('n：'+n);
 var count=100;

var load=new Array(); for(var p=0; p<n; p++){load[p]=new Image(); load[p].src=myurl+tokida_front[p];}//画像先読み


// -----------------------------------------------------------------------------キャラ表示

var k=0;

for(j=0;j<=n;j++){
  // console.log("ちん"+j);
    if (j==toki_num[0]){k=0;}
    if (j==toki_num[1]){k=0;}
    if (j==toki_num[2]){k=0;}
    tokida_x[j] = x_tokida + (0.003*k++);
    tokida_y[j] = y_tokida;
    if(j>=toki_num[0]){
      tokida_y[j] = y_tokida - 0.003;
    }
    if(j>=toki_num[1]){
      tokida_y[j] = y_tokida - 0.006;
    }
    if(j>=toki_num[2]){
      tokida_y[j] = y_tokida - 0.008;
    }

}
//var tokida_marker=[];
for (var i=0; i<n; i++){
  tokida_marker[i] = new google.maps.Marker({
    position: new google.maps.LatLng(tokida_y[i], tokida_x[i]),
    map: map,
    //icon : myurl+Pic[i%n]
    icon : myurl+tokida_front[i]
  });
  //Y[i]=people_y[i];
  //X[i]=people_x[i];
}
}
</script>
