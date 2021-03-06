<ul class="navbar-nav">
  <li>
    <div class="text-muted small fw-bold text-uppercase px-3">
      LOGISTIC 2
    </div>
  </li>
  <li>
    <a href="admin.php" class="nav-link px-3 active">
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
<li>
    <a
      class="nav-link px-3 sidebar-link"
      data-bs-toggle="collapse"
      href="#Collections"
    >
    <span class="me-2"><i class="bi bi-book-half"></i></span>
      <span>Fleet Management</span>
      <span class="ms-auto">
        <span class="right-icon">
          <i class="bi bi-chevron-down"></i>
        </span>
      </span>
    </a>
    <div class="collapse" id="Collections">
      <ul class="navbar-nav ps-3">
        <li>
          <a href="fleet.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-person-lines-fill"></i></span>
            <span>Vehicle Information</span>
          </a>
        </li>           
      </ul>
    </div>
  </li>
<!-- start of vehicle reservation -->
  <li>
    <a
      class="nav-link px-3 sidebar-link"
      data-bs-toggle="collapse"
      href="#Disbursments"
    >
      <span class="me-2"><i class="bi bi-receipt"></i></span>
        <span>Vehicle Reservation</span>
      <span class="ms-auto">
        <span class="right-icon">
          <i class="bi bi-chevron-down"></i>
        </span>
      </span>
    </a>
    <div class="collapse" id="Disbursments">
      <ul class="navbar-nav ps-3">
        <li>
          <a href="vehicles.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-credit-card-fill"></i
            ></span>
            <span>Vehicle Reservation</span>
          </a>
        </li>          
      </ul>
    </div>
    <div class="collapse" id="Disbursments">
      <ul class="navbar-nav ps-3">
        <li>
          <a href="vehicle_reserved_table.php" class="nav-link px-3">
            <span class="me-2"
              ><i class="bi bi-credit-card-fill"></i
            ></span>
            <span>Reservation Table</span>
          </a>
        </li>          
      </ul>
    </div>
  </li>

<!-- End of vehicle reservation -->

<!-- start of vendor -->
  <li>
      <a
        class="nav-link px-3 sidebar-link"
        data-bs-toggle="collapse"
        href="#Budgets"
      >
        <span class="me-2"><i class="bi bi-wallet-fill"></i></span>
        <span>Vendor</span>
        <span class="ms-auto">
          <span class="right-icon">
            <i class="bi bi-chevron-down"></i>
          </span>
        </span>
      </a>
      <div class="collapse" id="Budgets">
        <ul class="navbar-nav ps-3">
          <li>
            <a href="vendor copy.php" class="nav-link px-3">
              <span class="me-2"
                ><i class="bi bi-file-earmark-post"></i
              ></span>
              <span>List of Applicants</span>
            </a>
          </li>
           <li>
            <a href="logistic2contract.php" class="nav-link px-3">
              <span class="me-2"
                ><i class="bi bi-cash"></i
              ></span>
              <span>Contract</span>
            </a>
          </li> 
        </ul>
      </div>
    </li>
  <!-- End of vendor -->
  
  
  
  <!-- start of document tracking -->
      <li>
        <a
          class="nav-link px-3 sidebar-link"
          data-bs-toggle="collapse"
          href="#Records"
        >
          <span class="me-2"><i class="bi bi-file-earmark-bar-graph"></i></span>
          <span>Document Tracking</span>
          <span class="ms-auto">
            <span class="right-icon">
              <i class="bi bi-chevron-down"></i>
            </span>
          </span>
        </a>
        <div class="collapse" id="Records">
          <ul class="navbar-nav ps-3">
            <li>
              <a href="document.php" class="nav-link px-3">
                <span class="me-2"
                  ><i class="bi bi-file-earmark-spreadsheet"></i
                ></span>
                <span>Tracking</span>
              </a>
            </li>            
          </ul>
        </div>
      </li>
      <!-- End of document tracking-->

  <!-- start of audit -->
      <li>
          <a
            class="nav-link px-3 sidebar-link"
            data-bs-toggle="collapse"
            href="#GeneralLedger"
          >
            <span class="me-2"><i class="bi bi-journal-bookmark-fill"></i></span>
            <span>Audit Management</span>
            <span class="ms-auto">
              <span class="right-icon">
                <i class="bi bi-chevron-down"></i>
              </span>
            </span>
          </a>
          <div class="collapse" id="GeneralLedger">
            <ul class="navbar-nav ps-3">
              <li>
                <a href="audit_form.php" class="nav-link px-3">
                  <span class="me-2"
                    ><i class="bi bi-clipboard-data-fill"></i
                  ></span>
                  <span>Audit</span>
                </a>
              </li>              
            </ul>
          </div>
        </li>
    <!-- End of audit -->

    

      

 <!-- All Sub modules Side Nav Bar End -->
  <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
  <li>
    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
      Addons
    </div>
  </li>
  <a href="job-portal/index.php" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-mic"></i></span>
      <span>SUPPLIER PORTAL</span>
    </a>
  <a href="create-anouncement.php" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-mic"></i></span>
      <span>Announcement</span>
    </a>
  
    <a href="users.php" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-people-fill"></i></span>
      <span>Manage Users</span>
    </a>
	
	<a href="backupdata.php" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-files"></i></span>
      <span>Backup Database</span>
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
