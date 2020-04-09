<?php include "header.php"; ?>
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
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

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
              <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

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
              <span class="info-box-icon"><i class="fas fa-comments"></i></span>

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

    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php include "footer.php"; ?>
