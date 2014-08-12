<?PHP
if (isset($_GET['usertype']))
  $userType = $_GET['usertype'];
else
  $userType = 9;

$attendanceType = "Class Attendance";
$desc = "";

switch($userType){
  case 1:
  $attendanceType = "Class Attendance";
  $desc = "S20, Tuesday, 2:40PM";
  break;
  case 2: 
  $attendanceType = "Bible Study Attendance";
  $desc = "Revelations, Monday, 6-9PM";
  break;
  case 3:
  $attendanceType = "Outreach Attendance";
  $desc = "MaSci COMPRO2, Friday, 3-6PM";
  break;
}
?>

<!DOCTYPE html>
<html>
<head>
    
    <?PHP $this->load->view("header"); ?>
</head>
<body>
    <?PHP $this->load->view("navigation"); ?>
    <div class="container">
        <div class="page-header">
            <h1><?PHP echo $attendanceType; ?> <small><?PHP echo $desc; ?></small></h1>
        </div>
        <!--div class="row"-->
        
        <div id="modal-share" class="modal-body">
            <div id="names" class="col-md-4 col-lg-4">
                <table class="table">
                    <tr>
                        <th class="empty-header"> &nbsp</th>
                        <th class="empty-header"> &nbsp </th>
                    </tr>
                    <tr>
                        <th class="empty-header"> &nbsp</th>
                        <th class="empty-header"> &nbsp </th>
                    </tr>
                    
                    <tr>
                        <td> Christopher John Bangayan 
                            
                        </td>
                        <td> <span class="badge badge-warning">&nbsp&nbsp4</span> </td>
                    </tr>
                    <tr>
                        <td> Duke Danielle Delos Santos </td>
                        <td> <span class="badge">12</span> </td>
                    </tr>

                    <tr>
                        <td> Alron Jan Lam  </td>
                        <td> <span class="badge badge-info">14</span> </td>
                    </tr>


                    <tr>
                        <td> Matthew Macatangay </td>
                        <td> <span class="badge badge">11</span> </td>
                    </tr>


                    <tr>
                        <td> Ivan Paner</td>
                        <td> <span class="badge badge">&nbsp&nbsp8</span> </td>
                    </tr>

                    <tr>
                        <td>
                            <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-plus"></span> Add Member
                            </button>
                        </td>
                        <td> &nbsp </td>
                    </tr>
                </table>
            </div>
            
            <div id="records" class="col-md-8 col-lg-8">
                <table class="table">
                    <tr>
                        <th colspan="5" class="month-header">January</th>
                        <th colspan="4" class="month-header cell-month-start">February</th>
                        <th colspan="4" class="month-header cell-month-start">March</th>
                        <th colspan="1" class="month-header cell-month-start">April</th>
                    </tr>
                    <tr>
                        <th class="day-header">1</th>
                        <th class="day-header">8</th>
                        <th class="day-header">15</th>
                        <th class="day-header">22</th>
                        <th class="day-header">29</th>
                        <th class="day-header cell-month-start">5</th>
                        <th class="day-header">12</th>
                        <th class="day-header">19</th>
                        <th class="day-header">26</th>
                        <th class="day-header cell-month-start">5</th>
                        <th class="day-header">12</th>
                        <th class="day-header">19</th>
                        <th class="day-header">26</th>
                        <th class="day-header cell-month-start">2</th>
                    </tr>
                    
                    <tr>
                        <td>  </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td>  </td>
                        <td >  </td>
                        <td class="cell-month-start">  </td>
                        <td>  </td>
                        <td>  </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td class="cell-month-start"> <span class="glyphicon glyphicon-minus"> </td>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td class="cell-month-start">  </td>
                    </tr>
                    
                    
                    <tr>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td>  </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td > <span class="glyphicon glyphicon-ok"> </td>
                        <td class="cell-month-start"> <span class="glyphicon glyphicon-minus"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td class="cell-month-start"> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> </td>
                        <td class="cell-month-start"> <span class="glyphicon glyphicon-ok">  </td>
                    </tr>
                    
                    <tr>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td class="cell-month-start">  </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td class="cell-month-start"> <span class="glyphicon glyphicon-minus"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td class="cell-month-start">  </td>
                    </tr>
                    
                    <tr>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-minus"> </td>
                        <td class="cell-month-start"> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-minus"></td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td class="cell-month-start">  </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> </td>
                        <td class="cell-month-start"> <span class="glyphicon glyphicon-ok">  </td>
                    </tr>
                    
                    <tr>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td>  </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td class="cell-month-start">  </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td>  </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td class="cell-month-start"> <span class="glyphicon glyphicon-ok"> </td>
                        <td > <span class="glyphicon glyphicon-minus"> </td>
                        <td>  </td>
                        <td> <span class="glyphicon glyphicon-ok"> </td>
                        <td class="cell-month-start">  </td>
                    </tr>
                    
                </table>
            </div>
        </div>

<!--
          <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              <img data-src="holder.js/150x200" src="img/logo.png" alt="150x200" width="150" height="200">
              <div class="caption">
                <h3>Recollection</h3>
                <p>Block off this date/s on your calendars: the FORMDEV Recollection-Workshop will be on January 3-5, 2014. It is a 3 day event that will be held at Charles Huang Conference Center, Batulao, Batangas.</p>
                <p><a href="#" class="btn btn-primary" role="button">Join</a> <a href="#" class="btn btn-default" role="button">Read more</a></p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img data-src="holder.js/150x200" src="img/logo.png" alt="150x200" width="150" height="200">
          <div class="caption">
            <h3>Praise and Worship</h3>
            <p>Currently led by Kuya Mon, FORMDEV has a praise and worship team that joins in the Lasallian Enrichment Alternative Program (LEAP) every February and some other occasions throughout the academic term.</p>
            <p><a href="#" class="btn btn-primary" role="button">Join</a> <a href="#" class="btn btn-default" role="button">Read more</a></p>
        </div>
    </div>
    
</div>
<div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img data-src="holder.js/150x200" src="img/logo.png" alt="150x200" width="150" height="200">
          <div class="caption">
            <h3>Amazing Race</h3>
            <p>At the end of the academic term, the last activity for the class is the Amazing Race. Find out what to prepare and how it works!</p>
            <p><a href="#" class="btn btn-default" role="button">Read more</a></p>
        </div>
    </div>

-->

</div><!-- .container -->

</body>
</html>