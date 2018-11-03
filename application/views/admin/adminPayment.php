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
                    <h2>Payment Details</h2>
                    <p class="lead"></p>   
                </div>
                
                <?php if ($pds) { ?>      
                <div class="row"> 
                <table class="table table-hover col-sm-12">
                    <thead>
                    <tr>
                        <th><i class="fas fa-hashtag"></i></th>
                        <th>Name</th>
                        <th>Adress</th>
                        <th class="d-none d-md-block">Bank Name</th>
                        <th class="text-center d-none d-sm-table-cell">Bank Adress</th>
                        <th>Country</th>
                        <th>Swift</th>
                        <th class="d-none d-sm-table-cell">IBAN</th>
                        <th class="d-none d-sm-table-cell">Currency</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($pds as $row) {?>
                    <tr>
                        <td class="align-middle"><?php echo $row->id; ?></td>
                        <td class="align-middle"><?php echo $row->name; ?></td>
                        <td class="align-middle"><?php echo $row->adress; ?></td>
                        <td class="align-middle"><?php echo $row->bankname; ?></td>
                        <td class="align-middle"><?php echo $row->bAddress; ?></td>
                        <td class="align-middle"><?php echo $row->bCountry; ?></td>
                        <td class="align-middle"><?php echo $row->swift; ?></td>
                        <td class="align-middle"><?php echo $row->IBAN; ?></td>
                        <td class="align-middle"><?php echo getCurrencybyID($row->currency); ?></td>
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