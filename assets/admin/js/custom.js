/**
 * custom js
 */


 $(document).ready(function(){
    'use strict';

    $(".delete").on('click', function(){
        
    if(confirm('are you sure to delete this record?')==true)
        window.location =$(this).attr("data-id");
    else    
        return false;
    });

    $(".change").on('click', function(){
        
        if(confirm('are you sure to change the status of this record?')==true)
            window.location =$(this).attr("data-id");
        else    
            return false;
        });
    

    $('#records-minimal').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });

       // Date
       $('.date').datepicker({
        format: 'yyyy/mm/dd',
        
    });

    // date check 

    $('#chk_current_date').on('change', function(){
        if($('#chk_current_date').is(':checked')) {
            $("input[name='txt_date_to']").val('');
            $('#date_to').hide();
        } else {
            $('#date_to').show();
        }
    });
    if($('#chk_current_date').is(':checked')) {
        $('#date_to').hide();
    }

    $(function () {
        // Summernote
        $('.textarea').summernote()
      })

      
  });

  
