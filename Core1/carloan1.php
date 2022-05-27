<?php
  $page_title = 'Car Loan';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   $all_request_procurement = find_all('approve_car')
?>
<link rel="icon" href="https://webstockreview.net/images/bank-clipart-transparent-background-9.png" type="image/icon type">

<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Pending Client</a>
</nav>
<hr style="margin-top: 0px; border-top: solid grey 2px;">
<!-- /Breadcrumb -->

<div class="col-md-12 mb-3 card-header" style="border: solid grey 1px">
  <div class="card">
    <div class="card-header">
      <span class="badge square-pill bg-success"><i class="bi bi-list"></i> Car Loan List Table</span>
    </div>
    
    <div class="card-body">
      <div class="table-responsive">
        <table id="example" class="table table-striped data-table" style="width: 100%">
          <thead>
            <tr>
            <th scope="col">ID</th>
                  <th scope="col">Car Type</th>
                  <th scope="col">Unit</th>
                  <th scope="col">Vehicle Price</th>
                  <th scope="col">Loan Amount</th>
                  <th scope="col">Down Payment</th>
                  <th scope="col">Loan term</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Middle Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Civil Status</th>
                  <th scope="col">Home Address</th>
                  <th scope="col">Permanent Address</th>
                  <th scope="col">Date of Birth</th>
                  <th scope="col">Place of Birth</th>
                  <th scope="col">Mobile No.</th>
                  <th scope="col">Email Address</th>
                  <th scope="col">tin_sss_gsis_no</th>
                  <th scope="col">Source of Income</th>
                  <th scope="col">Monthly Income</th>
                  <th scope="col">Employeer Name</th>
                  <th scope="col">Position</th>
                  <th scope="col">Company Name</th>
                  <th scope="col">Bank Name</th>
                  <th scope="col">Account Number</th>
                  <th scope="col">First ID</th>
                  <th scope="col">Second ID</th>
                  <th scope="col">Third ID</th>
                  <th scope="col">Date of Loan</th>
                  <th scope="col">Action</th>
            </tr>
          </thead>
      
          <tbody>
          <?php foreach ($all_request_procurement as $row):?>
            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['car_type']?></td>
                                <td><?php echo $row['unit']?></td>
                                <td><?php echo $row['vehicle_price']?></td>
                                <td><?php echo $row['loan_amount']?></td>
                                <td><?php echo $row['downpayment']?></td>
                                <td><?php echo $row['loan_term']?></td>
                                <td><?php echo $row['fname']?></td>
                                <td><?php echo $row['mname']?></td>
                                <td><?php echo $row['lname']?></td>
                                <td><?php echo $row['sex']?></td>
                                <td><?php echo $row['civil_status']?></td>
                                <td><?php echo $row['home_address']?></td>
                                <td><?php echo $row['perma_address']?></td>
                                <td><?php echo $row['date_of_birth']?></td>
                                <td><?php echo $row['place_of_birth']?></td>
                                <td><?php echo $row['mobile_no']?></td>
                                <td><?php echo $row['email_address']?></td>
                                <td><?php echo $row['tin_sss_gsis_no']?></td>
                                <td><?php echo $row['source_of_income']?></td>
                                <td><?php echo $row['monthly_income']?></td>
                                <td><?php echo $row['employeer_name']?></td>
                                <td><?php echo $row['position']?></td>
                                <td><?php echo $row['companyname']?></td>
                                <td><?php echo $row['bankname']?></td>
                                <td><?php echo $row['accountnum']?></td>
                                <td><?php echo $row['fid']?></td>
                                <td><?php echo $row['sid']?></td>
                                <td><?php echo $row['tid']?></td>
                                <td><?php echo $row['date_of_loan']?></td>
                
                  
                
            <td class="text-center">
                <div class="btn-group">
                                  <a href="car_accept.php?id=<?php echo (int)$row['id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Done">Approve
                                    <span class="glyphicon glyphicon-edit"></span>
                                  </a>
                                  </div>
                  
            </td>
            </tr>       
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>