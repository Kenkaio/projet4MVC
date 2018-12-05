<?php
    require('../models/modelCoBdd.php');
    require('../models/modelAdmin.php');

    if (isset($_POST['reloadRep'])) {    
        $responses = responses();
        $arrayCom = array();
        fclose(fopen('../models/json/arrayR.json', 'w'));
        $i=0;
        while ($response = $responses->fetch())
        {    
            $arrayCom = $response;
            $i++;
            $js = file_get_contents('../models/json/arrayR.json');

            $js = json_decode($js, true);

            $js[] = $arrayCom;

            $js = json_encode($js);
            file_put_contents('../models/json/arrayR.json', $js);
          
        }    
        
        $arrayNumber = array();
        fclose(fopen('../models/json/numberR.json', 'w'));
        $put = file_get_contents('../models/json/numberR.json');
        $put = json_decode($put, true);
        $put[] = $i;
        $put = json_encode($put);
        file_put_contents('../models/json/numberR.json', $put);
    }

    if (isset($_POST['reloadCom'])) {
      $comments = comments();
      $arrayCom = array();
      fclose(fopen('../models/json/arrayC.json', 'w'));
      $i=0;
      while ($comment = $comments->fetch())
      {    
          $arrayCom = $comment;

          $js = file_get_contents('../models/json/arrayC.json');

          $js = json_decode($js, true);

          $js[] = $arrayCom;

          $js = json_encode($js);
          file_put_contents('../models/json/arrayC.json', $js);
          $i++;
      }      

      $arrayNumber = array();
      fclose(fopen('../models/json/numberC.json', 'w'));
      $put = file_get_contents('../models/json/numberC.json');
      $put = json_decode($put, true);
      $put[] = $i;
      $put = json_encode($put);
      file_put_contents('../models/json/numberC.json', $put);
    }

    if (isset($_POST['reloadMail'])) {
      $messages = messages();
      $arrayCom = array();
      fclose(fopen('../models/json/messagerie.json', 'w'));
      $i=0;
      while ($message = $messages->fetch())
      {    
          $arrayCom = $message;
          $i++;
          $js = file_get_contents('../models/json/messagerie.json');

          $js = json_decode($js, true);

          $js[] = $arrayCom;

          $js = json_encode($js);
          file_put_contents('../models/json/messagerie.json', $js);
        
      }
      $arrayNumber = array();
      fclose(fopen('../models/json/numberM.json', 'w'));
      $put = file_get_contents('../models/json/numberM.json');
      $put = json_decode($put, true);
      $put[] = $i;
      $put = json_encode($put);
      file_put_contents('../models/json/numberM.json', $put);
    }
    if (isset($_POST['reloadSign'])) {
      $signalements = signalementC();
      $arrayCom = array();
      fclose(fopen('../models/json/arrayS.json', 'w'));
      $i=0;
      while ($signalement = $signalements->fetch())
      {    
          $arrayCom = $signalement;

          $js = file_get_contents('../models/json/arrayS.json');

          $js = json_decode($js, true);

          $js[] = $arrayCom;

          $js = json_encode($js);
          file_put_contents('../models/json/arrayS.json', $js);
          $i++;
      }      

      $arrayNumber = array();
      fclose(fopen('../models/json/numberS.json', 'w'));
      $put = file_get_contents('../models/json/numberS.json');
      $put = json_decode($put, true);
      $put[] = $i;
      $put = json_encode($put);
      file_put_contents('../models/json/numberS.json', $put);
    }
?>