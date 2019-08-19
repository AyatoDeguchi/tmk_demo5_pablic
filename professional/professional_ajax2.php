<?php
      include 'db_config.php';
      $text = array();
      if(isset($_POST['q']))
      {
        $q = $_POST['q'];
        try
        {
           $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
           $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $stmt = $db->query("SELECT * FROM professional WHERE `explain` LIKE '%$q%'");
           $text = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $db = null;
        }
        catch(PDOException $e)
        {
         echo $e->getMessage();
         exit;
        }
        //print_r($text);
     }

      else{
        try
        {
           $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
           $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $stmt = $db->query("SELECT * FROM professional");
           $text = $stmt->fetchAll(PDO::FETCH_ASSOC);
           $db = null;
        }
        catch(PDOException $e)
        {
         echo $e->getMessage();
         exit;
        }
      }?>
                 <?php

           $i = 0;
           foreach ($text as $r) {
             $id = $r['id'];
             $image = $r['image'];
             $title = $r['title'];
             $explain = $r['explain'];

               echo <<< EOM
               <div id="modal-content-{$i}" class="modal_content">
               <img class="image" src="{$image}">
               <p class="finish">「閉じる」か「背景」をクリックすると終了します。</p>
                <p><a id="modal-close"  class="button-link">閉じる</a></p>
               </div>
EOM;
              $i += 1;
           }
           ?>
