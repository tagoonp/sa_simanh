<?php
include "../config/database.class.php";
$db = new database();
$db->connect();
$prefix = $db->getPrefix();
require("../lib/function.inc.php");

$strSQL = sprintf("SELECT * FROM ".$prefix."%s WHERE institute_type in ('2','3')",
		  mysql_real_escape_string("institute")
    );
$resultInstitute = $db->select($strSQL,false,true);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SIMANH Monitorsing</title>
    <link href='https://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../library/xplor/css/style.css" >
    <script type="text/javascript" src="../library/jquery/jquery.js"></script>
    <link rel="stylesheet" href="../library/bootstrap/css/bootstrap.css" >
    <script src="../library/bootstrap/js/bootstrap.min.js"></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background: #000; border:solid; border-width: 0px 0px 1px 0px; border-color: #ccc;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
            <strong style="font-size:1.3em;"><font class="ccolor-1">NAME</font><font class="ccolor-2">checking</font></strong>
          </a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Dashboard</a></li>
                <li><a href="index.php">Report</a></li>
                <li><a href="index.php">GIS</a></li>
                <li><a href="index.php">Report</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Graph <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="subject.php" class="a-link">Simple graph</a></li>
                    <li><a href="param.php">Advance graph</a></li>
                  </ul>
                </li>
                <li><a href="visualization.php">Export</a></li>
              </ul>

              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><strong>Welcome</strong> : Administrator <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="info.php">User info.</a></li>
                    <li><a href="update_info.php">Update info.</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="../signout.php">Signout</a></li>
                  </ul>
                </li>
              </ul>
            </div>
      </div>
    </nav>

    <!-- main content -->
    <div class="container-fluid" style="padding-top:50px;">
      <div class="col-lg-12">
        <h2>Table of summary</h2>
        <table class="table table-condensed">
          <thead>
            <th>
              Indicator
            </th>
            <?php
            if($resultInstitute){
              foreach ($resultInstitute as $value) {
                ?><th width="100" align="left" valign="top" style="color:#069;"><?php print $value['institute_name'];?></th><?php
              }
            }else{
							print $strSQL;
						}
            ?>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
    <!-- ENd main content -->

    <div class="container">
      <div class=""  style="padding-top: 50px;">
        <div class="exp-footer text-center">
          Copyright © 2015 - <font class="ccolor-1">Xplor</font> : Factor visulization tools | All Rights Reserved
        </div>
      </div>
    </div>

  </body>
  <script type="text/javascript" src="../library/jquery/jquery.js"></script>
</html>
