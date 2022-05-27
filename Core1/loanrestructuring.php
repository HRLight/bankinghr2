<?php
  $page_title = 'LoanRestructuring';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   $stat="";
?>
<?php
$Table="collection";
$row = loan_restructuring();
?>
<?php include_once('layouts/header.php'); ?>

<!-- Breadcrumb -->
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>

  <a href="#checkout" class="breadcrumbs__item is-active">Loan Restructuring</a>
</nav>
<!-- /Breadcrumb -->

<!-- Data table start -->
<div class="row">
  <!-- Notification div -->
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
  <!-- End Notification div -->

  <div class="col-md-12 mb-3">
    <div class="card">
      <div class="card-header">
        <span class="badge rounded-pill bg-success"><i class="bi bi-table"></i> Loan Restructuring</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped data-table"
            style="width: 100%" >
            <thead>
              <tr>
                <tr>
                  <th> Restructuring ID</th>
                  <th> Tax Identification Name </th>
                  <th> First Name </th>
                  <th> Middle Name </th>
                  <th> Last Name </th>
                  <th> Birthdate </th>
                  <th> Gender</th>
                  <th> Permanent Address </th>
                  <th> Contact Number </th>
                  <th> Email Address </th>
                  <th> Employeer Name </th>
                  <th> Employeer address </th>
                  <th> Company Name </th>
                  <th> Bank Name </th>
                  <th> Account Number </th>
                  <th> VALID ID </th>
                  <th> Statement of Account </th>
                  <th> Letter of authority </th>
                  <th> Date Released </th>
                  
               </tr>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($row as $row): ?>
               
              <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['tin']; ?></td>
              <td><?php echo $row['firstname']; ?></td>
              <td><?php echo $row['middlename']; ?></td>
              <td><?php echo $row['lastname']; ?></td>
              <td><?php echo $row['birthdate']; ?></td>
              <td><?php echo $row['gender']; ?></td>
              <td><?php echo $row['permaadd']; ?></td>
              <td><?php echo $row['cnumber']; ?></td>
              <td><?php echo $row['emailadd']; ?></td>
              <td><?php echo $row['employeername']; ?></td>
              <td><?php echo $row['employeeradd']; ?></td>
              <td><?php echo $row['companyname']; ?></td>
              <td><?php echo $row['bankname']; ?></td>
              <td><?php echo $row['accountnum']; ?></td>
              <td><?php echo $row['validid']; ?></td>
              <td><?php echo $row['soa']; ?></td>
              <td><?php echo $row['loa']; ?></td>
              <td><?php echo $row['date_released']?></td>
               </tr>
             <?php endforeach; ?>
          </tbody>
         
        </table>
      </div>
      </div>
      </div>
      </div>
      </div>
      <!-- End of Data table  -->




<?php include_once('layouts/footer.php'); ?>
