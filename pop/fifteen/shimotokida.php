<script>
function fifteen_shimotokida(){
//-----------注意 idは0スタートDBのidより1少ない
 var shimotokida_nm = <?php echo $map_shimotokida_2030; ?>; //人数
 var myurl = "../img/people/";

 // 一番左上のキャラの座標を入力

 // キャラ同士の間隔は　x座標を＋0.003する
 // キャラの折り返しの際は　y座標を-0.003する
 var x_shimotokida=136.6291097999999;
 var y_shimotokida=34.479529899999974;
 var shimotokida_x=[];
 var shimotokida_y=[];

 var shimo_num=[];
 var shimo_num_n = 0;

 var shimotokida_front=[];
 var shimotokida_i=0;
 var shimotokida_j=0;
 shimo_num[shimo_num_n]=0;
 for(shimotokida_i=0;shimotokida_i < <?php echo round($map_shimotokida_2030_m_60_100); ?>;shimotokida_i++,shimotokida_j++){
   shimotokida_front[shimotokida_j] = db_people_front[4];
   shimo_num[shimo_num_n]++;
 }
 for(shimotokida_i=0;shimotokida_i < <?php echo round($map_shimotokida_2030_w_60_100); ?>;shimotokida_i++,shimotokida_j++){
   shimotokida_front[shimotokida_j] = db_people_front[6];
   shimo_num[shimo_num_n]++;
 }
 console.log('shimo_num:'+shimo_num[shimo_num_n]+'shimo_num_n:'+shimo_num_n);
 shimo_num_n++;
 shimo_num[shimo_num_n] = shimo_num[shimo_num_n - 1];

 for(shimotokida_i=0;shimotokida_i < <?php echo round($map_shimotokida_2030_m_20_59);?>;shimotokida_i++,shimotokida_j++){
   shimotokida_front[shimotokida_j] = db_people_front[0];
   shimo_num[shimo_num_n]++;
 }
 for(shimotokida_i=0;shimotokida_i < <?php echo round($map_shimotokida_2030_w_20_59);?>;shimotokida_i++,shimotokida_j++){
   shimotokida_front[shimotokida_j] = db_people_front[2];
   shimo_num[shimo_num_n]++;
 }
 console.log('shimo_num:'+shimo_num[shimo_num_n]+'shimo_num_n:'+shimo_num_n);
 shimo_num_n++;
 shimo_num[shimo_num_n] = shimo_num[shimo_num_n - 1];
 for(shimotokida_i=0;shimotokida_i < <?php echo round($map_shimotokida_2030_m_10_19); ?>;shimotokida_i++,shimotokida_j++){
   shimotokida_front[shimotokida_j] = db_people_front[8];
   shimo_num[shimo_num_n]++;
 }
 for(shimotokida_i=0;shimotokida_i < <?php echo round($map_shimotokida_2030_w_10_19); ?>;shimotokida_i++,shimotokida_j++){
   shimotokida_front[shimotokida_j] = db_people_front[10];
   shimo_num[shimo_num_n]++;
 }
 console.log('shimo_num:'+shimo_num[shimo_num_n]+'shimo_num_n:'+shimo_num_n);
 shimo_num_n++;
 shimo_num[shimo_num_n] = shimo_num[shimo_num_n - 1];
 for(shimotokida_i=0;shimotokida_i < <?php echo round($map_shimotokida_2030_m_0_9); ?>;shimotokida_i++,shimotokida_j++){
   shimotokida_front[shimotokida_j] = db_people_front[12];
   shimo_num[shimo_num_n]++;
 }
 for(shimotokida_i=0;shimotokida_i < <?php echo round($map_shimotokida_2030_w_0_9); ?>;shimotokida_i++,shimotokida_j++){
   shimotokida_front[shimotokida_j] = db_people_front[14];
   shimo_num[shimo_num_n]++;
 }
 console.log('shimo_num:'+shimo_num[shimo_num_n]+'shimo_num_n:'+shimo_num_n);


 var n=shimotokida_front.length;
 console.log('n：'+n);
 var count=100;

var load=new Array(); for(var p=0; p<n; p++){load[p]=new Image(); load[p].src=myurl+shimotokida_front[p];}//画像先読み


// -----------------------------------------------------------------------------キャラ表示
var k=0;

for(j=0;j<=n;j++){
  // console.log("ちん"+j);
    if (j==shimo_num[0]){k=0;}
    if (j==shimo_num[1]){k=0;}
    if (j==shimo_num[2]){k=0;}
    shimotokida_x[j] = x_shimotokida + (0.003*k++);
    shimotokida_y[j] = y_shimotokida;
    if(j>=shimo_num[0]){
      shimotokida_y[j] = y_shimotokida - 0.003;
    }
    if(j>=shimo_num[1]){
      shimotokida_y[j] = y_shimotokida - 0.006;
    }
    if(j>=shimo_num[2]){
      shimotokida_y[j] = y_shimotokida - 0.009;
    }

}

/*
for(i=0,k=0;i<n;i++){
  console.log('shimo_num:'+shimo_num[k]+'k:'+k);

  if(i==0){
    shimotokida_x[0] = x_shimotokida;
    shimotokida_y[0] = y_shimotokida;
  }
  else if(i < shimo_num[k]){
    shimotokida_x[i] = shimotokida_x[i-1] + 0.003;
    shimotokida_y[i] = shimotokida_y[i-1];
  }else if(i == shimo_num[k]){
    k++;
    shimotokida_x[i] = shimotokida_x[i-shimo_num[k]];
    shimotokida_y[i] = shimotokida_y[i-shimo_num[k]] - 0.003;
  }
  console.log(shimotokida_x[i]);
  console.log(shimotokida_y[i]);
}*/
//var shimotokida_marker=[];
for (var i=0; i<n; i++){
  shimotokida_marker[i] = new google.maps.Marker({
    position: new google.maps.LatLng(shimotokida_y[i], shimotokida_x[i]),
    map: map,
    //icon : myurl+Pic[i%n]
    icon : myurl+shimotokida_front[i]
  });
  //Y[i]=people_y[i];
  //X[i]=people_x[i];
}
}
</script>
