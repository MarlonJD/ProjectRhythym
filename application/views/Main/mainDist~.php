 <!-- divWrapper -->

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <div class="container">
                <div class="text-center">
                    <h2>Distribution form</h2>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ac ligula euismod lacus pulvinar tincidunt. Suspendisse non accumsan erat. Vestibulum.</p>
                </div>
                <div class="row">
                            <div class="col-md-8">
                                <form class="needs-validation" novalidate>
                                <h4 class="mb-3">About</h4>
                                
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="firstName">Artist</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="firstName" placeholder="Artist name?" value="" required>
                                                <div class="invalid-feedback">
                                                Valid artist name is required.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="state">Album/EP/Single?</label>
                                            <select class="custom-select d-block w-100" id="state" required>
                                                <option value="">Choose...</option>
                                                <option>California</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please provide a valid state.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                    <label for="username">Track Title</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-music"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="username" placeholder="Username" required>
                                        <div class="invalid-feedback" style="width: 100%;">
                                        Title is required.
                                        </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="country">Genre</label>
                                            <select class="custom-select d-block w-100" id="country" required>
                                            <option value="">Choose...</option>
                                            <option>United States</option>
                                            </select>
                                            <div class="invalid-feedback">
                                            Please select a valid country.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="state">Sub Genre</label>
                                            <select class="custom-select d-block w-100" id="state" required>
                                            <option value="">Choose...</option>
                                            <option>California</option>
                                            </select>
                                            <div class="invalid-feedback">
                                            Please provide a valid state.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="example-date-input">Date</label>
                                            <input class="form-control" type="date" id="example-date-input" required>
                                            <div class="invalid-feedback" style="width: 100%;">
                                            Date is required.
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mb-4">

                                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-muted">Release Partners</span>
                                    </h4>
                                    
                                    <div class="row center">
                                        <div class="col-md-3 col-6">
                                            <label for="cbYoutube" class="btn" style="background-color: #ECEDF0; color: #282828; width: 11em;"> <i class="fab fa-youtube"></i> Youtube<input type="checkbox" id="cbYoutube" class="badgebox"><span class="badge customBadge">&check;</span></label>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <label for="cbSpotify" class="btn" style="background-color: #ECEDF0; color: #1db954; width: 11em;"> <i class="fab fa-spotify"></i> Spotify<input type="checkbox" id="cbSpotify" class="badgebox"><span class="badge customBadge">&check;</span></label>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <label for="cbApple" class="btn" style="background-color: #ECEDF0; color: #494848; width: 11em;"> <i class="fab fa-apple"></i> Apple<input type="checkbox" id="cbApple" class="badgebox"><span class="badge customBadge">&check;</span></label>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <label for="cbAmazon" class="btn" style="background-color: #ECEDF0; color: #146eb4; width: 11em;"> <i class="fab fa-amazon"></i> Amazon<input type="checkbox" id="cbAmazon" class="badgebox"><span class="badge customBadge">&check;</span></label>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <label for="cbDeezer" class="btn" style="background-color: #ECEDF0; color: #ff0092; width: 11em;">  Deezer<input type="checkbox" id="cbDeezer" class="badgebox"><span class="badge customBadge">&check;</span></label>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <label for="cbGPlay" class="btn" style="background-color: #ECEDF0; color: #4285f4; width: 11em;"> <i class="fab fa-google-play"></i> Google Play<input type="checkbox" id="cbGPlay" class="badgebox"><span class="badge customBadge">&check;</span></label>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <label for="cbShazam" class="btn" style="background-color: #ECEDF0; color: #4285f4; width: 11em;"> Shazam<input type="checkbox" id="cbShazam" class="badgebox"><span class="badge customBadge">&check;</span></label>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <label for="cbTidal" class="btn" style="background-color: #ECEDF0; color: #000; width: 11em;"> Tidal<input type="checkbox" id="cbTidal" class="badgebox"><span class="badge customBadge">&check;</span></label>
                                        </div>
                                        
                                    </div>
                                    <hr class="mb-4">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue</button>
                                    <hr class="mb-4">
                                </form>
                                
                            </div>

                            <div class="col-md-4">
                                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-muted">Media</span>
                                        <span class="badge badge-secondary badge-pill"><i class="fas fa-cloud-upload-alt"></i></span>
                                    </h4>
                                    
                                    <div class="input-group mb-3 mt-5">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="mediaUploader" name="mediaUploader"/>
                                            <label class="custom-file-label" for="inputGroupFile02">Media</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" id="mediaUpload">Upload</button>
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
                                    <div id="mediaMessage"></div>

                                    <div class="input-group mb-3 mt-5">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="uploader" name="uploader"/>
                                            <label class="custom-file-label" for="inputGroupFile02">Cover Art</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" id="coverUpload">Upload</button>
                                        </div>
                                    </div>

                                    <div class="alert alert-warning alert-dismissible fade show" id="upLoading" role="alert">
                                        <strong>Uploading !</strong> Please wait a little while.
                                        <div class="progress" style="height: 40px;">
                                            <div id="progress-bar" class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div id="message"></div>
                            </div>
                </div>
            <!-- /footer-->
       
        <!-- /div-->

    <!-- /div-->