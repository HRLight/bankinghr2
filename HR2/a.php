<div class="col-sm-6 mx-auto">
    <div class="card-header bg-dark">
    <span style="color:White"><i class="bi bi-calendar"></i> Add new schedule</span>
  </div>
    <div class="card">
      <div class="card-body">
        <form method="post" action="add_learning_sched.php">
          <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" placeholder="  Schedule title">
          </div>
          <div class="form-group">
              <label for="date">Date</label>
              <input type="date" class="form-control" name="date" placeholder="  Date">
          </div>
          <div class="form-group">
              <label for="time">Time</label>
              <input type="time" class="form-control" name ="time"  placeholder="  Time">
          </div>
          <div class="form-group">
            <label for="level">Location/Room</label>
              <input type="text" name="loc" class="form-control" placeholder="location/room">
          </div> 
 <div class="form-group clearfix">
  <label for="emp">Participants</label>
            <select name="emp[]" multiple class="form-control" >
              <?php 
              $sql = "SELECT * FROM employees ";
              $res = $db->query($sql);
              $emp = $res->fetch_assoc();
              do{ ?>
  <option value="<?php echo $emp['employee_id'] ?>"><?php echo $emp['employee_id'].' - '.$emp['first_name'].' '.$emp['last_name']?></option>

             <?php }
              while($emp = $res->fetch_assoc());

              ?>
            </select>
          </div>


          <br>

          <div class="form-group clearfix">
            <button type="submit" name="add_sched" class="btn btn-primary">Add Schedule</button>
          </div>
         
      </form>
      </div>
    </div>
  </div>