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
		  mysql_real_escape_string("obstetric"),
		  mysql_real_escape_string($pid)
    );

$resultObstetric = $db->select($strSQL,false,true);


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
          <div class="android-section-title mdl-typography--display-1-color-contrast pdl">Obstetric information</div>
          <?php
          if(!$resultObstetric){
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
                        No data in obstetric table, please check this patien's information or click "<a href="../createSession.php?id=<?php print $pid;?>&mid=1&com=edit" target="_self">EDIT THIS SECTION</a>" to edit this part.
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
                   <h4 class="mdl-card__title-text">Main obstetric information</h4>
                </div>
                <div class="android-drawer-separator"></div>
                <div class="mdl-card__supporting-text">
                  <table class="comp_table">
                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        Gravidity :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding" width="200">
                        <?php print $resultObstetric[0]['gravidity'];?>
                      </td>
                    </tr>
                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        Parity :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php print $resultObstetric[0]['parity'];?>
                      </td>
                    </tr>
                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        Antenatal care attendance :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php print $resultObstetric[0]['anc_attend'];?>
                      </td>
                    </tr>
                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        Gestational age at 1st ANC :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php print $resultObstetric[0]['ga1st'];?>
                      </td>
                    </tr>
                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        Antenatal booking before 20 weeks gestation :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php
                        switch($resultObstetric[0]['ga20w']){
                  				case 1: print "Yes"; break;
                  				case 0: print "No"; break;
                          default: print "N/A";
                  			}
                  			?>
                      </td>
                    </tr>
                    <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Number of antenatal visits :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php print $resultObstetric[0]['no_anc'];?>
                        </td>
                    </tr>
                    <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Rh :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          switch($resultObstetric[0]['rh']){
                    				case 'Unknow': print "Unknow"; break;
                    				case 'Neg': print "Negative"; break;
                    				case 'Pos': print "Positive"; break;
                            default: print "N/A";
                    			}
                    			?>
                        </td>
                    </tr>

                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        Anti D Immunoglobulin to mother if Rh neg :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php
                        switch($resultObstetric[0][8]){
                  				case 1: print "Yes"; break;
                  				default: print "No";
                  			}
                  			?>
                      </td>
                    </tr>

                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                        RPR :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php
                        switch($resultObstetric[0][9]){
                  				case 1: print "Done but no result"; break;
                  				case 2: print "Result negative"; break;
                  				case 3: print "Result positive"; break;
                  				default: print "Not done";
                  			}
                  			?>
                      </td>
                    </tr>

                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                      RPR treated :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php
                        switch($resultObstetric[0][10]){
                  				case 1: print "Yes"; break;
                  				case 0: print "No"; break;
                  				case 99: print "Not applicable"; break;
                          default: print "Not applicable";
                  			}
                  			?>
                      </td>
                    </tr>

                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                      HIV Status :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php
                        switch($resultObstetric[0][11]){
                  				case 'Unknow': print "Unknow"; break;
                  				case 'Neg': print "Negative"; break;
                  				case 'Pos': print "Positive"; break;
                          default: print "Not applicable";
                  			}
                  			?>
                      </td>
                    </tr>

                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                      On ART at delivery :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php
                        switch($resultObstetric[0][12]){
                  				case 'No': print "No"; break;
                  				case 'Dual': print "Dual"; break;
                  				case 'Triple': print "Triple"; break;
                          default: print "Not applicable";
                  			}
                  			?>
                      </td>
                    </tr>

                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                      HIV 1st test :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php
                        switch($resultObstetric[0][13]){
                  				case 1: print "Done but no result"; break;
                  				case 2: print "Result negative"; break;
                  				case 3: print "Result positive"; break;
                  				default: print "Not done";
                  			}
                  			?>
                      </td>
                    </tr>

                    <tr>
                      <td class="mdl-typography--font-light mdl-typography--subhead">
                      HIV retest after 12 weeks :
                      </td>
                      <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php
                        switch($resultObstetric[0][14]){
                  				case 1: print "Done but no result"; break;
                  				case 2: print "Result negative"; break;
                  				case 3: print "Result positive"; break;
                  				default: print "Not done";
                  			}
                  			?>
                      </td>
                    </tr>

                    <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          HIV in labour :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          switch($resultObstetric[0][15]){
                    				case 1: print "Done but no result"; break;
                    				case 2: print "Result negative"; break;
                    				case 3: print "Result positive"; break;
                    				default: print "Not done";
                    			}
                    			?>
                        </td>
                    </tr>

                    <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          CD4 labour/postpartum :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          switch($resultObstetric[0][16]){
                    				case 1: print "Yes"; break;
                    				case 0: print "No"; break;
                    			}
                    			?>
                        </td>
                    </tr>

                    <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          CD4 count :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                        <?php print $resultObstetric[0][17];?></td>
                        </td>
                    </tr>

                    <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Initiate ART at delivery :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          switch($resultObstetric[0][18]){
                    				case 1: print "Yes"; break;
                    				case 0: print "No"; break;
                    			}
                    			?>
                        </td>
                    </tr>

                    <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Birth before arrival (BBA) :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          switch($resultObstetric[0][19]){
                    				case 1: print "Yes"; break;
                    				case 0: print "No"; break;
                    			}
                    			?>
                        </td>
                    </tr>

                    <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Gestational age at admission :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php print $resultObstetric[0][20];?>
                        </td>
                    </tr>

                    <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Stage of labor at admission :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          switch($resultObstetric[0][21]){
                    				case 1: print "Latent phase"; break;
                    				case 2: print "Active phase 3 - 4 cm"; break;
                    				case 3: print "2nd stage of labor"; break;
                    				case 4: print "Head out periniun"; break;
                    				case 5: print "3rd stage of labor"; break;
                    				default: print "No labor";
                    			}
                    			?>
                        </td>
                    </tr>

                    <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Date - Time of labor star :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php print $resultObstetric[0][22];?>
                &nbsp;&nbsp;<?php print $resultObstetric[0][23];?>
                        </td>
                    </tr>

                    <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Date - Time of ruptured membranes :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php print $resultObstetric[0][24];?>
                &nbsp;&nbsp;<?php print $resultObstetric[0][25];?>
                        </td>
                    </tr>

                    <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Date - Time at 3-4 cm. :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php print $resultObstetric[0][26];?>
                &nbsp;&nbsp;<?php print $resultObstetric[0][27];?>
                        </td>
                    </tr>

                    <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Date - Time at fully dilated :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php print $resultObstetric[0][28];?>
                &nbsp;&nbsp;<?php print $resultObstetric[0][29];?>
                        </td>
                    </tr>

                    <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Duration of active phase of labour :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php print $resultObstetric[0][30];?>
                        </td>
                    </tr>
                  </table>
                </div>
                <div class="mdl-card__actions">
                   <a class="android-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="">
                     Edit info.
                     <i class="material-icons">chevron_right</i>
                   </a>
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
    <a href="../createSession.php?id=<?php print $pid;?>&mid=1&com=edit" target="_self" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Edit this section</a>
    <script src="material.min.js"></script>


  </body>
</html>
