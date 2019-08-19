<script>
function twenty_uda(){
//-----------注意 idは0スタートDBのidより1少ない
 var uda_nm = <?php echo $map_uda_2035; ?>; //人数
 var myurl = "../img/people/";

 // 一番左上のキャラの座標を入力

 // キャラ同士の間隔は　x座標を＋0.003する
 // キャラの折り返しの際は　y座標を-0.003する
 var x_uda=136.61635980000015;
 var y_uda=34.513279900000136;
 var uda_x=[];
 var uda_y=[];

 var uda_num=[];
 var uda_num_n = 0;

 var uda_front=[];
 var uda_i=0;
 var uda_j=0;
 uda_num[uda_num_n]=0;

 for(uda_i=0;uda_i < <?php echo round($map_uda_2035_m_60_100); ?>;uda_i++,uda_j++){
   uda_front[uda_j] = db_people_front[4];
   uda_num[uda_num_n]++;
 }
 for(uda_i=0;uda_i < <?php echo round($map_uda_2035_w_60_100); ?>;uda_i++,uda_j++){
   uda_front[uda_j] = db_people_front[6];
   uda_num[uda_num_n]++;
 }

 uda_num_n++;
 uda_num[uda_num_n] = uda_num[uda_num_n - 1];

 for(uda_i=0;uda_i < <?php echo round($map_uda_2035_m_20_59);?>;uda_i++,uda_j++){
   uda_front[uda_j] = db_people_front[0];
   uda_num[uda_num_n]++;
 }
 for(uda_i=0;uda_i < <?php echo round($map_uda_2035_w_20_59);?>;uda_i++,uda_j++){
   uda_front[uda_j] = db_people_front[2];
   uda_num[uda_num_n]++;
 }

 uda_num_n++;
 uda_num[uda_num_n] = uda_num[uda_num_n - 1];

 for(uda_i=0;uda_i < <?php echo round($map_uda_2035_m_10_19); ?>;uda_i++,uda_j++){
   uda_front[uda_j] = db_people_front[8];
   uda_num[uda_num_n]++;
 }
 for(uda_i=0;uda_i < <?php echo round($map_uda_2035_w_10_19); ?>;uda_i++,uda_j++){
   uda_front[uda_j] = db_people_front[10];
   uda_num[uda_num_n]++;
 }

 uda_num_n++;
 uda_num[uda_num_n] = uda_num[uda_num_n - 1];

 for(uda_i=0;uda_i < <?php echo round($map_uda_2035_m_0_9); ?>;uda_i++,uda_j++){
   uda_front[uda_j] = db_people_front[12];
   uda_num[uda_num_n]++;
 }
 for(uda_i=0;uda_i < <?php echo round($map_uda_2035_w_0_9); ?>;uda_i++,uda_j++){
   uda_front[uda_j] = db_people_front[14];
   uda_num[uda_num_n]++;
 }


 var n=uda_front.length;
 console.log('n：'+n);
 var count=100;

var load=new Array(); for(var p=0; p<n; p++){load[p]=new Image(); load[p].src=myurl+uda_front[p];}//画像先読み


// -----------------------------------------------------------------------------キャラ表示

var k=0;

for(j=0;j<=n;j++){
  // console.log("ちん"+j);
    if (j==uda_num[0]){k=0;}
    if (j==uda_num[1]){k=0;}
    if (j==uda_num[2]){k=0;}
    uda_x[j] = x_uda + (0.003*k++);
    uda_y[j] = y_uda;
    if(j>=uda_num[0]){
      uda_y[j] = y_uda - 0.003;
    }
    if(j>=uda_num[1]){
      uda_y[j] = y_uda - 0.006;
    }
    if(j>=uda_num[2]){
      uda_y[j] = y_uda - 0.008;
    }

}

//var uda_marker=[];
for (var i=0; i<n; i++){
  uda_marker[i] = new google.maps.Marker({
    position: new google.maps.LatLng(uda_y[i], uda_x[i]),
    map: map,
    //icon : myurl+Pic[i%n]
    icon : myurl+uda_front[i]
  });
  //Y[i]=people_y[i];
  //X[i]=people_x[i];
}
}
</script>
