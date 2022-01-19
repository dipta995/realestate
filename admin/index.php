<?php include 'header.php'; ?>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Message Box</h1>
                    <div class="card">
                        <?php
                          $con = new mysqli("localhost", "root", "", "realstate");
                          if (isset($_POST['sendmessage'])) {
                              $message = mysqli_real_escape_string($con,$_POST['message']); 
                              $messageid = mysqli_real_escape_string($con,$_POST['messageid']); 
                             
                              $insertquery = "INSERT INTO messages (message,user_id)VALUES('$message','$messageid')";  
                              $con->query($insertquery);         
                          }
                          if ($_SESSION['status']!='admin'){
                        ?>
                    <form action="" method="post">
                        <textarea required name="message" id="" cols="30" rows="3"></textarea>
                        <input type="hidden" name="messageid" value="<?php echo $userid  = $_SESSION['user_id'];?>" >
                        <button name="sendmessage" class="btn btn-danger">Replay</button>
                    </form>
                    <?php } ?>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Customers NAME(Role)</th>
                                            <th>My query</th>
                                            <th>Replay from admin</th>
                                          
                                        </tr>
                                    </thead>
                                    <tfoot>

                                        
                                    </tfoot>
                                    <tbody>
                                        <?php
                                      
                                          
                                        if (isset($_POST['messagereplay'])) {
                                            $replay = mysqli_real_escape_string($con,$_POST['replay']); 
                                            $messageid = mysqli_real_escape_string($con,$_POST['messageid']); 
                                           
                                            $insertquery = "UPDATE messages 
                                            SET
                                            replay       ='$replay',
                                            replay_at    =now(),
                                            flag      ='1'
                  
                                            WHERE id=$messageid";  
                                            $con->query($insertquery);         
                                        }
                                      if ($_SESSION['status']=='admin') {
                                          
                                          $query = "SELECT * FROM messages LEFT JOIN users ON users.user_id=messages.user_id order by messages.flag asc";
                                      }else {
                                        $query = "SELECT * FROM messages LEFT JOIN users ON users.user_id=messages.user_id where messages.user_id=$userid order by messages.flag asc";
                                      }


                                                 $result = $con->query($query);
                                                 if ($result->num_rows > 0) {
                                                     foreach ($result as $key => $value) {
                                                         
                                                   
                                                 
                                        ?>
                                        <tr>
                                            <td><?php
                                            echo $value['name'].'('.$value['status'].')';
                                            ?></td>
                                             <td><?php echo $value['message']; ?> <br> <span style="color:red; font-size:12px;"><?php echo $value['message_at']; ?></span> </td>
                                            <td><?php
                                            
                                            if ($_SESSION['status']=='admin' && $value['flag']==0) { ?>
                                                <form action="" method="post">
                                                   <textarea required name="replay" id="" cols="30" rows="3"></textarea>
                                                   <input type="hidden" name="messageid" value="<?php echo $value['id'];?>" >
                                                   <button name="messagereplay" class="btn btn-danger">Replay</button>
                                                </form>
                                            <?php }elseif($value['replay']==null){
                                            echo "We Will Replay You Soon ......";
                                           } else{
                                            
                                            echo $value['replay'];
                                           echo "<br> <span style='color:red; font-size:12px;'>". $value['replay_at']."</span>";
                                            }
                                            
                                            ?> </td>
                                            <td></td>
                                   
                                         
                                           

                                        </tr>
                                                        <?php }} ?>
                                    </tbody>
                                </table>

                </div>
                <!-- /.container-fluid -->
<?php include 'footer.php'; ?>