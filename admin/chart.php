
<?php 

/* Timce Function */
                date_default_timezone_set("Asia/Kuala_Lumpur");
                $tableTitle = 'Received Parcel Today';
                $today = date("Y-m-d H:i:s");
                $timestamp = $today;
                $splitTimeStamp = explode(" ",$timestamp);
                //$date= '2016'; //for testing purpose, to view all data to pages.
                $date = $splitTimeStamp[0];
                $time = $splitTimeStamp[1];
                /* Timce Function End Here */

 ?>


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
            text: '<?php echo 'Jumlah Parcel Pada  '.$date.''; ?>'
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
            name: 'Bil: ',
            data: [
			
				<?php  /* 
                
                $query =  mysql_query("SELECT  * FROM `ptj` ") or die (mysql_query());
                while($row = mysql_fetch_array($query))//loop process
                    {
                    echo "['".$row['ptj_name']."',";    
                    //SELECT count(parcel_courier) from parcel where parcel_timestamp like '%2016-12-02%' and parcel_courier like 'POS LAJU'
                    $querys =  mysql_query("SELECT count(parcel_ptj) AS ptj_val from parcel where parcel_timestamp like '%".$date."%' and parcel_ptj like '".$row['ptj_name']."'") or die (mysql_query());
                    while($rows = mysql_fetch_array($querys))//loop process
                        {
                            echo $rows['ptj_val'];
                        }
                    echo '],';
                    }//close loop*/


//SELECT count(ptj.ptj_name) FROM ptj INNER JOIN parcel ON ptj.ptj_name=parcel.parcel_ptj WHERE DAY(parcel.parcel_timestamp) = 5 AND MONTH(parcel.parcel_timestamp) = 12 AND YEAR(parcel.parcel_timestamp) = 2016

                $query =  mysql_query("SELECT ptj.ptj_name FROM ptj INNER JOIN parcel ON ptj.ptj_name=parcel.parcel_ptj WHERE parcel.parcel_timestamp like '%".$date."%' ") or die (mysql_query());

                while($row = mysql_fetch_array($query))//loop process
                    {
                    echo "['".$row['ptj_name']."',";    
                    //SELECT count(parcel_courier) from parcel where parcel_timestamp like '%2016-12-02%' and parcel_courier like 'POS LAJU'
                    $querys =  mysql_query("SELECT count(parcel_ptj) AS ptj_val from parcel where parcel_timestamp like '%".$date."%' and parcel_ptj like '".$row['ptj_name']."'") or die (mysql_query());
                    while($rows = mysql_fetch_array($querys))//loop process
                        {
                            echo $rows['ptj_val'];
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

