 <!-- divWrapper -->
            <div class="container">
                <?php if (@$SendStatement) { ?>
                     <div class="alert alert-success" role="alert">
                        Your statement has been successfully saved
                    </div>
                <?php } ?>
                <div class="text-center">
                    <h2>Statements</h2>
                    <p class="lead">Payment details</p>
                </div>
                <div class="row">
                            <div class="col-md-12">
                                <form class="needs-validation" method="POST" autocomplete="off">
                                    <div class="row">
                                        <input class="form-control" type="hidden" id="inputSID" name="inputSID" value="<?php echo $this->uri->segment(3); ?>" required>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputValue">Beneficiary Name</label>
                                            <input class="form-control" type="text" id="inputName" name="inputName" required>
                                            <div class="invalid-feedback" style="width: 100%;">
                                                Value is required.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Beneficiary Adress</label>
                                                <textarea class="form-control" id="inputAdress" name="inputAdress" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="inputValue">Bank Name</label>
                                            <input class="form-control" type="text" id="inputBankname" name="inputBankname" required>
                                            <div class="invalid-feedback" style="width: 100%;">
                                                Value is required.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="inputValue">Bank Adress</label>
                                            <input class="form-control" type="text" id="inputBaddress" name="inputBaddress" required>
                                            <div class="invalid-feedback" style="width: 100%;">
                                                Value is required.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="inputValue">Bank Country</label>
                                            <input class="form-control" type="text" id="inputBCountry" name="inputBCountry" required>
                                            <div class="invalid-feedback" style="width: 100%;">
                                                Value is required.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="inputValue">SWIFT/BIC</label>
                                            <input class="form-control" type="text" id="inputSwift" name="inputSwift" required>
                                            <div class="invalid-feedback" style="width: 100%;">
                                                Value is required.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="inputValue">IBAN</label>
                                            <input class="form-control" type="text" id="inputIBAN" name="inputIBAN" required>
                                            <div class="invalid-feedback" style="width: 100%;">
                                                Value is required.
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
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

                                    <hr class="mb-4">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="buttonConfirm" value="Sent">Continue</button>
                                    <hr class="mb-4">
                                </form>
                            </div>     
                </div>
            <!-- /footer-->
       
        <!-- /div-->

    <!-- /div-->