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
                <?php echo form_open('Admin/ContentID/Add'); ?>
                    <label for="inputDown">Title</label>
                    <select class="d-block w-100 selectpicker" data-live-search="true" id="inputCid" name="inputCid" data-style="btn-outline-success" required>
                    <option value="" disabled selected>Choose...</option>
                    <?php foreach($contents as $key) { ?><option value="<?php echo $key->id; ?>"><?php echo $key->artist.' - '.$key->title; ?></option>
                    <?php } ?></select>
                    <label for="inputDown">Link</label>
                    <input class="form-control" type="text" id="inputLink" name="inputLink" required>
                    </br>
                    <button type="submit" name="buttonSendLinks" value="Sent" class="btn btn-primary btn-lg btn-block">Send</button>
                </form>
                </br> </br>
            </div>
        <!-- /footer-->
        </div>
    <!-- /div-->
<!-- /div-->
