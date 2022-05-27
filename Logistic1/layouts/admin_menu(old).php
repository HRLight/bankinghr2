  <ul class="navbar-nav">
    <li>
      <div class="text-muted small fw-bold text-uppercase px-3">
        CORE
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

    <!-- Budget Management -->
      <li>
        <a
          class="nav-link px-3 sidebar-link"
          data-bs-toggle="collapse"
          href="#Budgs"
        >
          <span class="me-2"><i class="bi bi-people-fill"></i></span>
          <span>Project Mangement</span>
          <span class="ms-auto">
            <span class="right-icon">
              <i class="bi bi-chevron-down"></i>
            </span>
          </span>
        </a>
        <div class="collapse" id="Budgs">
          <ul class="navbar-nav ps-3">
            <li>
                <a href="pm.php" class="nav-link px-3">
                  <span class="me-2"><i class="bi bi-file-earmark-spreadsheet"></i></span>
                  <span>Project List</span>
                </a>
              </li>
              <li>
                <a href="project_report.php" class="nav-link px-3">
                  <span class="me-2"><i class="bi bi-diagram-2"></i></span>
                  <span>Project Report</span>
                </a>
              </li>
  			         <li>
                <a href="project_request.php" class="nav-link px-3">
                  <span class="me-2"><i class="bi bi-bag"></i></span>
                  <span>Project Proposed</span>
                </a>
              </li>
          </ul>
        </div>
      </li>
      <!-- End of Budget Management -->
      <!-- Disbursments -->
  <li>
      <a
        class="nav-link px-3 sidebar-link"
        data-bs-toggle="collapse"
        href="#gets"
      >
        <span class="me-2"><i class="bi bi-house"></i></span>
        <span>Asset Management</span>
        <span class="ms-auto">
          <span class="right-icon">
            <i class="bi bi-chevron-down"></i>
          </span>
        </span>
      </a>
      <div class="collapse" id="gets">
        <ul class="navbar-nav ps-3">
          <li>
            <a href="wh.php" class="nav-link px-3">
              <span class="me-2"
                ><i class="bi bi-file-earmark-post"></i
              ></span>
              <span>Product list</span>
            </a>
          </li>
          <li>
            <a href="logistic1contract.php" class="nav-link px-3">
              <span class="me-2"
                ><i class="bi bi-cash"></i
              ></span>
              <span>Item Report</span>
            </a>
          </li>
          <li>
            <a href="" class="nav-link px-3">
              <span class="me-2"
                ><i class="bi bi-calendar-check-fill"></i
              ></span>
              <span>#</span>
            </a>
          </li>
        </ul>
      </div>
    </li>
  <!-- End of Disbursments -->
      <!-- Budget Management -->
        <li>
          <a
            class="nav-link px-3 sidebar-link"
            data-bs-toggle="collapse"
            href="#Budgets"
          >
            <span class="me-2"><i class="bi bi-house"></i></span>
            <span>Warehousing</span>
            <span class="ms-auto">
              <span class="right-icon">
                <i class="bi bi-chevron-down"></i>
              </span>
            </span>
          </a>
          
          <div class="collapse" id="Budgets">
            <ul class="navbar-nav ps-3">
                
              <li>
                <a href="warehouse_category.php" class="nav-link px-3">
                  <span class="me-2"
                    ><i class="bi bi-file-earmark-post"></i
                  ></span>
                  <span>Category</span>
                </a>
              </li>
              
              <li>
                <a href="#" class="nav-link px-3">
                  <span class="me-2"
                    ><i class="bi bi-cash"></i
                  ></span>
                  <span>Inventory System</span>
                </a>
              </li>
              
              <li>
                <a href="equipment-pending-request.php" class="nav-link px-3">
                  <span class="me-2"
                    ><i class="bi bi-calendar-check-fill"></i
                  ></span>
                  <span>Equipment Approval</span>
                </a>
              </li>
              
            </ul>
          </div>
        </li>
        
        
      <!-- AP & AR Records  -->
        <li>
          <a
            class="nav-link px-3 sidebar-link"
            data-bs-toggle="collapse"
            href="#Records"
          >
            <span class="me-2"><i class="bi bi-file-earmark-bar-graph"></i></span>
            <span>Procurement</span>
            <span class="ms-auto">
              <span class="right-icon">
                <i class="bi bi-chevron-down"></i>
              </span>
            </span>
          </a>
          <div class="collapse" id="Records">
            <ul class="navbar-nav ps-3">
              <li>
                <a href="request_per_dept.php" class="nav-link px-3">
                  <span class="me-2"><i class="bi bi-file-earmark-spreadsheet"></i></span>
                  <span>Department Request</span>
                </a>
              </li>

              <li>
                <a href="request_vendor.php" class="nav-link px-3">
                  <span class="me-2"><i class="bi bi-diagram-2"></i></span>
                  <span>Vendor Request</span>
                </a>
              </li>
  			         <li>
                <a href="maintenance_approval.php" class="nav-link px-3">
                  <span class="me-2"><i class="bi bi-bag"></i></span>
                  <span>Maintenance Request</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <!-- End of AP & AR Records -->

   <!-- All Sub modules Side Nav Bar End -->
    <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
    <li>
      <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
        Addons
      </div>
    </li>
    <li>
      <a href="Charts.php" class="nav-link px-3">
        <span class="me-2"><i class="bi bi-graph-up"></i></span>
        <span>Charts</span>
      </a>
    </li>
    <li>
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
