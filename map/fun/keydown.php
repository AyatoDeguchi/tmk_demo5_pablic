<script>
function keydown(event) // 押されたキーのフラグを　１　にする
{
  if(event.keyCode == 49) //1 key
  {
    key_1 = 1;
  }
  if(event.keyCode == 50) //2 key
  {
    key_2 = 1;
  }
  if(event.keyCode == 51) //3 key
  {
    key_3 = 1;
  }
  if(event.keyCode == 52) //4 key
  {
    key_4 = 1;
  }
  if(event.keyCode == 53) //5 key
  {
    key_5 = 1;
  }
  if(event.keyCode == 37) //left key
  {
    left = 1;
  }
  if(event.keyCode == 38) //up key
  {
    up = 1;
  }
  if(event.keyCode == 39) //right key
  {
    right = 1;
  }
  if(event.keyCode == 40) //down key
  {
    down = 1;
  }
  if(event.keyCode == 90) //Z key
  {
    Z_key = 1;
  }
  if(event.keyCode == 88)//X key
  {
    X_key = 1;
  }
  disp() ;
}

var intTmrInterval = 200;	// 繰り返し処理の時間間隔（ミリ秒）

function intTmrInterval_fun(t){
  if(t == 0){
    intTmrInterval = 200;
  }else if(t == 1){
    intTmrInterval = 10000;
  }
}

var a_tmrExecte;			// 繰り返し処理のタイマーオブジェクト
function a_start(){
	clearInterval(a_tmrExecte);
	Z_key = 1;
  disp();
	a_tmrExecte = setInterval(disp, intTmrInterval);
}
var b_tmrExecte;			// 繰り返し処理のタイマーオブジェクト
function b_start(){
	clearInterval(b_tmrExecte);
	X_key = 1;
  disp();
	b_tmrExecte = setInterval(disp, intTmrInterval);
}
var u_tmrExecte;			// 繰り返し処理のタイマーオブジェクト
function u_start(){
	clearInterval(u_tmrExecte);
	up = 1;
  disp();
	u_tmrExecte = setInterval(disp, intTmrInterval);
}
var d_tmrExecte;			// 繰り返し処理のタイマーオブジェクト
function d_start(){
	clearInterval(d_tmrExecte);
	down = 1;
  disp();
	d_tmrExecte = setInterval(disp, intTmrInterval);
}
var r_tmrExecte;			// 繰り返し処理のタイマーオブジェクト
function r_start(){
	clearInterval(r_tmrExecte);
	right = 1;
  disp();
	r_tmrExecte = setInterval(disp, intTmrInterval);
}
var l_tmrExecte;			// 繰り返し処理のタイマーオブジェクト
function l_start(){
	clearInterval(l_tmrExecte);
	left = 1;
  disp();
	l_tmrExecte = setInterval(disp, intTmrInterval);
}

</script>
