<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
/*
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([
 ['Year', 'Sales', 'Expenses'],
 ['2004',  1000,      400],
 ['2005',  1170,      460],
 ['2006',  660,       1120],
 ['2007',  1030,      540]
 ]);
 
 var options = {
 title: 'Company Performance'
 };
 
 var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
 chart.draw(data, options);
 }
 
 */


function drawChart() {
    var query = new google.visualization.Query('http://docs.google.com/spreadsheet/tq?key=0AhCv9Xu_eRnSdHBELWZoZHRaQTl5VXdRa3JLTzByUlE&gid=1');
    query.setQuery('SELECT A, B, C, D');
    query.send(function (response) {
               if (response.isError()) {
               alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
               return;
               }
               else{
               
               alert("hiya doing");
               }
               
               var data = response.getDataTable();
               
               //var element = document.querySelector("chart_div");
               //element.style.backgroundColor = "green";
               
               var chart = new google.visualization.LineChart(document.querySelector('#chart_div'));
               chart.draw(data, {
                          chartArea: {width: '70%', height: '50%'},
                          fontName: ["Arial"],
                          colors:['#274358','#5e87a5','#a2cdf6'],
                          curveType: ['none'],
                          fontSize: ['11'],
                          hAxis: {title: 'Pneumococcal Vaccination Provided', titleTextStyle: {italic: false, color: 'black', fontSize: 12}},
                          legend: {position: 'right', textStyle: {color: 'black', fontSize: 12}},
                          lineWidth: 2,
                          pointSize: 7,
                          tooltip: {textStyle: {color: 'Black'}, showColorCode: false}
                          });
               });
}
google.load('visualization', '1', {packages:['corechart'], callback: drawChart});


</script>
</head>
<body>
<div id="chart_div"></div>






</body>

</html>
