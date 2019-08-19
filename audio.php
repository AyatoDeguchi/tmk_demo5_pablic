<script>
function audio_play(audio_name){
  var audio_file_name = audio_name;
  if(audio_file_name == 'decide' || audio_file_name == 'levelup'){
    var myAudio2 = new Audio('');
    //　選択された曲の音声ファイルのパス情報を準備
    var ogg2 = '/demo5_mobile/music/'
      + audio_file_name + '.ogg';
    var mp32 = '/demo5_mobile/music/'
      + audio_file_name + '.mp3';

    //　MIMEタイプの判定用の変数
    var canPlayOgg2 = ('' != myAudio.canPlayType('audio/ogg'));
    var canPlayMp32 = ('' != myAudio.canPlayType('audio/mpeg'));

    //　MIMEタイプを判定し、myAudio.srcに音声ファイルのパスを指定
    if (canPlayOgg2) {
      myAudio2.src = ogg2;
    } else if (canPlayMp32) {
      myAudio2.src = mp32;
    }
    //　曲を再生
    myAudio2.play();
    console.log(myAudio2);
  }else{
    //　選択された曲の音声ファイルのパス情報を準備
    var ogg = '/demo5_mobile/music/'
      + audio_file_name + '.ogg';
    var mp3 = '/demo5_mobile/music/'
      + audio_file_name + '.mp3';

    //　MIMEタイプの判定用の変数
    var canPlayOgg = ('' != myAudio.canPlayType('audio/ogg'));
    var canPlayMp3 = ('' != myAudio.canPlayType('audio/mpeg'));

    //　MIMEタイプを判定し、myAudio.srcに音声ファイルのパスを指定
    if (canPlayOgg) {
      myAudio.src = ogg;
    } else if (canPlayMp3) {
      myAudio.src = mp3;
    }
    if (myAudio.paused) {
      console.log('再生中');
    }
    //　曲を再生
    myAudio.play();
    console.log(myAudio);
    //<audio preload=​"auto" src=​"/​demo3_mobile/​music/​decide.ogg">​</audio>​
  }
}
</script>
