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



});