<ul class="navbar-nav">
  <li>
    <div class="text-muted small fw-bold text-uppercase px-3">
      LOGISTIC 1
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

<!-- Collections -->
  <li>
        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#PM">
          <span class="me-2"><i class="bi bi-basket"></i></span>
          <span>Project Mangement</span>
          <span class="ms-auto">
            <span class="right-icon">
              <i class="bi bi-chevron-down"></i>
            </span>
          </span>
        </a>
		
        <div class="collapse" id="PM">
          <ul class="navbar-nav ps-3">
		  <li>
              <a href="project_request.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-bag"></i></span>
                <span>Project Proposal</span>
              </a>
            </li>
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
			
          </ul>
        </div>
      </li>
<!-- End of Collections -->

<!-- Disbursments --> 
  <li>
      <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#AM">
        <span class="me-2"><i class="bi bi-house"></i></span>
        <span>Asset Management</span>
        <span class="ms-auto">
          <span class="right-icon">
            <i class="bi bi-chevron-down"></i>
          </span>
        </span>
      </a>
	  
	  
      <div class="collapse" id="AM">
        <ul class="navbar-nav ps-3">
          
              
				<li>
						<a href="asset_c.php" class="nav-link px-3">
						  <span class="me-2"
							><i class="bi bi-file-earmark-post"></i
						  ></span>
						  <span>Fixed Asset</span>
						</a>
					  </li>
			  
            </a>
          </li>
		   
          <li>
            <a href="audit_form.php" class="nav-link px-3">
              <span class="me-2"
                ><i class="bi bi-cash"></i
              ></span>
              <span>Asset Report</span>
            </a>
          </li>
         
        </ul>
      </div>
    </li>
  <!-- End of Disbursments -->

  <!-- Budget Management -->
    <li>
      <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#WS">
        <span class="me-2"><i class="bi bi-house"></i></span>
        <span>Warehousing</span>
        <span class="ms-auto">
          <span class="right-icon">
            <i class="bi bi-chevron-down"></i>
          </span>
        </span>
      </a>
      <div class="collapse" id="WS">
        <ul class="navbar-nav ps-3">
          <li>
            <a href="warehouse_category.php" class="nav-link px-3">
              <span class="me-2"
                ><i class="bi bi-file-earmark-post"></i
              ></span>
              <span>INBOUND</span>
            </a>
          </li>
          <li>
            <a href="wh_outbound.php" class="nav-link px-3">
              <span class="me-2"
                ><i class="bi bi-cash"></i
              ></span>
              <span>OUT BOUND</span>
            </a>
          </li>
          <li>
            <a href="wh_item.php" class="nav-link px-3">
              <span class="me-2"
                ><i class="bi bi-calendar-check-fill"></i
              ></span>
              <span>STOCK ITEM</span>
            </a>
          </li>
        </ul>
      </div>
    </li>
    <!-- End of Budget Management -->

    <!-- AP & AR Records  -->
      <li>
        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#PR">
          <span class="me-2"><i class="bi bi-basket"></i></span>
          <span>Procurement</span>
          <span class="ms-auto">
            <span class="right-icon">
              <i class="bi bi-chevron-down"></i>
            </span>
          </span>
        </a>
        <div class="collapse" id="PR">
          <ul class="navbar-nav ps-3">
            <li>
              <a href="request_per_dept.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-file-earmark-spreadsheet"></i></span>
                <span>Department Requests</span>
              </a>
            </li>
			
            <li>
              <a href="request_vendor.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-diagram-2"></i></span>
                <span>Vendor Request</span>
              </a>
            </li>
			<li>
              <a href="mainte_request.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-bag"></i></span>
                <span>Maintenance Request</span>
              </a>
            </li>

			<li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-ticket-perforated"></i></span>
                <span>Voucher</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <!-- End of AP & AR Records -->

      <!-- General Ledger  
        <li>
          <a
            class="nav-link px-3 sidebar-link"
            data-bs-toggle="collapse"
            href="#GeneralLedger"
          >
            <span class="me-2"><i class="bi bi-journal-bookmark-fill"></i></span>
            <span>General Ledger</span>
            <span class="ms-auto">
              <span class="right-icon">
                <i class="bi bi-chevron-down"></i>
              </span>
            </span>
          </a>
          <div class="collapse" id="GeneralLedger">
            <ul class="navbar-nav ps-3">
              <li>
                <a href="admin.php" class="nav-link px-3">
                  <span class="me-2"
                    ><i class="bi bi-clipboard-data-fill"></i
                  ></span>
                  <span>Chart of Accounts</span>
                </a>
              </li>
              <li>
                <a href="admin.php" class="nav-link px-3">
                  <span class="me-2"
                    ><i class="bi bi-speedometer2"></i
                  ></span>
                  <span>Accounts Recievable Records</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
		End of General Ledger -->

 <!-- All Sub modules Side Nav Bar End -->
  <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
  <li>
    <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
      Addons
    </div>
  </li>
  <!--
  <li>
    <a href="#" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-graph-up"></i></span>
      <span>Charts</span>
    </a>
  </li>
  -->
  <li>
  <!--
    <a href="#" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-table"></i></span>
      <span>Tables</span>
    </a>
	-->
	<!--
    <a href="users.php" class="nav-link px-3">
      <span class="me-2"><i class="bi bi-people-fill"></i></span>
      <span>Manage Users</span>
    </a>
	-->
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
