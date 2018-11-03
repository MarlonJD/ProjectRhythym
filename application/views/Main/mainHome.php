 <!-- divWrapper -->
            <div>
                <div class="text-center">
                    <h2>Your Distribution Requests</h2>
                    <p class="lead">You can check the status of your requests</p>   
                </div>
                <?php if ($dists) { ?>
                <div class="row">
                       
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><i class="fas fa-hashtag"></i></th>
                        <th>Content</th>
                        <th>Genre</th>
                        <th class="text-center">Partners</th>
                        <th>Date</th>
                        <th>Status</th>
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
                        <td class="align-middle text-center">
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
                        <td class="align-middle">
                            <?php echo date("l, F j", strtotime($row->releaseDate)); ?>
                        </td>
                        <td class="align-middle">
                            <?php if ($row->status == 0) { ?>
                                <i style="color: grey;" class="fas fa-clock"></i> Pending
                            <?php } elseif ($row->status == 1) { ?>
                                <i style="color: grey;" class="fas fa-check-circle"></i> Approved
                            <?php } elseif ($row->status == 2) { ?>
                                <i style="color: grey;" class="fas fa-times-circle   "></i> Canceled
                            <?php } ?>
                        </td>
                       
                    </tr>
                    <?php } ?>   
                    </tbody>
                </table>
                <?php } else {?>  
                <div class="alert alert-primary" role="alert">
                    You have not any distribution request. You can make a request <a href="<?php echo base_url('main/Distribution'); ?>" class="alert-link">here</a>.
                </div>
                <?php }?>
            </div>  
            <!-- /footer-->
       
        <!-- /div-->

    <!-- /div-->