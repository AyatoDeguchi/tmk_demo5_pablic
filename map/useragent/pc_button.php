<?php
echo <<< EOM
<div class="button_touch">
  <p id="a_btn" onMouseDown="a_start();" onMouseUp="a_stop();" onmouseout="a_stop();" ontouchend="a_stop();">○</p>
  <p id="b_btn" onMouseDown="b_start();" onMouseUp="b_stop();" onmouseout="b_stop();" ontouchend="b_stop();">×</p>
  <p id="u_btn" onMouseDown="u_start();" onMouseUp="u_stop();" onmouseout="u_stop();" ontouchend="u_stop();">▲</p>
  <p id="d_btn" onMouseDown="d_start();" onMouseUp="d_stop();" onmouseout="d_stop();" ontouchend="d_stop();">▼</p>
  <p id="r_btn" onMouseDown="r_start();" onMouseUp="r_stop();" onmouseout="r_stop();" ontouchend="r_stop();">▶</p>
  <p id="l_btn" onMouseDown="l_start();" onMouseUp="l_stop();" onmouseout="l_stop();" ontouchend="l_stop();">◀</p>
</div>
EOM;
?>
