 <!-- divWrapper -->
            <div>
                <?php if (@$confirmed) { ?>
                     <div class="alert alert-success" role="alert">
                        The distribution request has been successfully approved. 
                    </div>
                <?php } ?>
                <?php if (@$deleted) { ?>
                     <div class="alert alert-danger" role="alert">
                        The distribution request has been successfully cancelled. 
                    </div>
                <?php } ?>
                <?php if (@$pend) { ?>
                     <div class="alert alert-info" role="alert">
                        The distribution request has been successfully paused.
                    </div>
                <?php } ?>
                <div class="text-center">
                    <h2>Distributions</h2>
                    <p class="lead">The .table-hover class enables a hover state (grey background on mouse over) on table rows:</p>   
                </div>
                
                <?php if ($dists) { ?>      
                <div class="row"> 
                <table class="table table-hover col-sm-12">
                    <thead>
                    <tr>
                        <th><i class="fas fa-hashtag"></i></th>
                        <th>User</th>
                        <th>Genre</th>
                        <th class="d-none d-md-block">Path</th>
                        <th class="text-center d-none d-sm-table-cell">Partners</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th class="d-none d-sm-table-cell">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($dists as $row) {?>
                    <tr>
                        <td class="align-middle"><?php echo $row->id; ?></td>
                        <td class="align-middle">
                            <blockquote class="blockquote">
                                <p class="mb-0"><?php echo $row->title; ?></p>
                                <footer class="blockquote-footer"><?php echo $row->artist; ?> as <cite title="Source Title"><?php getUserNamebyID($row->userid); ?></cite></footer>
                            </blockquote>
                        </td>
                        <td class="align-middle"><?php getGenrebyID($row->genre); ?> <?php getGenrebyID($row->sgenre); ?></td>
                        <td class="align-middle d-none d-sm-table-cell">
                        <i style="color: grey;" class="fas fa-music"></i> <?php echo $row->media; ?></br>
                        <i style="color: grey;"class="far fa-image"></i> <?php echo $row->cover; ?>
                        </td>
                        <td class="align-middle text-center d-none d-sm-table-cell">
                            <?php if ($row->cbYoutube) { ?>
                                <i style="color:rgba(255, 0, 0, 0.6);" class="fab fa-youtube fa-2x"></i>
                            <?php } ?>
                            <?php if ($row->cbSpotify) { ?>
                                <i style="color:rgba(29,185,84, 0.6);" class="fab fa-spotify fa-2x"></i>
                            <?php } ?>
                            <?php if ($row->cbApple) { ?>
                                <i style="color:rgba(105,99,98, 0.6));" class="fab fa-apple fa-2x"></i>
                            <?php } ?>
                            <?php if ($row->cbAmazon) { ?>
                                <i style="color:rgba(255,153,0, 0.6);" class="fab fa-amazon fa-2x"></i>
                            <?php } ?>
                            <?php if ($row->cbGPlay) { ?>
                                <i style="color:rgba(221,75,57, 0.6);" class="fab fa-google-play fa-2x"></i>
                            <?php } ?>
                            <?php if ($row->cbDeezer) { ?>
                                <i style="color:rgba(0, 0, 0, 0.6);"><img style="width: 2em; padding-bottom: 1em;" src="<?php echo base_url('assets/svg/deezer.svg'); ?>"></i>
                            <?php } ?>
                            <?php if ($row->cbShazam) { ?>
                                <i style="color:rgba(0, 0, 0, 0.6);"><img style="width: 2em; padding-bottom: 1em;" src="<?php echo base_url('assets/svg/shazam.svg'); ?>"></i>
                            <?php } ?>
                            <?php if ($row->cbTidal) { ?>
                                <i style="color:rgba(0, 0, 0, 0.6);"><img style="width: 2em; padding-bottom: 1em;" src="<?php echo base_url('assets/svg/tidal.svg'); ?>"></i>
                            <?php } ?>
                        </td>
                        <td class="align-middle"><?php // echo date("jS \of F Y, l", strtotime($row->releaseDate)); ?>
                        <?php echo date("l, F j", strtotime($row->releaseDate)); ?></td>
                        <td class="align-middle">
                            <?php if ($row->status == 0) { ?>
                                <i style="color: grey;" class="fas fa-clock"></i> <span class="d-none d-sm-inline">Pending</span>
                            <?php } elseif ($row->status == 1) { ?>
                                <i style="color: grey;" class="fas fa-check-circle"></i> <span class="d-none d-sm-inline">Approved</span>
                            <?php } elseif ($row->status == 2) { ?>
                                <i style="color: grey;" class="fas fa-times-circle   "></i> <span class="d-none d-sm-inline">Canceled</span>
                            <?php } ?>
                        </td>
                        <td class="align-middle d-none d-sm-table-cell">
                            <a class="btn btn-success" href="<?php echo base_url('admin/DistChange/confirm/'.$row->id); ?>"><i class="fas fa-check-circle"></i></a>
                            <a class="btn btn-info" href="<?php echo base_url('admin/DistChange/pend/'.$row->id); ?>"><i class="fas fa-pause"></i></a>
                            <a class="btn btn-danger" href="<?php echo base_url('admin/DistChange/delete/'.$row->id); ?>"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php } ?>   
                    </tbody>
                </table>
                </div>
                <?php } else { ?>  
                        <div class="alert alert-primary" role="alert">
                            Nothing here yet.
                        </div>  
                <?php }?>
                
            </div>  
            <!-- /footer-->
       
        <!-- /div-->

    <!-- /div-->