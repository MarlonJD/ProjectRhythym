 <!-- divWrapper -->
            <div class="container">
                <div class="text-center">
                    <h2>Users</h2>
                    <p class="lead">All users info</p>   
                </div>
                <div class="row">
                    <?php if ($users) { ?>       
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th><i class="fas fa-hashtag"></i></th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($users as $row) {?>
                        <tr>
                            <td class="align-middle"><?php echo $row->id; ?></td>
                            <td class="align-middle"><?php echo $row->username; ?></td>
                            <td class="align-middle"><?php echo $row->email; ?></td>
                            <td class="align-middle"><?php echo date("l, F jS, Y", strtotime($row->created_at)); ?></td>
                        </tr>
                        <?php } ?>   
                        </tbody>
                    </table>
                    <?php } else {?>  
                        <div class="alert alert-primary" role="alert">
                            Nothing here yet.
                        </div>    
                    <?php }?>
                </div>
            </div>  
            <!-- /footer-->
       
        <!-- /div-->

    <!-- /div-->