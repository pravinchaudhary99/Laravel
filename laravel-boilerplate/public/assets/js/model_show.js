$(document).ready(function(){
    const element = document.getElementById('kt_modal_add_role');
    const form = element.querySelector('#kt_modal_add_role_form');
    const modal = new bootstrap.Modal(element);


    // Close button handler
    const closeButton = element.querySelector('[data-kt-roles-modal-action="close"]');
    closeButton.addEventListener('click', e => {
        e.preventDefault();

        Swal.fire({
            text: "Are you sure you would like to close?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Yes, close it!",
            cancelButtonText: "No, return",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-active-light"
            }
        }).then(function (result) {
            if (result.value) {
                $("#kt_modal_add_role_form").find('[type="checkbox"]').removeAttr('checked',true);
                form.reset();
                modal.hide(); // Hide modal
                location.reload(true);
            }
        });
    });

    // Cancel button handler
    const cancelButton = element.querySelector('[data-kt-roles-modal-action="cancel"]');
    cancelButton.addEventListener('click', e => {
        e.preventDefault();

        Swal.fire({
            text: "Are you sure you would like to cancel?",
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
                $("#kt_modal_add_role_form").find('[type="checkbox"]').removeAttr('checked',true)
                form.reset(); // Reset form
                modal.hide(); // Hide modal
                location.reload(true);
            } else if (result.dismiss === 'cancel') {
                Swal.fire({
                    text: "Your form has not been cancelled!.",
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
    // Select all handler
    const handleSelectAll = () =>{
        // Define variables
        const selectAll = form.querySelector('#kt_roles_select_all');
        const allCheckboxes = form.querySelectorAll('[type="checkbox"]');

        // Handle check state
        selectAll.addEventListener('change', e => {

            // Apply check state to all checkboxes
            allCheckboxes.forEach(c => {
                c.checked = e.target.checked;
            });
        });
    }
    handleSelectAll();

});

