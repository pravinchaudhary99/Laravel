$(document).ready(function(){
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var dataTable = $("#login_sessions_data_table").DataTable({
        processing: true,
        serverSide: true,
        stateSave:false,
        'order':[],
        "ajax": {
            url: "/api/login_session",
            type: "POST",
            headers: {
                'X-CSRFToken': csrfToken
            },
        },
        "columns":[
            {data:'location'},
            {data:'device'},
            {data:'ip_address'},
            {data:'date_time'},
        ]
    })

    const filterSearch = document.querySelector('[data-kt-customer-table-filter="search"]');
    filterSearch.addEventListener('keyup', function (e) {
        dataTable.search(e.target.value).draw();
    });

    $.ajax({
        url: '/logs',
        type:'GET',
        success : function(data){
            console.log(data);
        }
    })

});