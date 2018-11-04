 <!-- divWrapper -->
            <div class="container">
                <div class="text-center">
                    <?php if (@$sent === 'success') { ?>
                        <div class="alert alert-success" role="alert">
                            Your distribution request has been successfully sent. 
                        </div>
                    <?php } elseif (@$sent === 'mediaempty') { ?>
                        <div class="alert alert-danger" role="alert">
                            You cannot send empty media or cover art. Please upload your media or cover art and try again.
                        </div>
                    <?php } elseif (@$sent === 'something') { ?>
                        <div class="alert alert-danger" role="alert">
                            Something wrong please try again.
                        </div>
                    <?php } ?>
                    <h2>Distribution form</h2>
                    <p class="lead"></p>
                </div>
                <div class="row">
                            <div class="col-md-12">
                                <form class="needs-validation" method="POST" autocomplete="off">
                                <h4 class="mb-3">About</h4>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                        <label for="inputUserid">User</label>
                                                <select class="d-block w-100 selectpicker" data-live-search="true" id="inputUserid" name="inputUserid" data-style="btn-outline-success" required>
                                                    <option disabled value="" selected>Choose...</option>
                                                    <?php foreach($users as $key) { ?><option value="<?php echo $key->id; ?>"><?php echo $key->username.' - '.$key->email; ?></option>
                                                    <?php } ?></select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputArtist">Artist</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="inputArtist" name="inputArtist" placeholder="Artist name?" required>
                                                <div class="invalid-feedback">
                                                    Valid artist name is required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputType">Album/EP/Single? <i class="fas fa-question-circle tooltipc" data-toggle="tooltip" data-placement="top" data-original-title="<p>Please select the release type here -</p><p>Single:A single release is a 1 track product<br />that is usually released either by itself or<br />with several remixes.</p><p>EP:An EP is a small collection of several<br />tracks by either the same or multiple<br />artists. An EP can sometimes be referred<br />to as a mini album or a sampler.</p><p>Album:An album is a collection of tracks<br />with a combined running time of 45 minutes<br />or longer. This can be either an artist album<br />or an unmixed compilation album.</p>"></i></label>
                                            <select id="inputType" name="inputType" class="custom-select d-block w-100" required>
                                                <option disabled value="" selected>Choose...</option>
                                                <option value="0">Album</option>
                                                <option value="1">EP</option>
                                                <option value="2">Single</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please provide a valid state.
                                            </div>
                                        </div><p>
                                    </div>

                                    <div class="mb-3">
                                    <label for="inputTitle">Track Title</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-music"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="inputTitle" name="inputTitle" placeholder="Track Title" required>
                                        <div class="invalid-feedback" style="width: 100%;">
                                        Title is required.
                                        </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="inputGenre">Genre</label>
                                            <select class="custom-select d-block w-100" id="inputGenre" name="inputGenre" required>
                                                <option disabled value="" selected>Choose...</option>
                                            <?php foreach($genres as $key) { ?>
                                                <option value="<?php echo $key->id; ?>"><?php echo $key->text; ?></option>
                                            <?php } ?>
                                            </select>
                                            <div class="invalid-feedback">
                                            Please select a valid country.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="inputsGenre">Sub Genre <i class="fas fa-question-circle tooltipc" data-toggle="tooltip" data-placement="top" title="You don't have to choose"></i></label>
                                            <select class="custom-select d-block w-100" id="inputsGenre" name="inputsGenre">
                                                
                                            </select>
                                            <div class="invalid-feedback">
                                            Please provide a valid state.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputReleaseDate">Date <i class="fas fa-question-circle tooltipc" data-toggle="tooltip" data-placement="top" title="Minimum 7 days later"></i></label>
                                            <input class="form-control" type="date" id="inputReleaseDate" name="inputReleaseDate" required>
                                            <div class="invalid-feedback" style="width: 100%;">
                                            Date is required.
                                            </div>
                                        </div>
                                    </div>
    
                                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-muted">Media</span>
                                    </h4>
                                    
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="mediaUploader" name="mediaUploader" accept="audio/wav"/>
                                                <label class="custom-file-label" for="inputGroupFile02">Media</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-primary" id="mediaUpload">Upload</button>
                                            </div>
                                        </div>

                                        <div class="alert alert-warning alert-dismissible fade show" id="mediaLoading" role="alert">
                                            <strong>Uploading !</strong>
                                            <div class="progress" style="height: 40px;">
                                                <div id="mediaProgress-bar" class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-success" role="alert" id="mediaSuccess">
                                            Success!
                                            <div id="mediaMessage"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="coverUploader" name="coverUploader" accept="image/x-png,image/gif,image/jpeg"/>
                                                <label class="custom-file-label" for="inputGroupFile02">Cover Art</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-primary" id="coverUpload">Upload</button>
                                            </div>
                                        </div>

                                        <div class="alert alert-warning alert-dismissible fade show" id="coverLoading" role="alert">
                                            <strong>Uploading !</strong>
                                            <div class="progress" style="height: 40px;">
                                                <div id="coverProgress-bar" class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-success" role="alert" id="coverSuccess">
                                            Success!
                                            <div id="coverMessage"></div>
                                        </div>
                                    </div>
                                    </div>

                                    <input type="hidden" class="form-control" id="upMedia" name="upMedia" value=''>
                                    <input type="hidden" class="form-control" id="upCover" name="upCover" value=''>
                                    

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cbAgg" name="cbAgg" value="1" required>
                                        <label class="custom-control-label" for="cbAgg">Check here to indicate that you have read and agree to the terms of the <a target="_blank" href="<?php echo base_url('main/Agreement'); ?>">Distribution Agreement</a> and <a target="_blank" href="<?php echo base_url('main/Privacy'); ?>">Privacy Policy</a></label>
                                    </div>

                                    <hr class="mb-4">
                                    
                                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-muted">Release Partners</span>
                                    </h4>
                                    
                                    <div class="row center">
                                        <div class="col-md-3 col-6">
                                            <label for="cbYoutube" class="btn" style="background-color:rgba(255, 0, 0, 0.3); color: #000; width: 11em; opacity: 0.8;"> <i class="fab fa-youtube"></i> Youtube<input type="checkbox" id="cbYoutube" name="cbYoutube" class="badgebox" value="1"><span class="badge customBadge">&check;</span></label>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <label for="cbSpotify" class="btn" style="background-color:rgba(29,185,84, 0.3); color: #191414; width: 11em; opacity: 0.8;"> <i class="fab fa-spotify"></i> Spotify<input type="checkbox" id="cbSpotify" name="cbSpotify" class="badgebox" value="1"><span class="badge customBadge">&check;</span></label>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <label for="cbApple" class="btn" style="background-color:rgba(105,99,98, 0.3); color: #494848; width: 11em; opacity: 0.8;"> <i class="fab fa-apple"></i> Apple<input type="checkbox" id="cbApple" name="cbApple" class="badgebox" value="1"><span class="badge customBadge">&check;</span></label>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <label for="cbAmazon" class="btn" style="background-color:rgba(255,153,0, 0.3); color: #146eb4; width: 11em; opacity: 0.8;"> <i class="fab fa-amazon"></i> Amazon<input type="checkbox" id="cbAmazon" name="cbAmazon" class="badgebox" value="1"><span class="badge customBadge">&check;</span></label>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <label for="cbDeezer" class="btn" style="background-color:rgba(255,0,0, 0.3); color: #FF0000; width: 11em; opacity: 0.8;">  Deezer<input type="checkbox" id="cbDeezer" name="cbDeezer" class="badgebox" value="1"><span class="badge customBadge">&check;</span></label>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <label for="cbGPlay" class="btn" style="background-color:rgba(221,75,57, 0.3); color: #4285f4; width: 11em; opacity: 0.8;"> <i class="fab fa-google-play"></i> Google Play<input type="checkbox" id="cbGPlay" name="cbGPlay" class="badgebox" value="1"><span class="badge customBadge">&check;</span></label>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <label for="cbShazam" class="btn" style="background-color:rgba(0,136,255, 0.3); color: #4285f4; width: 11em; opacity: 0.8;"> Shazam<input type="checkbox" id="cbShazam" name="cbShazam" class="badgebox" value="1"><span class="badge customBadge">&check;</span></label>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <label for="cbTidal" class="btn" style="background-color:rgba(0,0,0, 0.3); color: #000; width: 11em; opacity: 0.8;"> Tidal<input type="checkbox" id="cbTidal" name="cbTidal" class="badgebox" value="1"><span class="badge customBadge">&check;</span></label>
                                        </div>
                                        
                                    </div>

                                    <hr class="mb-4">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="buttonSendDist" value="Sent">Continue</button>
                                    <hr class="mb-4">
                                </form>
                            </div>       
                </div>
            <!-- /footer-->
       
        <!-- /div-->

    <!-- /div-->