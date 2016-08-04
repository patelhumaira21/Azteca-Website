<?php 
  if (!isset($_GET["pageId"])) {
    $page_id = 1;
  }
  else{
      $page_id = $_GET["pageId"] ;
  }

  require_once("site_connect.php");
  require_once ("cookies.php");
      checkTimeOut(); 

  $result = dbSelect("Select * from pages where id=".$page_id);
  $activePage = $result[0]["page_name"];
  $title = $result[0]["title"];
  $header = eval("?>".$result[0]["header"]."<?");
  $body = eval("?>".$result[0]["body"]."<?");

  echo '<!DOCTYPE html><html lang="en">'.$title.'<body>';
  echo $header;
  echo '<main>'.$body.'</main>';
  echo '<footer>';
  include_once ('includes/footer.php'); 
  echo '</footer>';
  echo '</body></html>';

?>
