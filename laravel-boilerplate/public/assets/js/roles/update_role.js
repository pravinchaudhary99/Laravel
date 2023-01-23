$(document).ready(function(){

    $(document).on('click','#role_data_update_btn',function(){
        var id = $(this).attr('data-id');
        $("#kt_modal_add_role").modal('show');
        $("#data_table_h2").text('Update Role')
        $(".role_data_submit").text("Update");
        $(".method_add").append(`
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="role_id" value="${id}">
        `)
        $("#kt_modal_add_role_form").attr('action',`/roles/update/${id}`);
        $.ajax({
            url:`/api/roles/${id}`,
            type:'get',
            contentType: false,
            processData: false,
            success: function(data){
                var permission = JSON.parse(data['permissions'])
                $(".role_name").val(data['name'])
                permission.forEach(element => {
                    $(`.${element}`).attr('checked',true);
                });
                const allCheckboxes = $("#kt_modal_add_role_form").find('[type="checkbox"]');
                if (permission.length == allCheckboxes.length-1){
                    $("#kt_roles_select_all").attr('checked',true)
                }else{
                    $("#kt_roles_select_all").removeAttr('checked',true)
                }
            }
        })
    });
    $.ajaxSetup({
        headers:
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $(document).on('click','#role_data_delete_btn',function(){
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).attr('data-id');
        Swal.fire({
            text: "Are you sure you would like to delete?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes, cancel it!",
            cancelButtonText: "No, return",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-active-light"
            }
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url : '/roles/delete/'+id,
                    type : 'DELETE',
                    success : function(data){
                        if(data['status'] === true){
                            var host = $(location).attr('host');
                            const a = document.createElement('a');
                            a.href = "/roles";
                            a.click();
                        }
                    }
                });
            } else if (result.dismiss === 'cancel') {
                Swal.fire({
                    text: "Your form has not been deleted!.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary",
                    }
                });
            }
        });
    });

});