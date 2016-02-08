<?php
session_start();

$pid = '';
if(isset($_GET['pid'])){
  $pid = $_GET['pid'];
}

require_once "../../lib/server-config.php";
require_once "../../lib/connect.class.php";

$db = new database();
$db->connect2(trim($u),trim($p),trim($dbn));

$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s
WHERE confirm_status = '0' and username in
(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id in
(SELECT institute_id FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE username = '%s') )",
  mysql_real_escape_string("registerrecord"),
mysql_real_escape_string($_SESSION['userSIMANHusername'])
);

$result = $db->select($strSQL,false,true);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMANH South Africa</title>

    <!-- Page styles -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/material.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet"  type="text/css" href="css/style.css" />
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
    <script type="text/javascript">
      function redirect(url){
        window.location = url;
      }

      function redirect2(url){
        if(confirm('Confirm to delete this record?')){
          window.location = url;
        }
      }
    </script>
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

      <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="android-title mdl-layout-title">
            <img class="android-logo-image" src="images/logo.png">
          </span>

          <div class="android-header-spacer mdl-layout-spacer"></div>


          <!-- Navigation -->
          <div class="android-navigation-container">
            <nav class="android-navigation mdl-navigation">
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="../index.php">Main menu</a>
            </nav>
          </div>

          <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
            <li class="mdl-menu__item"><a class="mdl-navigation__link" href="../userinfo.php">User information</a></li>
            <li class="mdl-menu__item"><a class="mdl-navigation__link" href="../changepassword.php">Change password</a></li>
            <li class="mdl-menu__item"><a  class="mdl-navigation__link" href="../../signout.php">Signout</a></li>
          </ul>
          <span class="android-mobile-title mdl-layout-title">
            <img class="android-logo-image" src="images/logo.png">
          </span>

        </div>
      </div>

      <div class="android-drawer mdl-layout__drawer">
        <span class="mdl-layout-title">
          <img class="android-logo-image" src="images/logo-white.png">
        </span>
        <nav class="mdl-navigation">
          <span class="mdl-navigation__link"><strong>For Labour / Delivery ward</strong></span>
          <a class="mdl-navigation__link" href="../monitor/">Statistics</a>
          <a class="mdl-navigation__link" href="../main.php">Enter individual data</a>
          <div class="android-drawer-separator"></div>
          <span class="mdl-navigation__link"><strong>For postpartum ward</strong></span>
          <a class="mdl-navigation__link" href="../search.php">Search record</a>
          <div class="android-drawer-separator"></div>
          <span class="mdl-navigation__link"><strong>User command</strong></span>
          <a class="mdl-navigation__link" href="../index.php">Main menu</a>
          <a class="mdl-navigation__link" href="../confirm.php">Confirmation list</a>
          <a class="mdl-navigation__link" href="../changepassword.php">Change password</a>
          <a class="mdl-navigation__link" href="../../signout.php">Signout</a>
        </nav>
      </div>

      <div class="android-content mdl-layout__content">

        <!-- <a name="top"></a> -->
        <div class="android-more-section" style="padding-top:20px;">
          <div class="android-section-title mdl-typography--display-1-color-contrast pdl">
            <!-- <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card mdl-shadow--0dp">
            <img src="../../images/sa-simanh-logo2.png" width="300">
            </div> -->
            <!-- <div class="android-card-container mdl-grid">
              <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-phone mdl-card mdl-shadow--0dp" style="text-align:center; padding:0; min-height:0px;">
                <div class="mdl-card__media" style="text-align:center; padding:0; min-height:0px;">
                  <img src="../../images/sa-simanh-logo2.png">
                </div>
              </div>
            </div> -->

            <div class="android-card-container mdl-grid">
              <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card mdl-shadow--3dp">
                <div class="mdl-card__title">
                   <h4 class="mdl-card__title-text">Confirm information</h4>
                </div>
                <div class="android-drawer-separator"></div>
                <div class="mdl-card__supporting-text" style="width:100%;">
                  <table class="comp_table2" width="100%">
                    <thead>
                      <tr>
                        <th align="left">
                          #
                        </th>
                        <th align="left">
                          Full name
                        </th>
                        <th align="left">
                          Admission date
                        </th>
                        <th align="left">
                          Status
                        </th>
                        <th>
                          &nbsp;
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if($result){
                        $c=1;
                        foreach($result as $v){
                          ?>
                          <tr>
                            <td class="pdt">
                              <?php print $c; ?>
                            </td>
                            <td class="pdt">
                              <?php print $v['p_fname']." ".$v['p_mname']." ".$v['p_lname']; ?>
                            </td>
                            <td class="pdt">
                              <?php print $v['date_adm']; ?>
                            </td>
                            <td class="pdt">
                              <?php
                              if($v['confirm_status']==0){
                                print "Un-confirm";
                              }else{
                                print "Confirmed";
                              }
                               ?>
                            </td>
                            <td align="left" style="display:blodk; width:180px;">
                              <button type="button" name="btnView" class="btn-primary" onclick="redirect('index.php?pid=<?php print $v['record_id']; ?>')"><i class="fa fa-file-text"></i></button>
                              <button type="button" name="button" class="btn-primary"  onclick="redirect('../confirmStatus.php?id=<?php print $v['record_id']; ?>')">Confirm</button>
                              <button type="button" name="button" class="btn-danger" onclick="redirect2('../delete.php?id=<?php print $v['record_id']; ?>')"><i class="fa fa-trash"></i></button>
                            </td>
                          </tr>
                          <?php
                          $c++;
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>


        </div>

        <footer class="android-footer mdl-mega-footer">
          <?php
          include "footer.php";
          ?>
        </footer>
      </div>
    </div>

    <script src="material.min.js"></script>


  </body>
</html>
