$(document).ready(function(){
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var user_table = $("#kt_customers_table").DataTable({
        processing: true,
        serverSide: true,
        stateSave:false,
        'order':[],
        "ajax": {
            url: "/api/users",
            type: "POST",
            headers: {
                'X-CSRFToken': csrfToken
            },
        },
        "columns":[
            {data:'name'},
            {data:'email'},
            {
                data:'created_at',
                autoHide: false,
                orderable:false,
                "render": function (data, type, row, meta) {
                    let dateString_ = moment(row.created_at).format("DD MMM YYYY HH:mm a");
                    return dateString_
                }
            },
            {
                data:'Actions',
                sortable: false,
                autoHide: false,
                orderable:false,
                "render": function (data, type, row, meta) {
                    var html =` <div class="menu-item px-3" style="text-align:end;">
                                <a href="/users/view/${row.id}" class="px-2" title="View"><span class="svg-icon svg-icon-1"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Communication/Write.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="currentColor" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
                                            <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="currentColor" fill-rule="nonzero" opacity="0.3"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span></a>
                                <a href="javascript:void(0)" class="px-2 delete_user_data" data-id="${row.id}" title="Delete" ><span class="svg-icon svg-icon-1"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Home/Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="currentColor" fill-rule="nonzero"/>
                                        <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="currentColor" opacity="0.3"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span></a>
                            </div>
                    `
                    return html;
                }
            }
        ]
    });
    const filterSearch = document.querySelector('[data-kt-customer-table-filter="search"]');
    filterSearch.addEventListener('keyup', function (e) {
        user_table.search("",false).draw();
        user_table.search(e.target.value).draw();
    });

    const filterButton = document.querySelector('[data-kt-customer-table-filter="filter"]');

        // Filter datatable on submit
        filterButton.addEventListener('click', function () {
            // Get filter values
            const monthValue = $("#select_month").val();
            // Build filter string from filter options
            const filterString = monthValue;
            // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
            console.log(filterString,"filterString");
            if (filterString == "") {
                user_table.search(filterString,false).draw();
            }else{
                user_table.search(filterString,'filter').draw();
            }
        });

});