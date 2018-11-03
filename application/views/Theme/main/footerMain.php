
            <!-- /footer-->
        </div>
        <!-- /div-->
    </div>
    <!-- /div-->
    <!-- Bootstrap JavaScript -->
    <!-- jQuery first, then Popper.js, Bootstrap, then CoreUI  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>  

    <!-- Sidebar-->
    <script>
      $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
        $('.tooltipc').tooltip({html:true})
        
        $('.selectpicker').selectpicker();
        $('#inputIBAN').mask('SS00 0000 0000 0000 0000 00', {
            placeholder: '____ ____ ____ ____ ____ __'
        });
        $('#inputSwift').mask('AAAA AA AA AAAA', {
            placeholder: '____ __ __ xxxx'
        });
        SSSSSSS
      });
    </script>
    <!--Loading-Bar-->
    <script type="text/javascript" src="<?php echo base_url('assets/js/loading-bar.js'); ?>"></script>
    <!--Media Uploader-->
    <script>
    $('#mediaUpload').on('click', function() {
        $("#mediaMessage").empty();
        $('#mediaLoading').show();

        var file_data = $('#mediaUploader').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('my_file', file_data);
        form_data.append('username', '<?php echo $_SESSION['username']; ?>');                
        $.ajax({
            url: '<?php echo base_url('upload.php');?>', // point to server-side PHP script 
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            success: function(data){
                $('#mediaLoading').hide();
                var obj = JSON.parse(data);
                document.getElementById("upMedia").value = obj.path_lower;
                $('#mediaSuccess').show();
            }
        });

        var myVar = setInterval(myTimer, 1000);
        function myTimer()
        {
            $.get( "<?php echo base_url('progress.php');?>", function( data ) {
                updateProgress(data);
            });
        }

        var progressElement = document.getElementById('mediaProgress-bar')

        function updateProgress(percentage) {
            progressElement.style.width = percentage + '%';
            progressElement.setAttribute("aria-valuenow", percentage);
            progressElement.innerHTML = percentage + '%';

        }
        
    });
    </script>
    <script>
            $('#mediaUploader').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
    </script>

    <!--Cover Uploader-->
    <script>
    $('#coverUpload').on('click', function() {
        $("#coverMessage").empty();
        $('#coverLoading').show();

        var file_data = $('#coverUploader').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('my_file', file_data);
        form_data.append('username', '<?php echo $_SESSION['username']; ?>');                          
        $.ajax({
            url: '<?php echo base_url('upload.php');?>', // point to server-side PHP script 
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            success: function(data){
                $('#coverLoading').hide();
                var obj = JSON.parse(data);
                document.getElementById("upCover").value = obj.path_lower;
                $('#coverSuccess').show();
            }
        });

        var myVar = setInterval(myTimer, 1000);
        function myTimer()
        {
            $.get( "<?php echo base_url('progress.php');?>", function( data ) {
                updateProgress(data);
            });
        }

        var progressElement = document.getElementById('coverProgress-bar')

        function updateProgress(percentage) {
            progressElement.style.width = percentage + '%';
            progressElement.setAttribute("aria-valuenow", percentage);
            progressElement.innerHTML = percentage + '%';

        }
        
    });
    </script>
    <script>
            $('#coverUploader').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
    </script>
    <script>
    $(function() {
        $("#inputGenre").on('change', function() {
            var vgenreid = $(this).val();
            $.ajax({
                type : 'POST',
                url  : '<?php echo base_url('main/GetSubGenres');?>',
                dateType : 'json',
                data : {genreid : vgenreid},
                success : function(data){
                console.log(data);
                var json_data = $.parseJSON(data),
                    options;
                options += '<option disabled selected>Choose...</option>';
                for(var i = 0; i<json_data.length; i++)
                {
                    options += '<option value="'+json_data[i].id+'">'+json_data[i].text+'</option>';
                }
                $('#inputsGenre').html(options);
                }
            });
        });
    });
    </script>

    <!--Datepicker-->
    <script>
    $.fn.datepicker.dates['qtrs'] = {
        days: ["Sunday", "Moonday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        daysShort: ["Sun", "Moon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
        months: ["Q1", "Q2", "Q3", "Q4", "", "", "", "", "", "", "", ""],
        monthsShort: ["Jan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Feb&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mar", "Apr&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;May&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jun", "Jul&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aug&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sep", "Oct&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nov&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dec", "", "", "", "", "", "", "", ""],
        today: "Today",
        clear: "Clear",
        format: "mm/dd/yyyy",
        titleFormat: "MM yyyy",
        /* Leverages same syntax as 'format' */
        weekStart: 0
        };

        $('#inputPeriod').datepicker({
        format: "MM yyyy",
        minViewMode: 1,
        autoclose: true,
        language: "qtrs",
        forceParse: false
        }).on("show", function(event) {

        $(".month").each(function(index, element) {
            if (index > 3) $(element).hide();
        });
        
    });
    </script>
    
  </body>
</html>