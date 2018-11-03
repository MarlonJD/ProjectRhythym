 <!-- divWrapper -->
            <div class="container">
                <?php if (@$SendStatement) { ?>
                     <div class="alert alert-success" role="alert">
                        Your statement has been successfully saved
                    </div>
                <?php } ?>
                <div class="text-center">
                    <h2>Statements</h2>
                    <p class="lead">Quarter payments</p>
                </div>
                <div class="row">
                            <div class="col-md-12">
                                <form class="needs-validation" method="POST" autocomplete="off">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="inputType">Type</label>
                                            <select class="custom-select d-block w-100" id="inputType" name="inputType" required>
                                                <option disabled value="" selected>Choose...</option>
                                                <option value="0">Album</option>
                                                <option value="1">EP</option>
                                                <option value="2">Single</option>
                                                <option value="3">Label</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please provide a valid type.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputPeriod">Period</label>
                                            <div class="input-group date">
                                            <input type="text" id="inputPeriod" name="inputPeriod" class="form-control" style="cursor: pointer" required>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid period.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9 mb-3">
                                            <label for="inputValue">Value</label>
                                            <input class="form-control" type="text" id="inputValue" name="inputValue" required>
                                            <div class="invalid-feedback" style="width: 100%;">
                                                Value is required.
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="inputCurrency">Currency</label>
                                            <select class="custom-select d-block w-100" id="inputCurrency" name="inputCurrency" required>
                                                <option value="0">₺ Turkish lira</option>
                                                <option value="1">$ United States dollar</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please provide a valid currency.
                                            </div>
                                        </div>
                                    </div>

                                    <label for="inputUserid">User</label>
                                            <select class="d-block w-100 selectpicker" data-live-search="true" id="inputUserid" name="inputUserid" data-style="btn-outline-success" required>
                                                <option disabled value="" selected>Choose...</option>
                                                <?php foreach($users as $key) { ?><option value="<?php echo $key->id; ?>"><?php echo $key->username.' - '.$key->email; ?></option>
                                                <?php } ?></select>
                                    
                                    <hr class="mb-4">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="buttonSendStatement" value="Sent">Continue</button>
                                    <hr class="mb-4">
                                </form>
                            </div>     
                </div>
            <!-- /footer-->
       
        <!-- /div-->

    <!-- /div-->