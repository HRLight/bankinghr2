<?php
  $page_title = 'Data Archiving';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(2);
//pull out all user form database
 
?>
<?php include_once('layouts/header.php'); ?>



<div class="container">
 <div class="row">
  <div class="col-md-12 b-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-primary"><i class="bi bi-trash"></i>Data Archiving</span>
        <div class="text-end pull-right"><a href="view_archived.php" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i>View Archived</a></div>
      </div>
      <div class="pic card-body">
       
      


    </div>
   </div>
  </div>
</div>



<table
         id="example"
         class="table table-striped data-table"
         style="width: 100%" >
         <thead>
          <tr>
            <th>Applicant ID</th>
            <th>Name </th>
            <th>Email</th>
            <th>Age</th>
            <th>Last Login</th>
            <th width="10%">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $sql = "SELECT * FROM applicants";
  $result = $db->query($sql);
  $a_user = $result->fetch_assoc();
  do{ ?>
          
              <tr>
               <td class="text-center"><?php echo $a_user['applicant_id'];?></td>
               <td><?php echo remove_junk(ucwords($a_user['first_name'])).' '.remove_junk(ucwords($a_user['last_name']))?></td>
               <td><?php echo remove_junk(ucwords($a_user['email']))?></td>
               <td><?php echo $a_user['age']?></td>
               <td><?php echo read_date($a_user['last_login'])?></td>
                 <div class="btn-group">
                  <td>
                    <a href="archive_applicant.php?id=<?php echo $a_user['applicant_id']?>" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Archive">
                      <i class="bi bi-trash"></i>Archive
                   </a>
                   
                    </div>
              </tr>
          
        <?php }while ($a_user = $result->fetch_assoc()); {
          // code...
        }?>
       </tbody>
       
     </table>


</div>
</div>
<?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
    ?>
    <script>
    swal.fire({
    title: "<?php echo $_SESSION['status']; ?>",
    icon: "<?php echo $_SESSION['status_code']; ?>",
    button: "OK",
    });
    </script>
    <?php
    unset($_SESSION['status']);
    }
    ?>
</main>
    <!-- All Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script src="./libs/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./libs/js/jquery-3.5.1.js"></script>
    <script src="./libs/js/jquery.dataTables.min.js"></script>
    <script src="./libs/js/dataTables.bootstrap5.min.js"></script>
    <script src="libs/js/script.js"></script>
    <script type="text/javascript">
      
      $(document).ready(function()
        {

            $(".tab").change(function(){
              var table_name = $(this).val();
              $.ajax({
                url:"table_archive.php",
                method: "POST",
                data:{table_name :table_name },
                dataType:"text",
                success:function(data){
                  $(".pic").html(data);
                }
              });
            });
    });


    </script>

    
  

  </body>
</html>

<?php if(isset($db)) { $db->db_disconnect(); } ?>