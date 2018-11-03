 <!-- divWrapper -->
        <div class="container">
            <div class="text-center">
                <h2>Genres</h2>
                <p class="lead"></p>
            </div>
            <div class="center">
                <?php echo form_open('Admin/Other/Genres'); ?>
                <label for="inputType">Type?</label>
                <select id="inputType" name="inputType" class="custom-select d-block w-100">
                    <option  disabled value="" selected>Choose..</option>
                    <option value="0">Genre</option>
                    <option value="1">Subgenre</option>
                </select></br>
                <label for="inputGenreid">Genre? if any</label>
                <select id="inputGenreid" name="inputGenreid" class="custom-select d-block w-100">
                    <option  disabled selected>Choose Genre..</option>
                    <?php foreach($genres as $row){ ?>
                        <option value="<?php echo $row->id; ?>"><?php echo $row->text; ?></option>
                    <?php } ?>
                </select></br>
                <label for="inputDown">Text</label>
                <input class="form-control" type="text" id="inputText" name="inputText" required>
                <div class="invalid-feedback" style="width: 100%;">
                Download count is required.
                </div>
                </br>
                <button type="submit" name="buttonSendGenres" value="Sent" class="btn btn-primary btn-lg btn-block">Send</button>
                </form>

                
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><i class="fas fa-hashtag"></i></th>
                        <th>Type</th>
                        <th>Text</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($allGenres as $row){ ?>
                    <tr>
                        <td class="align-middle"><?php echo $row->id; ?></td>
                        <td class="align-middle"><?php getGenreTypebyID($row->type); ?></td>
                        <td class="align-middle"><?php if ($row->genreid) { getGenrebyID($row->genreid); echo " | "; } echo $row->text; ?></td>
                    </tr>
                    <?php } ?>   
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /footer-->
    <!-- /div-->
<!-- /div-->
