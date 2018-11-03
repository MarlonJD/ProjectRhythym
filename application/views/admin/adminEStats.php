 <!-- divWrapper -->
            <div class="container">
                <div class="text-center">
                    <h2>Statistics</h2>
                    <p class="lead">Contents statistics</p>   
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
            <!-- /footer-->
       
        <!-- /div-->

    <!-- /div-->