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
      <ul class="kensaku-ul" id="kensaku" style="margin-top:30px;margin-left:30px;font-size:30px">
      <?php
                 $i = 0;
                 foreach ($text as $r) {
                   $id = $r['id'];
                   $image = $r['image'];
                   $title = $r['title'];
                   $explain = $r['explain'];

                     echo <<< EOM
                     <li><a class="modal-syncer " data-target="modal-content-{$i}"> {$title}</a></li>
EOM;
                    $i += 1;
                 }?>
          </ul>
