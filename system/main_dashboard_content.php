<link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
<div class="col-md-12">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Male and Female Within Age Bracket</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-md-8">
          <p class="text-center">
            <strong>Male and Female</strong>
          </p>

          <div class="chart">
            <!-- Sales Chart Canvas -->
            <canvas id="salesChart" style="height: 300px;"></canvas>
          </div>
          <!-- /.chart-responsive -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
          <p class="text-center">
            <strong>Number of Residence Per Purok</strong>
          </p>

          <?php
          // Sample DB connection
          include 'conn.php';

          $sql = "SELECT COUNT(pi_resident_id) AS resident_count, hh_purok FROM tbl_household_head GROUP BY hh_purok";
          $result = mysqli_query($conn, $sql);

          // Define a standard max count (or get from DB)
          $total_recidence = "SELECT COUNT(pi_resident_id) as total_residents from tbl_household_head";
          $result1 = mysqli_query($conn, $total_recidence);

          $totalRow = mysqli_fetch_assoc($result1);
          $max_residents = $totalRow['total_residents'];

          $colors = ['progress-bar-aqua', 'progress-bar-green', 'progress-bar-yellow', 'progress-bar-red', 'progress-bar-light-blue', 'progress-bar-navy', 'progress-bar-teal'];
          $colorIndex = 0;

          while ($row = mysqli_fetch_assoc($result)):
            $count = $row['resident_count'];
            $purok = $row['hh_purok'];
            $percent = ($count / $max_residents) * 100;

            // Cycle through colors
            $colorClass = $colors[$colorIndex % count($colors)];
            $colorIndex++;

          ?>
            <div class="progress-group">
              <span class="progress-text">Purok <?= htmlspecialchars($purok) ?></span>
              <span class="progress-number"><b><?= $count ?></b>/<?= $max_residents ?></span>
              <div class="progress sm">
                <div class="progress-bar <?= $colorClass ?>" style="width: <?= $percent ?>%"></div>
              </div>
            </div>
          <?php endwhile; ?>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- ./box-body -->
    <div class="box-footer">
      <div class="row">
        <div class="col-sm-3 col-xs-6">
          <div class="description-block border-right">
            <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
            <h5 class="description-header">33</h5>
            <span class="description-text">Infant 0-3 Years Old</span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-3 col-xs-6">
          <div class="description-block border-right">
            <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 50%</span>
            <h5 class="description-header">56</h5>
            <span class="description-text">Learning In Elementary</span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-3 col-xs-6">
          <div class="description-block border-right">
            <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
            <h5 class="description-header">86</h5>
            <span class="description-text">Learning In Secondary</span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-3 col-xs-6">
          <div class="description-block">
            <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
            <h5 class="description-header">40</h5>
            <span class="description-text">Learning in Tertiary</span>
          </div>
          <!-- /.description-block -->
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-footer -->
  </div>
  <!-- /.box -->
</div>
<div class="row">
  <!-- <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Lorem, ipsum.</h3>
      </div>
     
      <div class="box-body">
        <table class="table table-bordered">
          <tr>
            <td></td>
            <td></td>
            <td colspan="3">
              <center><b>2015</b></center>
            </td>
          </tr>
          <tr>
            <th style="width: 10px">#</th>
            <th>Program Indicator</th>
            <th>Progress</th>
            <th>Progress</th>
            <th>Label</th>
          </tr>

          <tr>
            <td>1.</td>
            <td>Lorem, ipsum.</td>
            <td style="width:140px"><span class="badge bg-red">55%</span></td>
            <td style="width:140px"><span class="badge bg-red">55%</span></td>
            <td style="width:140px"><span class="badge bg-green">55%</span></td>
          </tr>
          <tr>
        </table>
      </div>

      <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
          <li><a href="">YEAR</a></li>
          <li><a href="#">&laquo;</a></li>
          <li><a href="#">2017</a></li>
          <li><a href="#">2018</a></li>
          <li><a href="#">2019</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
      </div>
    </div>
  </div> -->

  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">WORK STATUS</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="box box-primary">
          <div class="box-body">
            <canvas id="residentsBarChart" style="height: 200px;"></canvas>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="col-md-6">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Source of Living</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="box box-primary">
          <div class="box-body">
            <canvas id="genderPieChart"></canvas>
          </div>
          <div class="box-footer">
            <ul class="nav nav-pills nav-stacked" id="pie-chart-legend">
          </ul>
        </div>
      </div>
      <!-- /.box-body -->

    </div>
  </div>


  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">HOUSE HOLD NUMBER</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered">
          <tr>
            <th>Purok</th>
            <th>Number of Families</th>
            <th style="width: 40px">Number of Household</th>
          </tr>
          <tr>
            <td>Purok 1</td>
            <td><span class="badge bg-red">100</span></td>
            <td><span class="badge bg-red">55</span></td>
          </tr>
          <tr>
            <td>Purok 2</td>
            <td><span class="badge bg-yellow">70</span></td>
            <td><span class="badge bg-yellow">70</span></td>
          </tr>
          <tr>
            <td>Purok 3</td>
            <td><span class="badge bg-light-blue">30</span></td>
            <td><span class="badge bg-light-blue">30</span></td>
          </tr>
          <tr>
            <td>Purok 4</td>
            <td><span class="badge bg-green">90</span></td>
            <td><span class="badge bg-green">90</span></td>
          </tr>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>

  <div class="col-md-6">
    <div class="box-body chart-responsive">
      <canvas id="genderPieChart" style="height: 300px;"></canvas>
    </div>
    <div class="box-footer">
      <ul class="nav nav-pills nav-stacked" id="pie-chart-legend">
      </ul>
    </div>
  </div>
</div>

</div>

<script src="../plugins/chartjs/Chart.min.js"></script>
<script>
  $(function() {

    'use strict';

    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //-----------------------
    //- WORK STATUS BAR CHART -
    //-----------------------

    <?php
    $sql_employment = "
        SELECT
            wd_status,
            COUNT(pi_resident_id) AS work_details
        FROM
            tbl_work_details
        GROUP BY
            wd_status
        ORDER BY
            CASE wd_status
                WHEN 'employed' THEN 'Employed'
                WHEN 'unemployed' THEN 'Unemployed'
                WHEN 'self-employed' THEN 'Self Employed'
                ELSE 'Others' 
            END;
        ";

    $result_employment = mysqli_query($conn, $sql_employment);

    $employment_labels = [];
    $employment_data = [];

    while ($row_employment = mysqli_fetch_assoc($result_employment)) {
      // Ensure proper capitalization for the labels
      if (strtolower($row_employment['wd_status']) === 'employed') {
        $employment_labels[] = 'Employed';
      } else if (strtolower($row_employment['wd_status']) === 'unemployed') {
        $employment_labels[] = 'Unemployed';
      } else if (strtolower($row_employment['wd_status']) === 'self-employed') {
        $employment_labels[] = 'Self Employed';
      } else {
        $employment_labels[] = 'Others';
      }
      $employment_data[] = $row_employment['work_details'];
    }
    ?>

    var purokLabels = <?php echo json_encode($employment_labels); ?>;
    var purokData = <?php echo json_encode($employment_data); ?>;

    var barChartCanvas = $("#residentsBarChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);

    var barChartData = {
      labels: purokLabels,
      datasets: [{
        label: "Residents",
        fillColor: "rgba(60,141,188,0.9)",
        strokeColor: "rgba(60,141,188,0.8)",
        highlightFill: "rgba(60,141,188,0.7)",
        highlightStroke: "rgba(60,141,188,1)",
        data: purokData
      }]
    };

    var barChartOptions = {
      scaleBeginAtZero: true,
      scaleShowGridLines: true,
      scaleGridLineColor: "rgba(0,0,0,.05)",
      scaleGridLineWidth: 1,
      barShowStroke: true,
      barStrokeWidth: 2,
      barValueSpacing: 5,
      barDatasetSpacing: 1,
      responsive: true,
      maintainAspectRatio: true
    };

    barChart.Bar(barChartData, barChartOptions);


    //PIE CHART

<?php
$sql = "SELECT tbl_property_commodities.pc_type, COUNT(tbl_property_commodities.pc_code) AS living 
        FROM tbl_property_commodities
        LEFT JOIN tbl_animal_products ON tbl_property_commodities.pc_code = tbl_animal_products.pc_code
        LEFT JOIN tbl_products ON tbl_property_commodities.pc_code = tbl_products.pc_code
        LEFT JOIN tbl_production_facilities ON tbl_property_commodities.pc_code = tbl_production_facilities.pc_code
        GROUP BY tbl_property_commodities.pc_type";

$result = $conn->query($sql);

$pieData = [];
$colors = ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']; // sample colors
$i = 0;

while ($row = $result->fetch_assoc()) {
    $pieData[] = [
        "value" => (int)$row['living'],
        "color" => $colors[$i % count($colors)],
        "highlight" => $colors[$i % count($colors)],
        "label" => $row['pc_type']
    ];
    $i++;
}
?>
 var pieChartCanvas = $("#genderPieChart").get(0).getContext("2d");

    var pieData = <?php echo json_encode($pieData, JSON_NUMERIC_CHECK); ?>;

    var pieOptions = {
        segmentShowStroke: true,
        segmentStrokeColor: "#fff",
        segmentStrokeWidth: 2,
        percentageInnerCutout: 0,
        animationSteps: 100,
        animationEasing: "easeOutBounce",
        animateRotate: true,
        animateScale: false,
        responsive: true,
        maintainAspectRatio: false,
        tooltipTemplate: "<%= label %>: <%= value %>",
        legendTemplate:
            '<ul class="<%=name.toLowerCase()%>-legend">' +
            '<% for (var i=0; i<segments.length; i++){%>' +
            '<li><span style="background-color:<%=segments[i].fillColor%>"></span>' +
            '<%if(segments[i].label){%><%=segments[i].label%><%}%> (<%=segments[i].value%>)</li><%}%></ul>'
    };

    var pieChart = new Chart(pieChartCanvas).Pie(pieData, pieOptions);

    $("#pie-chart-legend").html(pieChart.generateLegend());
    //end of pie chart    

    //BAR CHART AT THE TOP
    <?php

    include 'conn.php';

    $sql_age = "SELECT
	CASE
        WHEN TIMESTAMPDIFF(YEAR, pi_birth_date, CURDATE()) BETWEEN 0 AND 10 THEN '0-10'
        WHEN TIMESTAMPDIFF(YEAR, pi_birth_date, CURDATE()) BETWEEN 11 AND 20 THEN '11-20'
        WHEN TIMESTAMPDIFF(YEAR, pi_birth_date, CURDATE()) BETWEEN 21 AND 30 THEN '21-30'
        WHEN TIMESTAMPDIFF(YEAR, pi_birth_date, CURDATE()) BETWEEN 31 AND 40 THEN '31-40'
        WHEN TIMESTAMPDIFF(YEAR, pi_birth_date, CURDATE()) BETWEEN 41 AND 50 THEN '41-50'
        WHEN TIMESTAMPDIFF(YEAR, pi_birth_date, CURDATE()) BETWEEN 51 AND 60 THEN '51-60'
        WHEN TIMESTAMPDIFF(YEAR, pi_birth_date, CURDATE()) BETWEEN 61 AND 70 THEN '61-70'
        ELSE '71 Above'
     END AS age_group,
     pi_sex,
     count(*) AS count
 from tbl_personal_info
 group by
 	age_group,
    pi_sex
 order BY
 	age_group,
    pi_sex";

    $result = $conn->query($sql_age);
    $data = array();
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }

    $outputData = [
      'labels' => ["0-10", "11-20", "21-30", "31-40", "41-50", "51-60", "61-70", "71 Above"],
      'male' => array_fill(0, 8, 0),
      'female' => array_fill(0, 8, 0),
    ];

    foreach ($data as $row) {
      $ageGroup = $row['age_group'];
      $gender = $row['pi_sex'];
      $count = intval($row['count']);
      $index = array_search($ageGroup, $outputData['labels']);

      if ($index !== false) {
        $genderLower = strtolower($gender);
        if ($genderLower === 'male') {
          $outputData['male'][$index] = $count;
        } elseif ($genderLower === 'female') {
          $outputData['female'][$index] = $count;
        }
      }
    }


    ?>

    // Get context with jQuery - using jQuery's .get() method.
    var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var salesChart = new Chart(salesChartCanvas);

    const fetchedData = <?php echo json_encode($outputData); ?>;

    var salesChartData = {
      labels: fetchedData.labels,
      datasets: [{
          label: "Male",
          fillColor: "rgb(210, 214, 222)",
          strokeColor: "rgb(210, 214, 222)",
          pointColor: "rgb(210, 214, 222)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgb(220,220,220)",
          data: fetchedData.male
        },
        {
          label: "Female",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: fetchedData.female
        }
      ]
    };

    var salesChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    salesChart.Bar(salesChartData, salesChartOptions);
    // END OF BARC CHART

    // PIE CHART

  });
</script>