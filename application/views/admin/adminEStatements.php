 <!-- divWrapper -->
            <div class="container">
                <div class="text-center">
                    <h2>Statements</h2>
                    <p class="lead"></p>   
                </div>
                <div class="row">
                    <?php if ($states) { ?>       
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th><i class="fas fa-hashtag"></i></th>
                            <th>User</th>
                            <th>Type</th>
                            <th>Period</th>
                            <th>Value</th>
                            <th>Status</th>
                            <th>Payment</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($states as $row) {?>
                        <tr>
                            <td class="align-middle"><?php echo $row->id; ?></td>
                            <td class="align-middle"><?php getUserNamebyID($row->userid); ?></td>
                            <td class="align-middle"><?php echo getTypebyID($row->type); ?></td>
                            <td class="align-middle"><?php echo $row->period; ?></td>
                            <td class="align-middle"><?php echo $row->value, getCurrencybyID($row->currency); ?></td>
                            <td class="align-middle">
                                <?php if ($row->status == 0) { ?>
                                    <i style="color: grey;" class="fas fa-clock"></i> Waiting Details
                                <?php } elseif ($row->status == 1)  { ?>
                                    <i style="color: grey;" class="fas fa-clock"></i> Payment details sent
                                <?php } elseif ($row->status == 2) { ?>
                                    <i style="color: grey;" class="fas fa-check-circle"></i> Paid
                                <?php } ?>
                            </td>
                            <td class="align-middle">
                            <?php if ($row->pid > 0) { ?>
                                <a class="btn btn-info" href="<?php echo base_url('admin/getPD/'.$row->pid); ?>"><i class="fas fa-check-circle"></i> Get Details</a>
                                <?php if ($row->status == 1) { ?>
                                    <a class="btn btn-success" href="<?php echo base_url('admin/ChangeP/confirm/'.$row->id); ?>"><i class="fas fa-check-circle"></i> Paid</a>
                                <?php } elseif ($row->status == 2) { ?>
                                    <a class="btn btn-danger" href="<?php echo base_url('admin/ChangeP/pending/'.$row->id); ?>"><i class="fas fa-pause-circle"></i> </a>
                                <?php }  ?>    
                            <?php } ?>
                            </td>
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