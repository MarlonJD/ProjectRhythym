 <!-- divWrapper -->
   
            <div class="container">
                <?php if (@$sendStats) { ?>
                     <div class="alert alert-success" role="alert">
                        Your statistic report has been successfully sent.
                    </div>
                <?php } ?>
                <div class="text-center">
                    <h2>Statistics</h2>
                    <p class="lead">Platform streams or download counts</p>
                </div>
                <div class="row">
                            <div class="col-md-12">
                                <form class="needs-validation" method="POST" autocomplete="off">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="inputCid">Content</label>
                                            <select class="d-block w-100 selectpicker" data-live-search="true" id="inputCid" name="inputCid" data-style="btn-outline-success" required>
                                                <option value="" disabled selected>Choose...</option>
                                                <?php foreach($contents as $key) { ?><option value="<?php echo $key->id; ?>"><?php echo $key->artist.' - '.$key->title; ?></option>
                                                <?php } ?></select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputPid">Platform</label>
                                            <select id="inputPid" name="inputPid" class="custom-select d-block w-100" required>
                                                <option value="" disabled selected>Choose...</option>
                                                <option value="0">Youtube</option>
                                                <option value="1">Spotify</option>
                                                <option value="2">Apple Store</option>
                                                <option value="3">Amazon</option>
                                                <option value="4">Play Store</option>
                                                <option value="5">Deezer</option>
                                                <option value="6">Shazam</option>
                                                <option value="7">Tidal</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please provide a valid state.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="inputStream">Steams</label>
                                            <input class="form-control" type="text" id="inputStream" name="inputStream" required>
                                            <div class="invalid-feedback" style="width: 100%;">
                                            Stream count is required.
                                            </div>
                                        </div> 
                                        <div class="col-md-4 mb-3">
                                            <label for="inputDown">Downloads</label>
                                            <input class="form-control" type="text" id="inputDown" name="inputDown" required>
                                            <div class="invalid-feedback" style="width: 100%;">
                                            Download count is required.
                                            </div>
                                        </div> 
                                        <div class="col-md-4 mb-3">
                                            <label for="inputAdown">Album Downloads</label>
                                            <input class="form-control" type="text" id="inputAdown" name="inputAdown" required>
                                            <div class="invalid-feedback" style="width: 100%;">
                                            Album Download count is required.
                                            </div>
                                        </div>
                                        <div class="col-md-9 mb-3">
                                            <label for="inputValue">Revenue</label>
                                            <input class="form-control" type="text" id="inputRevenue" name="inputRevenue" required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="inputCurrency">Currency</label>
                                            <select class="custom-select d-block w-100" id="inputCurrency" name="inputCurrency" required>
                                                <option value="0">₺ Turkish lira</option>
                                                <option value="1">$ United States dollar</option>
                                            </select>
                                        </div> 
                                    </div>

                                    <hr class="mb-4">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="buttonSendStat" value="Sent">Continue</button>
                                    <hr class="mb-4">
                                </form>
                            </div>     
                </div>
            <!-- /footer-->
       
        <!-- /div-->

    <!-- /div-->