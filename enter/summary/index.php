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
		  mysql_real_escape_string("registerrecord"),
		  mysql_real_escape_string($pid)
    );

$resultRegister = $db->select($strSQL,false,true);

if(!$resultRegister){

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
          <div class="android-section-title mdl-typography--display-1-color-contrast pdl">Birth registry</div>
          <div class="android-card-container mdl-grid">
            <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card mdl-shadow--3dp">
              <div class="mdl-card__title">
                 <h4 class="mdl-card__title-text">Main admission data</h4>
              </div>
              <div class="android-drawer-separator"></div>
              <div class="mdl-card__supporting-text">
                <table  class="comp_table">
                  <tr>
                    <td class="mdl-typography--font-light mdl-typography--subhead">
                      Date - Time of admission :
                    </td>
                    <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding" width="200">
                      <?php print $resultRegister[0]['date_adm'];?>&nbsp;&nbsp;<?php print $resultRegister[0]['time_adm'];?>
                    </td>
                  </tr>
                  <tr>
                    <td class="mdl-typography--font-light mdl-typography--subhead">
                      Folder number :
                    </td>
                    <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                      <?php print $resultRegister[0]['folder_no'];?>
                    </td>
                  </tr>
                  <tr>
                    <td class="mdl-typography--font-light mdl-typography--subhead">
                      Point of delivery folder no. :
                    </td>
                    <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                      <?php print $resultRegister[0]['point_no'];?>
                    </td>
                  </tr>
                  <tr>
                    <td class="mdl-typography--font-light mdl-typography--subhead">
                      Refer status :
                    </td>
                    <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                      <?php
                      switch($resultRegister[0]['refer_in_status']){
                        case 1: print "Yes"; break;
                        default: print "No";
                      }
                      ?>
                    </td>
                  </tr>
                  <?php
                  if($resultRegister[0]['refer_in_status']==1){
                    ?>
                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        Refer from facility :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php print $resultRegister[0]['refer_in_facility'];?>
                      </td>
                    </tr>
                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        Stage of patient :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php
                        switch($resultRegister[0]['stage_of_patient']){
                          case 1: print "Stable"; break;
                          case 2: print "Unstable"; break;
                          case 3: print "Coma"; break;
                          default: print "N/A";
                        }
                        ?>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
                </table>
              </div>

            </div>

            <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card mdl-shadow--3dp">
              <div class="mdl-card__title">
                 <h4 class="mdl-card__title-text">Demographic information</h4>
              </div>
              <div class="android-drawer-separator"></div>
              <div class="mdl-card__supporting-text">
                <table class="comp_table">
                  <tr>
                    <td class="mdl-typography--font-light mdl-typography--subhead">
                      ID No, / Passport ID / Date of bitrh [YYMMDD] :
                    </td>
                    <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding" width="200">
                      <?php print $resultRegister[0]['pid'];?>
                    </td>
                  </tr>
                  <tr>
                    <td class="mdl-typography--font-light mdl-typography--subhead">
                      Patient's Name, Midname, Surname :
                    </td>
                    <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                      <?php
                  			$mname = '';
                  			if($resultRegister[0]['p_mname']!=''){
                  				$mname = $resultRegister[0]['p_mname']." ";
                  			}
                  			print $resultRegister[0]['p_fname']." ".$mname.$resultRegister[0]['p_lname'];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="mdl-typography--font-light mdl-typography--subhead">
                      Address :
                    </td>
                    <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                      <?php print $resultRegister[0]['p_address'];?>
                    </td>
                  </tr>
                  <tr>
                    <td class="mdl-typography--font-light mdl-typography--subhead">
                      Phone number :
                    </td>
                    <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                      <?php print $resultRegister[0]['p_phone'];?>
                    </td>
                  </tr>
                  <tr>
                    <td class="mdl-typography--font-light mdl-typography--subhead">
                      Date of birth :
                    </td>
                    <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                      <?php print $resultRegister[0]['p_dob'];?>
                    </td>
                  </tr>
                  <tr>
                    <td class="mdl-typography--font-light mdl-typography--subhead">
                      Age :
                    </td>
                    <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                      <?php print $resultRegister[0]['p_cage'];?></td>
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
    <a href="../createSession.php?id=<?php print $pid;?>&mid=0&com=edit" target="_self" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Edit this section</a>
    <script src="material.min.js"></script>


  </body>
</html>
