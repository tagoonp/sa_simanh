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
		  mysql_real_escape_string("delivery"),
		  mysql_real_escape_string($pid)
    );

$resultDelivery = $db->select($strSQL,false,true);

if(!$resultDelivery){

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
          <div class="android-section-title mdl-typography--display-1-color-contrast pdl">Delivery information</div>
          <?php
          if(!$resultDelivery){
            ?>
            <div class="android-card-container mdl-grid">
              <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card mdl-shadow--3dp">
                <div class="mdl-card__title">
                   <h4 class="mdl-card__title-text">No data</h4>
                </div>
                <div class="android-drawer-separator"></div>
                <div class="mdl-card__supporting-text">
                  <table class="comp_table">
                    <tr>
                      <td>
                        No data in delivery table, please check this patien's information or click "<a href="../createSession.php?id=<?php print $pid;?>&mid=2&com=edit" target="_self">EDIT THIS SECTION</a>" to edit this part.
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <?php
          }else{
            ?>
            <div class="android-card-container mdl-grid">
              <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card mdl-shadow--3dp">
                <div class="mdl-card__title">
                   <h4 class="mdl-card__title-text">Main delivery information</h4>
                </div>
                <div class="android-drawer-separator"></div>
                <div class="mdl-card__supporting-text">
                  <table class="comp_table">
                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        Gestational age at delivery :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding" width="200">
                        <?php print $resultDelivery[0][1];?>
                      </td>
                    </tr>
                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        Date - Time of delivery :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php
                       print $resultDelivery[0][2];?>
             &nbsp;&nbsp;<?php
                       print $resultDelivery[0][3];?>
                      </td>
                    </tr>
                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        Mode of delivery :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php
                      switch($resultDelivery[0][4]){
                				case 1: print "Normal delivery"; break;
                				case 2: print "V/E"; break;
                				case 3: print "F/E"; break;
                				case 4: print "Caesarean section"; break;
                				case 5: print "Vaginal breach"; break;
                        default: print "N/A";
                			}
                			?>
                      </td>
                    </tr>
                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        Indication :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php
                          if($resultDelivery[0]['ind_other']!=''){
                  				      print $resultDelivery[0]['ind_other'];
                  			  }else{
                  				      $strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."indication where ind_id = '".$resultDelivery[0]['indication']."' ";
                  				      $resultInd = $db->select($strSQL,false,true);
                  				      if($resultInd){
                  					           print $resultInd[0][1];
                  				      }else{
                  					           print "No data";
                  				      }
                  			  }
                  			?>
                      </td>
                    </tr>

                    <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Type of birth attendant :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          switch($resultDelivery[0][6]){
                    				case 1: print "Midwife"; break;
                    				case 2: print "Nurse"; break;
                    				case 3: print "Medical student"; break;
                    				case 4: print "Doctor"; break;
                    				case 5: print "Resident"; break;
                    				case 6: print "Obstetrician"; break;
                    				default: print "No data";
                    			}
                    			?>
                        </td>
                    </tr>

                  </table>
                </div>

              </div>

              <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card mdl-shadow--3dp">
                <div class="mdl-card__title">
                   <h4 class="mdl-card__title-text">Perineum</h4>
                </div>
                <div class="android-drawer-separator"></div>
                <div class="mdl-card__supporting-text">
                  <table class="comp_table">
                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        Intact :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding" width="200">
                        <?php
                        switch($resultDelivery[0][7]){
                  				case 1: print "Yes"; break;
                  				default: print "No";
                  			}
                  			?>
                      </td>
                    </tr>
                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        Episiotomy :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php
                        switch($resultDelivery[0][8]){
                  				case 1: print "Yes"; break;
                  				default: print "No";
                  			}
                  			?>
                      </td>
                    </tr>
                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        Degree tear :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php
                        switch($resultDelivery[0][9]){
                  				case 1: print "1"; break;
                  				case 2: print "2"; break;
                  				case 3: print "3"; break;
                  				default: print "No data";
                  			}
                  			?>
                      </td>
                    </tr>

                  </table>
                </div>

              </div>

              <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card mdl-shadow--3dp">
                <div class="mdl-card__title">
                   <h4 class="mdl-card__title-text">ART</h4>
                </div>
                <div class="android-drawer-separator"></div>
                <div class="mdl-card__supporting-text">
                  <table class="comp_table">
                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        Antenatal client on AZT before labour :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding" width="200">
                        <?php
                        switch($resultDelivery[0][10]){
                  				case 1: print "Yes"; break;
                  				default: print "No";
                  			}
                  			?>
                      </td>
                    </tr>
                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        Antenatal client Nevirapine taken during labour :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php
                        switch($resultDelivery[0][11]){
                  				case 1: print "Yes"; break;
                  				default: print "No";
                  			}
                  			?>
                      </td>
                    </tr>
                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        Truvada given to woman after delivery :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php
                        switch($resultDelivery[0][12]){
                  				case 1: print "Yes"; break;
                  				default: print "No";
                  			}
                  			?>
                      </td>
                    </tr>

                  </table>
                </div>
              </div>

            </div>
            <?php
          }
          ?>

        </div>

        <footer class="android-footer mdl-mega-footer">
          <?php
          include "footer.php";
          ?>
        </footer>
      </div>
    </div>
    <a href="../createSession.php?id=<?php print $pid;?>&mid=2&com=edit" target="_self" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Edit this section</a>
    <script src="material.min.js"></script>


  </body>
</html>
