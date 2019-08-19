<script>
function disp() // キーボード入力を反映して表示座標を更新
{
  if(left==1){
    if(position == 0){
      setTimeout(menu_select("left"),1000);
    }else if(position == 1){
      setTimeout(menu_select("left"),10000);
    }
  }
  if(right==1){
    if(position == 0){
      setTimeout(menu_select("right"),1000);
    }else if(position == 1){
      setTimeout(menu_select("right"),10000);
    }
  }
  if(up==1){
    if(position == 0){
      setTimeout(menu_select("up"),1000);
    }else if(position == 1){
      setTimeout(menu_select("up"),10000);
    }
  }
  if(down==1){
    if(position == 0){
      setTimeout(menu_select("down"),1000);
    }else if(position == 1){
      setTimeout(menu_select("down"),10000);
    }
  }
  if(Z_key==1){
    menu_select("ok");
  }
  if(X_key==1){
    menu_select("no");
  }
}
</script>
