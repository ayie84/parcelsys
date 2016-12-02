<?php
// Start Session
// Comment this line to off the authentication session	
	session_start();
		
		// if session is not set this will redirect to login page
		 if( !isset($_SESSION['SESS_MEMBER_ID']) ) {
		  header("Location: index.php");
		  exit;
		 }
 // End Session
		$conn = mysql_connect("localhost", "root", "");
		mysql_select_db("pms");
?>

<html>
<head>
<title>Highcharts Tutorial</title>
   <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
   <script src="https://code.highcharts.com/highcharts.js"></script>  
    <script src="public/js/jquery.min.js"></script>
   
   <!--<script type="text/javascript" src="js/modules/exporting.js"></script>
		<script type="text/javascript" src="js/highcharts.js"></script>-->
</head>
<body>
<div id="container" style="width: 850px; height: 400px; margin: 0 auto"></div>
<script language="JavaScript">
$(function () {
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Parcel Management System '
        },
        subtitle: {
            //text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
            text: 'Jumlah Parcel Pada 2016-12-02'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'JUMLAH'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            //pointFormat: 'Population in 2008: <b>{point.y:.1f} millions</b>'
        },
        series: [{
            name: 'Courier',
            data: [
			
				<?php	
				$query =  mysql_query("SELECT  * FROM `courier` ") or die (mysql_query());
				while($row = mysql_fetch_array($query))//loop process
					{
					echo "['".$row['courier_name']."',";	
					//SELECT count(parcel_courier) from parcel where parcel_timestamp like '%2016-12-02%' and parcel_courier like 'POS LAJU'
					$querys =  mysql_query("SELECT count(parcel_courier) AS courier_val from parcel where parcel_timestamp like '%2016-12-02%' and parcel_courier like '".$row['courier_name']."'") or die (mysql_query());
					while($rows = mysql_fetch_array($querys))//loop process
						{
							echo $rows['courier_val'];
						}
					echo '],';
					}//close loop
					?>
				
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                //format: '{point.y:.1f}', // one decimal
                y: 20, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
});

</script>
</body>
</html>
