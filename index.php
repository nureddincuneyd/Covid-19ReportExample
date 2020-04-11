<?php
include "header.php";
include "dataEx.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">World Data Report</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">World Data</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <h5 class="mt-4 mb-2">World Data<code></code></h5>

    <div class="row">
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-info">
          <span class="info-box-icon"><i class="fas fa-disease"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Infected People</span>
            <span class="info-box-number"><?php echo $res["worldCases"]; ?></span>

            <div class="progress" style="visibility: hidden;">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description" style="visibility: hidden;">
              70% Increase in 30 Days
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-success">
          <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Recovered</span>
            <span class="info-box-number"><?php echo $res["worldRecovered"]; ?></span>

            <div class="progress" style="visibility: hidden;">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description" style="visibility: hidden;">
              70% Increase in 30 Days
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-warning">
          <span class="info-box-icon"><i class="fas fa-vials"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Tests</span>
            <span class="info-box-number"><?php echo $res["worldTests"]; ?></span>

            <div class="progress" style="visibility: hidden;">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description" style="visibility: hidden;">
              70% Increase in 30 Days
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-danger">
          <span class="info-box-icon"><i class="fas fa-skull-crossbones"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Deaths</span>
            <span class="info-box-number"><?php echo $res["worldDeaths"]; ?></span>

            <div class="progress" style="visibility: hidden;">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description" style="visibility: hidden;">
              70% Increase in 30 Days
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->


    <!-- =========================================================== -->
    <h4 class="mb-2 mt-4">World Data Graph</h4>
    <div class="row">
      <div class="col-md-12">

        <!-- Line chart -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="far fa-chart-bar"></i>
              Line Chart
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">

            <canvas id="myChart" style="max-height: 600px;"></canvas>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
            <script src="https://chart-js.com/javascript/chart-barfunnel.js"></script>

            <script>
              var ctx = document.getElementById('myChart');
              let casesData =  <?php echo json_encode($totalCase); ?>;
              let recDate =  <?php echo json_encode($recDate); ?>;
              let chart = new Chart(ctx, {
                type: 'line',
                data: {
                  datasets: [{
                    label: 'Total Cases',
                    data: casesData
                  }],
                  labels: recDate
                },
                options: {
                  scales: {
                    yAxes: [{
                      ticks: {
                        suggestedMin: 0,
                        suggestedMax: 3000000,
                        stepSize: 300000
                      }
                    }]
                  }
                }
              });
            </script>

          </div>
          <!-- /.card-body-->
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col -->
    </div>

  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include "footer.php"; ?>
