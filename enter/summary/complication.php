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

$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
		  mysql_real_escape_string("complication_delivery"),
		  mysql_real_escape_string($pid)
    );

$resultCom = $db->select($strSQL,false,true);

if(!$resultCom){

}
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
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="confirm_list.php">Confirm list</a>
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
          <span class="mdl-navigation__link"><strong>Data categories</strong></span>
          <a class="mdl-navigation__link" href="index.php?pid=<?php print $pid;?>">Birth registry</a>
          <a class="mdl-navigation__link" href="obstetric.php?pid=<?php print $pid;?>">Obstetric</a>
          <a class="mdl-navigation__link" href="delivery.php?pid=<?php print $pid;?>">Delivery</a>
          <a class="mdl-navigation__link" href="outcome.php?pid=<?php print $pid;?>">Outcome</a>
          <a class="mdl-navigation__link" href="complication.php?pid=<?php print $pid;?>">Complications</a>
          <a class="mdl-navigation__link" href="postnatal.php?pid=<?php print $pid;?>">Postnatal</a>
          <div class="android-drawer-separator"></div>
          <span class="mdl-navigation__link"><strong>User command</strong></span>
          <a class="mdl-navigation__link" href="../index.php">Main menu</a>
          <a class="mdl-navigation__link" href="confirm_list.php">Confirmation list</a>
          <a class="mdl-navigation__link" href="../changepassword.php">Change password</a>
          <a class="mdl-navigation__link" href="../../signout.php">Signout</a>
        </nav>
      </div>

      <div class="android-content mdl-layout__content">
        <!-- <a name="top"></a> -->
        <div class="android-more-section" style="padding-top:20px;">
          <div class="android-section-title mdl-typography--display-1-color-contrast pdl">Complication information</div>
          <div class="android-card-container mdl-grid">

                <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card mdl-shadow--3dp">
                  <div class="mdl-card__title">
                     <h4 class="mdl-card__title-text">Complications in labour / delivery</h4>
                  </div>
                  <div class="android-drawer-separator"></div>
                  <div style="padding:10px;">
                    <table border="0" class="comp_table">
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead" width="80">
                          1
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Induction of labour :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          if($resultCom){
                            switch($resultCom[0][1]){
                      				case 1: print "Yes"; break;
                      				default:print "No";
                      			}
                          }else{
                            print "No";
                          }
                    			?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" bgcolor="#efefef" height="1" style="padding:0;"></td>
                      </tr>
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead" width="80">
                          2
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Antepartum haemorrhage :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          if($resultCom){
                            switch($resultCom[0][2]){
                      				case 1: print "Yes"; break;
                      				default:print "No";
                      			}

                            if(($resultCom[0][3]!=0) || ($resultCom[0][4]!=0)){
                              print "&nbsp;-&nbsp;";

                              switch($resultCom[0][3]){
                        				case 1: print "AP"; break;
                        				default:print "";
                        			}

                              switch($resultCom[0][4]){
                        				case 1: print "PP"; break;
                        				default:print "";
                        			}
                            }
                          }else{
                            print "No";
                          }
                    			?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" bgcolor="#efefef" height="1" style="padding:0;"></td>
                      </tr>
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead" width="80">
                          3
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Postpartum haemorrhage :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          if($resultCom){
                            switch($resultCom[0][5]){
                      				case 1: print "Yes"; break;
                      				default:print "No";
                      			}
                          }else{
                            print "No";
                          }
                    			?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" bgcolor="#efefef" height="1" style="padding:0;"></td>
                      </tr>
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead" width="80">
                          4
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Severe pre eclampsia :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          if($resultCom){
                            switch($resultCom[0][6]){
                      				case 1: print "Yes"; break;
                      				default:print "No";
                      			}
                          }else{
                            print "No";
                          }
                    			?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" bgcolor="#efefef" height="1" style="padding:0;"></td>
                      </tr>
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead" width="80">
                          5
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Eclampsia :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          if($resultCom){
                            switch($resultCom[0][7]){
                      				case 1: print "Yes"; break;
                      				default:print "No";
                      			}
                          }else{
                            print "No";
                          }
                    			?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" bgcolor="#efefef" height="1" style="padding:0;"></td>
                      </tr>
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead" width="80">
                          6
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Prolonged rupture of membranes :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          if($resultCom){
                            switch($resultCom[0][8]){
                      				case 1: print "Yes"; break;
                      				default:print "No";
                      			}
                          }else{
                            print "No";
                          }
                    			?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" bgcolor="#efefef" height="1" style="padding:0;"></td>
                      </tr>
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead" width="80">
                          7
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Ruptured uterus :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          if($resultCom){
                            switch($resultCom[0][9]){
                      				case 1: print "Yes"; break;
                      				default:print "No";
                      			}
                          }else{
                            print "No";
                          }
                    			?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" bgcolor="#efefef" height="1" style="padding:0;"></td>
                      </tr>
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead" width="80">
                          8
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Sepsis :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          if($resultCom){
                            switch($resultCom[0][10]){
                      				case 1: print "Yes"; break;
                      				default:print "No";
                      			}
                          }else{
                            print "No";
                          }
                    			?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" bgcolor="#efefef" height="1" style="padding:0;"></td>
                      </tr>
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead" width="80">
                          9
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Obstructed or prolonged labour :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          if($resultCom){
                            switch($resultCom[0][11]){
                      				case 1: print "Yes"; break;
                      				default:print "No";
                      			}
                          }else{
                            print "No";
                          }
                    			?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" bgcolor="#efefef" height="1" style="padding:0;"></td>
                      </tr>
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead" width="80">
                          10
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Retained placenta :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          if($resultCom){
                            switch($resultCom[0][12]){
                      				case 1: print "Yes"; break;
                      				default:print "No";
                      			}
                          }else{
                            print "No";
                          }
                    			?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" bgcolor="#efefef" height="1" style="padding:0;"></td>
                      </tr>
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead" width="80">
                          11
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Manual removal of placenta :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          if($resultCom){
                            switch($resultCom[0][13]){
                      				case 1: print "Yes"; break;
                      				default:print "No";
                      			}
                          }else{
                            print "No";
                          }
                    			?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" bgcolor="#efefef" height="1" style="padding:0;"></td>
                      </tr>
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead" width="80">
                          12
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Maternal death :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          if($resultCom){
                            switch($resultCom[0][14]){
                      				case 1: print "Yes"; break;
                      				default:print "No";
                      			}
                          }else{
                            print "No";
                          }
                    			?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" bgcolor="#efefef" height="1" style="padding:0;"></td>
                      </tr>
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead" width="80">
                          13
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Stillbirth :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          if($resultCom){
                            switch($resultCom[0][15]){
                      				case 1: print "Yes"; break;
                      				default:print "No";
                      			}
                          }else{
                            print "No";
                          }
                    			?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" bgcolor="#efefef" height="1" style="padding:0;"></td>
                      </tr>
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead" width="80">
                          14
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Neonatal death :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          if($resultCom){
                            switch($resultCom[0][16]){
                      				case 1: print "Yes"; break;
                      				default:print "No";
                      			}
                          }else{
                            print "No";
                          }
                    			?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" bgcolor="#efefef" height="1" style="padding:0;"></td>
                      </tr>
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead" width="80">
                          15
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Preterm birth :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          if($resultCom){
                            switch($resultCom[0][17]){
                      				case 1: print "Yes"; break;
                      				default:print "No";
                      			}
                          }else{
                            print "No";
                          }
                    			?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" bgcolor="#efefef" height="1" style="padding:0;"></td>
                      </tr>
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead" width="80">
                          16
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Low birth weight :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          if($resultCom){
                            switch($resultCom[0][18]){
                      				case 1: print "Yes"; break;
                      				default:print "No";
                      			}
                          }else{
                            print "No";
                          }
                    			?>
                        </td>
                      </tr>
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
    <a href="../createSession.php?id=<?php print $pid;?>&mid=4&com=edit" target="_self" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Edit this section</a>
    <script src="material.min.js"></script>


  </body>
</html>
