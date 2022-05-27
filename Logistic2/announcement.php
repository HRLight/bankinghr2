<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
     $all_com_announcement= find_all('com_announcement')
?>


<?php include_once('layouts/header.php'); ?>

<style>
   #boxx{
       margin-top: 15%;
       margin-left: 15%;
   } 
    .line{
        border: solid black 1px;
    }
    .breadcrumbs{
        margin-bottom: 0;
    }
</style>

<!-- Breadcrumb ------------------------------------------------------------------------------------------------>
<nav class="breadcrumbs">
  <?php if ($user['user_level'] === '1'): ?>
    <a href="admin.php" class="breadcrumbs__item">Home</a>
  <?php elseif ($user['user_level'] === '2'): ?>
   <a href="user_dashboard.php" class="breadcrumbs__item">Home</a>
  <?php endif; ?>
  <a href="#breadcrumbs" class="breadcrumbs__item is-active">Announcement</a>
</nav>
<hr class="line">
<!-- /Breadcrumb ------------------------------------------------------------------------------------------------>






<div class="col-xl-8 col-lg-8" id="boxx">
    <div class="card shadow mb-4" style="border: solid black 1px;">
        <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Company Announcement</h6>

            </div>
                 <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="example"
                        class="table table-striped data-table"
                        style="width: 100%" >
                        <thead>
            
                        </thead>
                        <tbody>
            
                      <?php foreach ($all_com_announcement as $anounce):?>
                      <tr>
            					<td><?php echo remove_junk(ucfirst($anounce['title'])); ?></td>
            					<td><?php echo remove_junk(ucfirst($anounce['description'])); ?></td>
            
                                <td class="text-center">
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