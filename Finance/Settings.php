<?php
  $page_title = 'Settings Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>

<?php include_once('layouts/header.php'); ?>
<link href="libs/css/calendar2/pignose.calendar.min.css" rel="stylesheet">
<div class="row">
    <div class="col-lg-6">
        <div class="card card-outline-primary">
            <div class="card-header">
                <h4 class="m-b-0 text-dark">Settings</h4>
            </div>
            <div class="card-body">
                <form action="#">
                    <div class="form-body">
                        <h3 class="card-title m-t-15">Security Settings</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label class="control-label">Log Reports :</label>
                                    <a href="Finance_LogsGenerate.php" class="btn btn-sm btn-primary shadow-sm"><i
                                    class="bi bi-cloud-arrow-down-fill fa-sm text-white-50"></i> Generate Logs Report</a>
                                   <br><br>
                                    <label class="control-label">Data Back-up :</label>
                                    <a href="Backup_reports.php" class="btn btn-sm btn-info shadow-sm"><i
                                    class="bi bi-folder-symlink fa-sm"></i> Collections</a>
                                    <a href="Backup_reports.php" class="btn btn-sm btn-info shadow-sm"><i
                                    class="bi bi-folder-symlink fa-sm"></i> Ledger</a>
                                    <br><br>
                                      <label class="control-label">Upload Backup Data:</label>
                                     <a href="php_spreadsheet_import.php" class="btn btn-secondary">Upload</a>
                                     <br>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="year-calendar"></div>
                        </div>
                    </div>
                </div>
        </div>
        <script>

        </script>
<?php include_once('layouts/footer.php'); ?>
