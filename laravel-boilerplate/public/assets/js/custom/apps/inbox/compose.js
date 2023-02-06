"use strict";

// Class definition
var KTAppInboxCompose = function () {
    // Private functions
    // Init reply form
    const initForm = () => {
        // Set variables
        const form = document.querySelector('#kt_inbox_compose_form');
        const allTagify = form.querySelectorAll('[data-kt-inbox-form="tagify"]');

        // Handle CC and BCC
        handleCCandBCC(form);

        // Handle submit form
        handleSubmit(form);

        // Init tagify
        allTagify.forEach(tagify => {
            initTagify(tagify);
        });

        // Init quill editor
        initQuill(form);

        // Init dropzone
        initDropzone(form);
    }

    // Handle CC and BCC toggle
    const handleCCandBCC = (el) => {
        // Get elements
        const ccElement = el.querySelector('[data-kt-inbox-form="cc"]');
        const ccButton = el.querySelector('[data-kt-inbox-form="cc_button"]');
        const ccClose = el.querySelector('[data-kt-inbox-form="cc_close"]');

        // Handle CC button click
        ccButton.addEventListener('click', e => {
            e.preventDefault();

            ccElement.classList.remove('d-none');
            ccElement.classList.add('d-flex');
        });

        // Handle CC close button click
        ccClose.addEventListener('click', e => {
            e.preventDefault();

            ccElement.classList.add('d-none');
            ccElement.classList.remove('d-flex');
        });


    }

    // Handle submit form
    const handleSubmit = (el) => {
        const submitButton = el.querySelector('[data-kt-inbox-form="send"]');

        // Handle button click event
        submitButton.addEventListener("click", function () {
            // Activate indicator
            submitButton.setAttribute("data-kt-indicator", "on");

            // Disable indicator after 3 seconds
            setTimeout(function () {
                submitButton.removeAttribute("data-kt-indicator");
            }, 3000);
        });
    }

    // Init tagify
    const initTagify = (el) => {
        var inputElm = el;

        // initialize Tagify on the above input node reference
        var tagify = new Tagify(inputElm, {
            delimiters: ", ", // very important since a custom template is used with this property as text. allows typing a "value" or a "name" to match input with whitelist
            maxTags: 10,
            blacklist: ["fuck", "shit", "pussy"],
            keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
            templates: {
                dropdownItem: function(tagData) {
                    try {
                        var html = '';

                        html += '<div class="tagify__dropdown__item">';
                        html += '   <div class="d-flex align-items-center">';
                        html += '       <span class="symbol sumbol-' + (tagData.initialsState ? tagData.initialsState : '') + ' mr-2">';
                        html += '           <span class="symbol-label" style="background-image: url(\''+ (tagData.pic ? tagData.pic : '') + '\')">' + (tagData.initials ? tagData.initials : '') + '</span>';
                        html += '       </span>';
                        html += '       <div class="d-flex flex-column">';
                        html += '           <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">'+ (tagData.value ? tagData.value : '') + '</a>';
                        html += '           <span class="text-muted font-weight-bold">' + (tagData.email ? tagData.email : '') + '</span>';
                        html += '       </div>';
                        html += '   </div>';
                        html += '</div>';

                        return html;
                    } catch (err) {}
                }
            },
            transformTag: function(tagData) {
                tagData.class = 'tagify__tag tagify__tag--primary';
            },
            dropdown: {
                classname: "color-blue",
                enabled: 1,
                maxItems: 5
            }
        })

        tagify.on('dropdown:show dropdown:updated', onDropdownShow)
        tagify.on('dropdown:select', onSelectSuggestion)

        var addAllSuggestionsElm;

        function onDropdownShow(e) {
            var dropdownContentElm = e.detail.tagify.DOM.dropdown.content;

            if (tagify.suggestedListItems.length > 1) {
                addAllSuggestionsElm = getAddAllSuggestionsElm();

                // insert "addAllSuggestionsElm" as the first element in the suggestions list
                dropdownContentElm.insertBefore(addAllSuggestionsElm, dropdownContentElm.firstChild)
            }
        }

        function onSelectSuggestion(e) {
            if (e.detail.elm == addAllSuggestionsElm)
                tagify.dropdown.selectAll.call(tagify);
        }

        // create a "add all" custom suggestion element every time the dropdown changes
        function getAddAllSuggestionsElm() {
            // suggestions items should be based on "dropdownItem" template
            return tagify.parseTemplate('dropdownItem', [{
                class: "addAll",
                name: "Add all",
                email: tagify.settings.whitelist.reduce(function (remainingSuggestions, item) {
                    return tagify.isTagDuplicate(item.value) ? remainingSuggestions : remainingSuggestions + 1
                }, 0) + " Members"
            }]
            )
        }
    }

    // Init quill editor
    const initQuill = (el) => {
        var quill = new Quill('#kt_inbox_form_editor', {
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, 3, 4, 5, 6, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    ['image', 'code-block'],
                ]
            },
            placeholder: 'Type your text here...',
            theme: 'snow' // or 'bubble'
        });

        // Customize editor
        const toolbar = el.querySelector('.ql-toolbar');

        if (toolbar) {
            const classes = ['px-5', 'border-top-0', 'border-start-0', 'border-end-0'];
            toolbar.classList.add(...classes);
        }
    }

    // Init dropzone
    const initDropzone = (el) => {
        // set the dropzone container id
        const id = '[data-kt-inbox-form="dropzone"]';
        const dropzone = el.querySelector(id);
        const uploadButton = el.querySelector('[data-kt-inbox-form="dropzone_upload"]');

        // set the preview element template
        var previewNode = dropzone.querySelector(".dropzone-item");
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        var myDropzone = new Dropzone(id, { // Make the whole body a dropzone
            url: '/storeFile/', // Set the url for your upload script location
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            parallelUploads: 20,
            maxFilesize: 1, // Max filesize in MB
            previewTemplate: previewTemplate,
            acceptedFiles: ".jpeg,.jpg,.png,.gif,application/pdf",
            previewsContainer: id + " .dropzone-items", // Define the container to display the previews
            clickable: uploadButton, // Define the element that should be used as click trigger to select files.
            success: function(file, response){
                var fileName = response['success'];
                var className = file.name.split('.')[0].replace(/\s/g, '_').replace(/[\W]+/g,'');
                var length = $(".dropzone-item").length;
                var html = `<input name="storeFiles[]" class="${className}_input"  value="${fileName}" hidden />`;
                $(".dropzone-item").eq(length-1).addClass(className+fileName.split(".")[0])
                return $(".dropzone-item").eq(length-1).find('div.dropzone-file').append(html);
            },
            removedfile: function(file) {
                var className = file.name.split('.')[0].replace(/\s/g, '_').replace(/[\W]+/g,'');
                var imageName = $(`input[class='${className}_input']`).val();
                $.ajax({
                    type: 'POST',
                    url: '/fileDestroy/',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {filename: imageName},
                    success: function (data){
                        $(`.${className+data.split(".")[0]}`).remove();
                        console.log("File has been successfully removed!!");
                    },
                });
            }
        });


        myDropzone.on("addedfile", function (file) {
            // Hookup the start button
            const dropzoneItems = dropzone.querySelectorAll('.dropzone-item');
            dropzoneItems.forEach(dropzoneItem => {
                dropzoneItem.style.display = '';
            });
        });

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function (progress) {
            const progressBars = dropzone.querySelectorAll('.progress-bar');
            progressBars.forEach(progressBar => {
                progressBar.style.width = progress + "%";
            });
        });

        myDropzone.on("sending", function (file) {
            // Show the total progress bar when upload starts
            const progressBars = dropzone.querySelectorAll('.progress-bar');
            progressBars.forEach(progressBar => {
                progressBar.style.opacity = "1";
            });
        });

        // Hide the total progress bar when nothing"s uploading anymore
        myDropzone.on("complete", function (progress) {
            const progressBars = dropzone.querySelectorAll('.dz-complete');

            setTimeout(function () {
                progressBars.forEach(progressBar => {
                    progressBar.querySelector('.progress-bar').style.opacity = "0";
                    progressBar.querySelector('.progress').style.opacity = "0";
                });
            }, 300);
        });

        $(document).on("click",".dropzone-delete",function(){
            console.log("here!");
        });
    }



    // Public methods
    return {
        init: function () {
            initForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppInboxCompose.init();
});
