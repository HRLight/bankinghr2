<?php
  $page_title = 'Settings Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>

<?php include_once('layouts/header.php'); ?>
<div class="container">
  <div class="card">
    <div class="card-header bg-dark bg-gradient text-white">
      Database Import
    </div>
    <div class="card-body">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="table-responsive">
            <span id="message"></span>
            <form method="post" id="import_excel_form" enctype="multipart/form-data">
              <table class="table">
                <tr>
                  <td width="25%" align="right">Select Backup File :</td>
                  <td width="50%"><input class="form-control" type="file" name="import_excel" /></td>
                  <td width="25%"></i><button type="submit" name="import" id="import" class="btn btn-primary"><i class="bi bi-box-arrow-in-down"></i> Import</button></td>
                </tr>
              </table>
            </form>
            <br />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
  $('#import_excel_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"import.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import').attr('disabled', 'disabled');
        $('#import').val('Importing...');
      },
      success:function(data)
      {
        $('#message').html(data);
        $('#import_excel_form')[0].reset();
        $('#import').attr('disabled', false);
        $('#import').val('Import');
      }
    })
  });
});
</script>
<?php include_once('layouts/footer.php'); ?>
