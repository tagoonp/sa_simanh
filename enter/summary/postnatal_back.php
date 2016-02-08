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
		  mysql_real_escape_string("other_postnatal"),
		  mysql_real_escape_string($pid)
    );

$resultPostnatal = $db->select($strSQL,false,true);

if(!$resultPostnatal){

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
            <img class="android-logo-image" src="images/android-logo.png">
          </span>

          <div class="android-header-spacer mdl-layout-spacer"></div>


          <!-- Navigation -->
          <div class="android-navigation-container">
            <nav class="android-navigation mdl-navigation">
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="../index.php">Main menu</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="../confirm.php">Confirm list</a>
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
            <img class="android-logo-image" src="images/android-logo.png">
          </span>

        </div>
      </div>

      <div class="android-drawer mdl-layout__drawer">
        <span class="mdl-layout-title">
          <img class="android-logo-image" src="images/android-logo-white.png">
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
          <a class="mdl-navigation__link" href="../confirm.php">Confirmation list</a>
          <a class="mdl-navigation__link" href="../changepassword.php">Change password</a>
          <a class="mdl-navigation__link" href="../../signout.php">Signout</a>
        </nav>
      </div>

      <div class="android-content mdl-layout__content">
        <!-- <a name="top"></a> -->
        <div class="android-more-section" style="padding-top:20px;">
          <div class="android-section-title mdl-typography--display-1-color-contrast">Postnatal information</div>
          <div class="android-card-container mdl-grid">

                <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card mdl-shadow--3dp">
                  <div class="mdl-card__title">
                     <h4 class="mdl-card__title-text">Complications in postpartum</h4>
                  </div>
                  <div class="android-drawer-separator"></div>
                  <div style="padding:10px;">
                    <table border="0" class="comp_table">
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Postpartum haemorrhage :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          switch($resultPostnatal[0][1]){
                    				case 1: print "Yes"; break;
                    				default:print "No";
                    			}
                    			?>
                        </td>
                      </tr>
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Postpartum eclampsia :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          switch($resultPostnatal[0][2]){
                    				case 1: print "Yes"; break;
                    				default:print "No";
                    			}
                    			?>
                        </td>
                      </tr>
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Postpartum sepsis :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          switch($resultPostnatal[0][3]){
                    				case 1: print "Yes"; break;
                    				default:print "No";
                    			}
                    			?>
                        </td>
                      </tr>
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Postpartum maternal death :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          switch($resultPostnatal[0][4]){
                    				case 1: print "Yes"; break;
                    				default:print "No";
                    			}
                    			?>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>

                <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card mdl-shadow--3dp">
                  <div class="mdl-card__title">
                     <h4 class="mdl-card__title-text">Family planning</h4>
                  </div>
                  <div class="android-drawer-separator"></div>
                  <div style="padding:10px;">
                    <table border="0" class="comp_table">
                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Sterilisation :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          switch($resultPostnatal[0][5]){
                    				case 1: print "Yes"; break;
                    				default:print "No";
                    			}
                    			?>
                        </td>
                      </tr>

                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Oral contraception :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          switch($resultPostnatal[0][6]){
                    				case 1: print "Yes"; break;
                    				default:print "No";
                    			}
                    			?>
                        </td>
                      </tr>

                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Medroxyprogesterone :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          switch($resultPostnatal[0][7]){
                    				case 1: print "Yes"; break;
                    				default:print "No";
                    			}
                    			?>
                        </td>
                      </tr>

                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Norethisterone enanthate :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          switch($resultPostnatal[0][8]){
                    				case 1: print "Yes"; break;
                    				default:print "No";
                    			}
                    			?>
                        </td>
                      </tr>

                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Condoms :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          switch($resultPostnatal[0][9]){
                    				case 1: print "Yes"; break;
                    				default:print "No";
                    			}
                    			?>
                        </td>
                      </tr>

                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          IUCD inserted :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          switch($resultPostnatal[0][10]){
                    				case 1: print "Yes"; break;
                    				default:print "No";
                    			}
                    			?>
                        </td>
                      </tr>

                      <tr>
                        <td class="mdl-typography--font-light mdl-typography--subhead">
                          Subdermal implant :
                        </td>
                        <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                          <?php
                          switch($resultPostnatal[0][11]){
                    				case 1: print "Yes"; break;
                    				default:print "No";
                    			}
                    			?>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>

                <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card mdl-shadow--3dp">
                  <div class="mdl-card__title">
                     <h4 class="mdl-card__title-text">PMTCT and ART</h4>
                  </div>
                  <div class="android-drawer-separator"></div>
                  <div style="padding:10px;">

                    <?php
                    $strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
      						  mysql_real_escape_string("outcome"),
      						  mysql_real_escape_string($pid));

                    $resultNB = $db->select($strSQL,false,true);

                    $size = 0;
            				if($resultNB){
            					$size = sizeof($resultNB);
            				}

                    if($size > 0){
                      $c = 1;
                      foreach ($resultNB as $value) {
                        # code...
                        ?>
                          <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card mdl-shadow--1dp">
                            <div class="mdl-card__title">
                               <h4 class="mdl-card__title-text" style="color: #888;"><?php print "#".$c."&nbsp;&nbsp;Newborn ID - ".$value['nb_no']; ?></h4>
                            </div>
                            <div class="android-drawer-separator"></div>
                            <div style="padding:10px;">
                              <table border="0" class="comp_table">
                                <tr>
                                  <td class="mdl-typography--font-light mdl-typography--subhead">
                                    PMTCT Visit (Nevirapine to mother and baby) :
                                  </td>
                                  <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                                    <?php
                                    switch($resultPostnatal[0][1]){
                                      case 1: print "Yes"; break;
                                      default:print "No";
                                    }
                                    ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="mdl-typography--font-light mdl-typography--subhead">
                                    Baby initiated on AZT within 72 hours after birth :
                                  </td>
                                  <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                                    <?php
                                    switch($resultPostnatal[0][2]){
                                      case 1: print "Yes"; break;
                                      default:print "No";
                                    }
                                    ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="mdl-typography--font-light mdl-typography--subhead">
                                    Baby given Nevirapine :
                                  </td>
                                  <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                                    <?php
                                    switch($resultPostnatal[0][3]){
                                      case 1: print "Yes"; break;
                                      default:print "No";
                                    }
                                    ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="mdl-typography--font-light mdl-typography--subhead">
                                    Baby given Nevirapine within 72 hours after birth :
                                  </td>
                                  <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                                    <?php
                                    switch($resultPostnatal[0][4]){
                                      case 1: print "Yes"; break;
                                      default:print "No";
                                    }
                                    ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="mdl-typography--font-light mdl-typography--subhead">
                                    Nevirapine 6 weeks dose given to baby on dicharge :
                                  </td>
                                  <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                                    <?php
                                    switch($resultPostnatal[0][4]){
                                      case 1: print "Yes"; break;
                                      default:print "No";
                                    }
                                    ?>
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>

                          <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card mdl-shadow--1dp">
                            <div class="mdl-card__title">
                               Management of #<?php print $c; ?>
                            </div>
                            <div class="android-drawer-separator"></div>
                            <div style="padding:10px;">
                              <table border="0" class="comp_table">
                                <tr>
                                  <td class="mdl-typography--font-light mdl-typography--subhead">
                                    Infant feeding method :
                                  </td>
                                  <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                                    <?php
                                    switch($resultPostnatal[0][1]){
                                      case 1: print "Yes"; break;
                                      default:print "No";
                                    }
                                    ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="mdl-typography--font-light mdl-typography--subhead">
                                    Vitamin K to infant :
                                  </td>
                                  <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                                    <?php
                                    switch($resultPostnatal[0][2]){
                                      case 1: print "Yes"; break;
                                      default:print "No";
                                    }
                                    ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="mdl-typography--font-light mdl-typography--subhead">
                                    Polio dose :
                                  </td>
                                  <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                                    <?php
                                    switch($resultPostnatal[0][3]){
                                      case 1: print "Yes"; break;
                                      default:print "No";
                                    }
                                    ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="mdl-typography--font-light mdl-typography--subhead">
                                    BCG dose :
                                  </td>
                                  <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                                    <?php
                                    switch($resultPostnatal[0][4]){
                                      case 1: print "Yes"; break;
                                      default:print "No";
                                    }
                                    ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="mdl-typography--font-light mdl-typography--subhead">
                                    Admitted :
                                  </td>
                                  <td class="mdl-typography--font-light mdl-typography--subhead td-left-padding">
                                    <?php
                                    switch($resultPostnatal[0][4]){
                                      case 1: print "Yes"; break;
                                      default:print "No";
                                    }
                                    ?>
                                  </td>
                                </tr>
                              </table>
                            </div>
                            <div class="android-drawer-separator"></div>
                          </div>
                        <?php
                      }
                    }else{
                      ?>
                      <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet mdl-cell--12-col-phone mdl-card mdl-shadow--3dp">
                        <div class="mdl-card__title">
                           <h4 class="mdl-card__title-text">No data</h4>
                        </div>
                      </div>
                      <?php
                    }
                    ?>



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
    <a href="https://github.com/google/material-design-lite/blob/master/templates/android-dot-com/" target="_blank" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Edit this section</a>
    <script src="material.min.js"></script>


  </body>
</html>
