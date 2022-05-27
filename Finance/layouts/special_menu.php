<ul class="navbar-nav">
  <li>
    <div class="text-muted small fw-bold text-uppercase px-3">
      CORE
    </div>
  </li>
  <li>
    <a href="user_dashboard.php" class="nav-link px-3 active">
      <span class="me-2"><i class="bi bi-speedometer2"></i></span>
      <span>Dashboard</span>
    </a>
  </li>

  <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
  <li>
    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
      Interface
    </div>
  </li>
<!-- All Sub modules Side Nav Bar -->

<!-- Disbursments -->
  <li>
    <a
      class="nav-link px-3 sidebar-link"
      data-bs-toggle="collapse"
      href="#Disbursments"
    >
      <span class="me-2"><i class="bi bi-receipt"></i></span>

      <?php $totalnot=0; foreach ($notifDisburs as $notifDisburs): ?>
      <?php
      $totalnot=$notifDisburs['roCount']+$notifDisburs['poCount']+$notifDisburs['uCount'];
       if ($totalnot>=1): ?>
       <span class="badge1" data-badge="<?php echo $totalnot; ?>">Disbursment</span>
     <?php elseif ($notifCollection['notifCollection']==0): ?>
      <span>Disbursment</span>
      <?php endif; ?>
      <?php endforeach; ?>

      <span class="ms-auto">
        <span class="right-icon">
          <i class="bi bi-chevron-down"></i>
        </span>
      </span>
    </a>
    <div class="collapse" id="Disbursments">
      <ul class="navbar-nav ps-3">
        <li>
          <a href="Claims_reimbursment.php" class="nav-link px-3">
            <span class="me-2"><i class="bi bi-credit-card-fill"></i></span>

            <!--Notification for Claims_reimbursment -->
            <?php foreach ($notificationClaims as $notificationClaims): ?>
              <?php if ($notificationClaims['Claims_reimbursmentNotif']>=1): ?>
              <span class="badge1" data-badge="<?php echo $notificationClaims['Claims_reimbursmentNotif']; ?>"> Claims & Reimbursment</span>
            <?php elseif ($notificationClaims['Claims_reimbursmentNotif']==0): ?>
              <span>Claims & Reimbursment</span>
            <?php endif; ?>
            <?php endforeach; ?>
          <!--EndNotification for Claims_reimbursment -->

          </a>
        </li>
        <li>
          <a href="procurement.php" class="nav-link px-3">
            <span class="me-2"><i class="bi bi-bag"></i></span>

            <!--Notification for Procurment -->
            <?php foreach ($notificationProcurement as $notificationProcurement): ?>
              <?php if ($notificationProcurement['procurementNotif']>=1): ?>
              <span class="badge1" data-badge="<?php echo $notificationProcurement['procurementNotif']; ?>"> Procurment</span>
            <?php elseif ($notificationProcurement['procurementNotif']==0): ?>
              <span>Procurment</span>
            <?php endif; ?>
            <?php endforeach; ?>
          <!--EndNotification for Procurment -->

          </a>
        </li>
        <li>
          <a href="Utilitie&Expenses.php" class="nav-link px-3">
            <span class="me-2"><i class="bi bi-cone-striped"></i></span>

            <!--Notification for Expenses -->

              <?php if ($notifDisburs['uCount']>=1): ?>
              <span class="badge1" data-badge="<?php echo $notifDisburs['uCount']; ?>"> Utilities & Expenses</span>
            <?php elseif ($notifDisburs['uCount']==0): ?>
              <span>Utilities & Expenses</span>
            <?php endif; ?>

          <!--EndNotification for Expenses -->

          </a>
        </li>
        <li>
          <a href="admin.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-cash"></i
            ></span>
            <span>Payroll</span>
          </a>
        </li>
      </ul>
    </div>
  </li>
  <!-- End of Disbursments -->

    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
      Addons
    </div>
  </li>
  <li>
    <a href="#" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-graph-up"></i></span>
      <span>Charts</span>
    </a>
  </li>
  <li>
    <a href="#" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-table"></i></span>
      <span>Tables</span>
    </a>
    <a href="users.php" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-people-fill"></i></span>
      <span>Manage Users</span>
    </a>
    <a href="" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-clock-fill"></i></span>
      <span>: <span class="badge rounded bg-secondary"><?php echo date("F j, Y, g:i a");?></span></span>
    </a>
    <a href="#" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-back"></i></span>
      <span><button class="btn-toggle btn-secondary background"><i class="bi bi-moon-fill"></i></button></span>
    </a>
  </li>
  </ul>
