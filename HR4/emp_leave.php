<?php
  $page_title = 'Employee Leave';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
    $all_facility = find_all_leave();
?>



<?php include_once('layouts/header.php'); ?>

<div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Facility Available Table</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                 <th class="text-center" style="width: 50px;">Employee_id</th>
					<th class="text-center">Name</th>
                    <th class="text-center">leave type</th>
                    <th class="text-center">Days</th>
                    <th class="text-center">Status</th>
					
                    
              </tr>
            </thead>
            <tbody>

            <?php foreach ($all_facility as $available):?>
                <tr>
                    
					<td class="text-center"><?php echo $available['employee_id'] ?>'</td>
                  <td class="text-center"><?php echo remove_junk(ucfirst($available['first_name'])).remove_junk(ucfirst($available['last_name']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($available['leave_type']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($available['days']));?></td>
					<td class="text-center"><?php echo remove_junk(ucfirst($available['status']));?></td>
					
                    

                </tr>       
            <?php endforeach; ?>

            </tbody>
            
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>





<?php include_once('layouts/footer.php'); ?>