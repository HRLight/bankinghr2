<form  method="POST" action="process.php"  enctype="multipart/form-data">
        <input type="file" name="file_upload"  class="btn btn-secondary btn-sm "/>
        <input type="hidden" name="employee_id" value="<?php echo $user['employee_id'];?>">
                       <button type="submit" name="changedp" class="btn btn-success btn-sm">Change</button>
                                            </form>