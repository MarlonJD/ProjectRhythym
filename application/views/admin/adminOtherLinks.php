 <!-- divWrapper -->
        <div class="container">
            <div class="text-center">
                <h2>Titles</h2>
                <p class="lead"></p>
                <?php if (isset($flash_message)) { ?>
                    <div class="alert alert-primary" role="alert">
                        <?php echo $flash_message; ?>
                    </div>
                <?php } ?>
            </div>
            <div class="center">
                <?php echo form_open('Admin/Other/Links'); ?>
                    <label for="inputDown">Title</label>
                    <input class="form-control" type="text" id="inputTitle" name="inputTitle" required>
                    <label for="inputDown">Link</label>
                    <input class="form-control" type="text" id="inputLink" name="inputLink" required>
                    </br>
                    <button type="submit" name="buttonSendLinks" value="Sent" class="btn btn-primary btn-lg btn-block">Send</button>
                </form>
                </br> </br>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><i class="fas fa-hashtag"></i></th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($allLinks as $row){ ?>
                    <tr>
                        <td class="align-middle"><?php echo $row->id; ?></td>
                        <td class="align-middle"><?php echo $row->title; ?></td>
                        <td class="align-middle"><?php echo $row->link; ?></td>
                        <td class="align-middle">
                            <a class="btn btn-danger" href="<?php echo base_url('admin/RemoveLink/'.$row->id); ?>"><i class="fas fa-trash"></i> </a>
                        </td>
                    </tr>
                    <?php } ?>   
                    </tbody>
                </table>
            </div>
        <!-- /footer-->
        </div>
    <!-- /div-->
<!-- /div-->
