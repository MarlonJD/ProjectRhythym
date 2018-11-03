 <!-- divWrapper -->
            <div class="container">
                <div>
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
                                <th>DEBUG</th>
                                <th>Type</th>
                                <th>Period</th>
                                <th>Value</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($states as $row) {?>
                            <tr>
                                <td class="align-middle"><?php echo $row->id; ?></td>
                                <td class="align-middle"><?php getUserNamebyID($row->userid); ?></td>
                                <td class="align-middle"><?php echo getTypebyID($row->type); ?></td>
                                <td class="align-middle"><?php echo $row->period; ?></td>
                                <td class="align-middle"><?php echo $row->value, getCurrencybyID($row->currency) ?></td>
                                <td class="align-middle">
                                    <?php if ($row->status == 0) { ?>
                                        <i style="color: grey;" class="fas fa-clock"></i> Waiting Details
                                    <?php } elseif ($row->status == 1)  { ?>
                                        <i style="color: grey;" class="fas fa-clock"></i> Pending
                                    <?php } elseif ($row->status == 2) { ?>
                                        <i style="color: grey;" class="fas fa-check-circle"></i> Paid
                                    <?php } ?>
                                </td>
                                <td class="align-middle">
                                <?php if ($row->status == 0) { ?>
                                    <a class="btn btn-success" href="<?php echo base_url('main/ChangeSStatus/'.$row->id); ?>"><i class="fas fa-check-circle"></i> Confirm</a>
                                <?php } elseif ($row->pid > 0) { ?>
                                    <i class="fas fa-check-circle"></i> Payment details sent<?php } ?>
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
                <div>
                    <div class="text-center">
                        <h2>Statistics</h2>
                        <p class="lead"></p>   
                    </div>
                    <div class="row">
                        <?php if ($stats) { ?>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th><i class="fas fa-hashtag"></i></th>
                                <th>Content</th>
                                <th>Platform</th>
                                <th>Streams</th>
                                <th>Downloads</th>
                                <th>Album Downloads</th>
                                <th>Revenue</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($stats as $row) {?>
                            <tr>
                                <td class="align-middle"><?php echo $row->id; ?></td>
                                <td class="align-middle">
                                    <blockquote class="blockquote">
                                        <p class="mb-0"><?php echo getContentbyID($row->cid, 'title') ?></p>
                                        <footer class="blockquote-footer"><?php echo getContentbyID($row->cid, 'artist') ?> as <cite title="Source Title"><?php getUserNamebyID(getContentbyID($row->cid, 'userid')); ?></cite></footer>
                                    </blockquote>
                                </td>
                                <td class="align-middle"><?php echo getPlatfrombyID($row->pid); ?></td>
                                <td class="align-middle"><?php echo $row->stream; ?></td>
                                <td class="align-middle"><?php echo $row->down; ?></td>
                                <td class="align-middle"><?php echo $row->adown; ?></td>
                                <td class="align-middle"><?php echo $row->revenue," ",getCurrencybyID($row->currency); ?></td>
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
            </div>
                
        </div>  
            <!-- /footer-->
       
        <!-- /div-->

    <!-- /div-->