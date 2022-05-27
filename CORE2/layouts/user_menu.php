<ul class="navbar-nav">
  <li>
    <div class="text-muted small fw-bold text-uppercase px-3">
     <h4> CORE II</h4>
    </div>
  </li>
  <li>
    <a href="admin.php" class="nav-link px-3 active">
      <span class="me-2"><i class="bi bi-speedometer2"></i></span>
      <span>Dashboard</span>
    </a>
  </li>

  </li>
  
  <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
<!-- All Sub modules Side Nav Bar -->

<!-- core II -->
 <!-- Cash Transaction  -->
 <li>
<!--           <a
            class="nav-link px-3 sidebar-link"
            data-bs-toggle="collapse"
            href="cashtransaction.php"
          >
            <span class="me-2"><i class="bi bi-cash-stack"></i></span>
            <span>Cash Transaction</span>
            <span class="ms-auto">
              <span class="right-icon">
                <i class="bi bi-chevron-down"></i>
              </span>
            </span>
          </a> -->

         <a class="nav-link px-3 sidebar-link"
            href="cashtransaction.php">
            <span class="me-2"><i class="bi bi-cash-stack"></i></span>
            <span>Cash Transaction</span>
            <span class="ms-auto">
              <span class="right-icon">
               
              </span>
            </span>
          </a>
<!--           <div class="collapse" id="CashTransaction">
            <ul class="navbar-nav ps-3">
              <li>
                <a href="admindeposit.php" class="nav-link px-3">
                  <span class="me-2"
                    ><i class="bi bi-piggy-bank"></i
                  ></span>
                  <span>Deposit</span>
                </a>
              </li>
              <li>
                <a href="adminwithdraw.php" class="nav-link px-3">
                  <span class="me-2"
                    ><i class="bi bi-wallet2"></i
                  ></span>
                  <span>Withdraw</span>
                </a>
              </li>
              <li>
                <a href="admintransfer.php" class="nav-link px-3">
                  <span class="me-2"
                    ><i class="bi bi-arrow-left-right"></i
                  ></span>
                  <span>Transfer Money</span>
                </a>
              </li>
              <li>
                <a href="adminbillspayment.php" class="nav-link px-3">
                  <span class="me-2"
                    ><i class="bi bi-table"></i
                  ></span>
                  <span>Bills Payment</span>
                </a>
              </li>
            </ul>
          </div> -->
        </li>
        
      <!-- Cash Transaction -->

      <!-- Savings Tracking -->
     
          <a
            class="nav-link px-3 sidebar-link"
            
            href="savingstracking.php"
          >
            <span class="me-2"><i class="bi bi-wallet-fill"></i></span>
            <span>Savings Tracking</span>
            <span class="ms-auto">
              <span class="right-icon">
               
              </span>
            </span>
          </a>
          

      

 <!-- Savings Tracking -->
       <!-- Consolidation -->
     
       <a
            class="nav-link px-3 sidebar-link"
            
            href="consolidation.php"
          >
            <span class="me-2"><i class="bi bi-intersect"></i></span>
            <span>Consolidation</span>
            <span class="ms-auto">
              <span class="right-icon">
               
              </span>
            </span>
          </a>
          
 <!-- Consolidation -->
  <!-- Communication Management -->

          <a class="nav-link px-3 sidebar-link"
            href="comm_management.php">
            <span class="me-2"><i class="bi bi-folder-fill"></i></span>
            <span>Comm Management</span>
          </a>
 


      <!-- core II -->
   <li>
          <div class="collapse" id="SPM">
              <li>
                <a href="spm.php" class="nav-link px-3">
                  <span class="me-2"
                    ><i class="bi bi-person-rolodex"></i
                  ></span>
                  <span>Social Performance Monitoring</span>
                </a>
              </li>
              <li>
           <!--     <a href="clientsinformation.php" class="nav-link px-3">
                  <span class="me-2"
                    ><i class="bi bi-person-lines-fill"></i
                  ></span>
                  <span>Client Information</span>
                </a>
            -->
              </li>
            </ul>
          </div>
        </li>



 <!-- All Sub modules Side Nav Bar End -->
  <li class="my-4"><hr class="dropdown-divider bg-light" /></li>

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