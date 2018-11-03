 <!-- divWrapper -->
        <div class="container">
            <div class="text-center">
                <h2>Content ID</h2>
                <p class="lead"></p>
                <?php if (isset($flash_message)) { ?>
                    <div class="alert alert-primary" role="alert">
                        <?php echo $flash_message; ?>
                    </div>
                <?php } ?>
            </div>
            <div class="center">
                <?php if ($allcids) { ?>  
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><i class="fas fa-hashtag"></i></th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($allcids as $row){ ?>
                    <tr>
                        <td class="align-middle"><?php echo $row->id; ?></td>
                        <td class="align-middle">
                            <blockquote class="blockquote">
                                <p class="mb-0"><?php echo getContentbyID($row->cid, 'title') ?></p>
                                <footer class="blockquote-footer"><?php echo getContentbyID($row->cid, 'artist') ?> as <cite title="Source Title"><?php getUserNamebyID(getContentbyID($row->cid, 'userid')); ?></cite></footer>
                            </blockquote>
                        </td>
                        <td class="align-middle"><?php echo $row->link; ?></td>
                        <td class="align-middle">
                            <?php if ($row->status == 0) { ?>
                                <i style="color: grey;" class="fas fa-clock"></i> Pending
                            <?php } elseif ($row->status == 1)  { ?>
                                <i style="color: grey;" class="fas fa-check-circle"></i> Removal Request Received
                            <?php } ?>
                        </td>
                        <td class="align-middle">
                            <a class="btn btn-danger" href="<?php echo base_url('admin/RemoveCID/'.$row->id); ?>"><i class="fas fa-trash"></i> </a>
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
        <!-- /footer-->
        </div>
    <!-- /div-->
<!-- /div-->
