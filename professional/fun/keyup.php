<script>
function keyup(event) // 離されたキーのフラグを　０　にする
{
  if(event.keyCode == 49) //1 key
  {
    key_1 = 0;
  }
  if(event.keyCode == 50) //2 key
  {
    key_2 = 0;
  }
  if(event.keyCode == 51) //3 key
  {
    key_3 = 0;
  }
  if(event.keyCode == 52) //4 key
  {
    key_4 = 0;
  }
  if(event.keyCode == 53) //5 key
  {
    key_5 = 0;
  }
  if(event.keyCode == 37) //left key
  {
    left = 0;
  }
  if(event.keyCode == 38) //up key
  {
    up = 0;
  }
  if(event.keyCode == 39) //right key
  {
    right = 0;
  }
  if(event.keyCode == 40) //down key
  {
    down = 0;
  }
  if(event.keyCode == 90) //Z key
  {
    Z_key = 0;
  }
  if(event.keyCode == 88)//X key
  {
    X_key = 0;
  }
}

function a_stop(){
	clearInterval(a_tmrExecte);
	Z_key=0;
}
function b_stop(){
	clearInterval(b_tmrExecte);
	X_key=0;
}
function u_stop(){
	clearInterval(u_tmrExecte);
	up=0;
}
function d_stop(){
	clearInterval(d_tmrExecte);
	down=0;
}
function r_stop(){
	clearInterval(r_tmrExecte);
	right=0;
}
function l_stop(){
	clearInterval(l_tmrExecte);
	left=0;
}

</script>
