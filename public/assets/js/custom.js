$(function () {
    "use strict";

    // Feather Icon Init Js
    // feather.replace();

    // $(".preloader").fadeOut();

    // =================================
    // Tooltip
    // =================================
    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // =================================
    // Popover
    // =================================
    var popoverTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="popover"]')
    );
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });

    // increment & decrement
    $(".minus,.add").on("click", function () {
        var $qty = $(this).closest("div").find(".qty"),
            currentVal = parseInt($qty.val()),
            isAdd = $(this).hasClass("add");
        !isNaN(currentVal) &&
            $qty.val(
                isAdd ? ++currentVal : currentVal > 0 ? --currentVal : currentVal
            );
    });

    // ==============================================================
    // Collapsable cards
    // ==============================================================
    $('a[data-action="collapse"]').on("click", function (e) {
        e.preventDefault();
        $(this)
            .closest(".card")
            .find('[data-action="collapse"] i')
            .toggleClass("ti-minus ti-plus");
        $(this).closest(".card").children(".card-body").collapse("toggle");
    });
    // Toggle fullscreen
    $('a[data-action="expand"]').on("click", function (e) {
        e.preventDefault();
        $(this)
            .closest(".card")
            .find('[data-action="expand"] i')
            .toggleClass("ti-arrows-maximize ti-arrows-maximize");
        $(this).closest(".card").toggleClass("card-fullscreen");
    });
    // Close Card
    $('a[data-action="close"]').on("click", function () {
        $(this).closest(".card").removeClass().slideUp("fast");
    });

    // fixed header
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 60) {
            $(".app-header").addClass("fixed-header");
        } else {
            $(".app-header").removeClass("fixed-header");
        }
    });

    // Checkout
    $(function () {
        $(".billing-address").click(function () {
            $(".billing-address-content").hide();
        });
        $(".billing-address").click(function () {
            $(".payment-method-list").show();
        });
    });
});

/*change layout boxed/full */
$(".full-width").click(function () {
    $(".container-fluid").addClass("mw-100");
    $(".full-width i").addClass("text-primary");
    $(".boxed-width i").removeClass("text-primary");
});
$(".boxed-width").click(function () {
    $(".container-fluid").removeClass("mw-100");
    $(".full-width i").removeClass("text-primary");
    $(".boxed-width i").addClass("text-primary");
});

/*Dark/Light theme*/
$(".light-logo").hide();
$(".dark-theme").click(function () {
    $("nav.navbar-light").addClass("navbar-dark");
    $(".dark-theme i").addClass("text-primary");
    $(".light-theme i").removeClass("text-primary");
    $(".light-logo").show();
    $(".dark-logo").hide();
});
$(".light-theme").click(function () {
    $("nav.navbar-light").removeClass("navbar-dark");
    $(".dark-theme i").removeClass("text-primary");
    $(".light-theme i").addClass("text-primary");
    $(".light-logo").hide();
    $(".dark-logo").show();
});

/*Card border/shadow*/
$(".cardborder").click(function () {
    $("body").addClass("cardwithborder");
    $(".cardshadow i").addClass("text-dark");
    $(".cardborder i").addClass("text-primary");
});
$(".cardshadow").click(function () {
    $("body").removeClass("cardwithborder");
    $(".cardborder i").removeClass("text-primary");
    $(".cardshadow i").removeClass("text-dark");
});

$(".change-colors li a").click(function () {
    $(".change-colors li a").removeClass("active-theme");
    $(this).addClass("active-theme");
});

/*Theme color change*/
function toggleTheme(value) {
    $(".preloader").show();
    var sheets = document.getElementById("themeColors");
    sheets.href = value;
    $(".preloader").fadeOut();
}
$(".preloader").fadeOut();

/*
 * getAllFields(selector, required)
 * @param selector string (the form id)
 * @param required boolean (selector for field that contain required attribute only default false)
 * to get all input , select , textarea in a form with selector and required
 * @return array
 */

const getAllFields = (selector, required = true) => {
    const fields = $(selector).find(
        `input:not([type="submit"])${required ? '[required]' : ''}:not(.ck-hidden), textarea${required ? '[required]' : ''}, select${required ? '[required]' : ''}`
    ).not('input[name="_token"]').not("input[name='']").not("input[name='method']");
    return Array.from(fields);
}

/*
 * showValidationErrors(errors, formSelector)
 * @param errors object (the xhr response that contains errors of the fieldss)
 * @param formSelector string (the form id)
 * @param exept object<fieldname, Object<key, val>> (the field that custom for showing the error)
 * avaiable key : selector , class, style
 * to display all errors in a form and remove the error if the field is valid
 * @return void
 */


const showValidationErrors = (errors, formSelector, excepts = {}) => {
    const form = $(formSelector);
    const fieldErrorKeys = Object.keys(errors);
    const exceptFields = Object.keys(excepts);

    getAllFields(formSelector, false).forEach(field => {
        const fieldTarget = form.find(exceptFields.includes(field.name) ? excepts[field.name].selector :
            `${field.localName}[name="${field.name}"]`)
        if (!fieldErrorKeys.includes(field.name)) {
            fieldTarget.removeClass("is-invalid").addClass('is-valid').next('small.invalid-feedback')
                .html('');
        } else {
            fieldTarget.removeClass('is-valid').addClass("is-invalid").nextAll('small.invalid-feedback')
                .html(errors[
                    field.name][0]);
        }
    });

    if(exceptFields.length > 0){
        console.log(exceptFields);
        exceptFields.forEach(ex => {
            console.log(excepts[ex]);
            if(!fieldErrorKeys.includes(ex)){
                if(ex.validClass){
                    $(excepts[ex].selector).addClass(excepts[ex].validClass);
                }else{
                    $(excepts[ex].selector).css(excepts[ex].styleValid)
                }
            }else{
                if(ex.invalidClass){
                    $(excepts[ex].selector).addClass('is-invalid').addClass(excepts[ex].invalidClass);
                }else{
                    $(excepts[ex].selector).addClass('is-invalid').css(excepts[ex].invalidStyle)
                }
                $(excepts[ex].selector).nextAll('.invalid-feedback').html(errors[ex][0]);
            }
        })
    }


}

/*
 * resetform
 * @param selector (the form selector)
 * to remove all errors on the form and reset the form
 * @return void
 */

const resetForm = (selector, excepts = {}) => {
    const form = $(selector);
    form[0].reset();
    const exceptFields = Object.keys(excepts);
    getAllFields(selector, false).forEach(field => {
        const fieldTarget = form.find(exceptFields.includes(field.name) ? excepts[field.name].selector :
            `${field.localName}[name="${field.name}"]`)

        if (!fieldTarget) return;

        if (exceptFields.includes(field.name)) {
            excepts[field.name].styleValid ? fieldTarget.removeAttr('style').nextAll('.invalid-feedback')
                .html('') : fieldTarget.removeClass(excepts[field.name].class ??
                    "form-control is-invalid is-valid")
                    .nextAll('.invalid-feedback').html('');
        } else {
            fieldTarget.removeClass("is-invalid is-valid").next('.invalid-feedback').html('');
        }
    });

    const dropzoneInstances = form.find('[data-plugin="dropzone"]');

    if (dropzoneInstances.length > 0) {
        dropzoneInstances.each(function () {
            const id = $(this).attr('id');
            const dzInstance = Dropzone.forElement(`#${id}`);
            if ($(this).hasClass('dz-hasvalue')) {
                $(this).removeClass('dz-hasvalue');
                $(this).removeClass('dz-started');
                $(this).find('.dz-preview').remove();
            }
            dzInstance.removeAllFiles();
        })
    }

};

function debounce(func, delay) {
    let debounceTimer;
    return function () {
        const context = this;
        const args = arguments;
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => func.apply(context, args), delay);
    }
}

const showPageOverlay = () => {
    $(".transparent-preloader").show();
}

const hidePageOverlay = () => {
    $(".transparent-preloader").fadeOut();
}

function fillForm(selector, datas, values = {}) {
    const fieldKeys = [...Object.keys(datas), ...Object.keys(values)]
    const fields = getAllFields(selector, false).filter(field => fieldKeys.includes(field.name));
    fields.forEach(field => {
        if (field.localName == 'input' && field.type == "radio") {
            $(field).prop('checked', ((values && values[field.name]) ? values[field.name].value : datas[
                field.name]) == field.value);
        } else if (field.localName == 'select') {
            if (values && Object.keys(values).includes(field.name)) {
                if ($(field).data('control') == 'select-2') {
                    $(field).append(new Option(values[field.name].label, values[field.name].value, true,
                        true));
                } else {
                    $(field).find('option').each(function () {
                        if ($(this).val() == values[field.name].value) {
                            $(this).prop('selected', true)
                        }
                    })
                }
            } else {
                $(field).find('option').each(function () {
                    if ($(this).val() == datas[field.name]) {
                        $(this).prop('selected', true)
                    }
                })
            }

        } else {
            $(field).val((values && values[field.name]) ? values[field.name] : datas[field.name]);
        }
    });

    const dropzoneInstances = $(selector).find('[data-plugin="dropzone"]');
    if (dropzoneInstances.length > 0) {
        dropzoneInstances.each(function () {
            const id = $(this).attr('id');
            const files = datas[$(this).data('name')];
            if (files) {
                initDropzone(`#${id}`, files);
            }
        })
    }
}

function handleAjaxError(jqXhr, callback = () => { }) {
    if (jqXhr.status === 0 && jqXhr.statusText === 'timeout') {
        toastr.error("Request Timeout", 'Error');
    } else if (jqXhr.status === 500) {
        toastr.error("Failed to process, server Error, ", 'Error');
    } else {
        callback();
    }
}


function showButtonLoader(button, label = "Processing...") {
    const oldText = button.html();
    const width = button.width();
    button.html(`</span><span class="me-3">${label}</span> <span class="spinner-border spinner-border-sm " role="status" aria-hidden="true">`);
    // button.width(width);
    button.prop('disabled', true);
    return function () {
        button.html(oldText);
        button.width('auto');
        button.prop('disabled', false);
    }
}

function getFormValue(form) {
    const arrayValues = form.serializeArray();
    return arrayValues.reduce((p, c, i) => {
        p[c.name] = c.value;
        return p;
    }, {});
}

function getSelect2Value(selector) {
    return selector.select2("data").map(function (v) {
        return v.id;
    })
}

function initDropzone(selector, values = []) {
    const supportedPreview = ["jpg", "jpeg", "png", "webp", "svg", "pdf"];
    const fieldName = $(selector).data("name");
    const previewTemplate = Dropzone.forElement(selector).options.previewTemplate
    const createElement = (str) => {
        const el = document.createElement('div');
        el.innerHTML = str;
        return el.firstChild;
    }

    if (typeof values == "object") {
        values.forEach(value => {
            const preview = createElement(previewTemplate);
            $(preview).find('[data-dz-name]').text(value.basename);
            if (supportedPreview.includes(value.extension)) {
                $(preview).find('[data-dz-name]').attr("href", value.path)
            }
            $(preview).find('[data-dz-size]').text(value.size);
            $(selector).append(preview);
        });
    } else {
        const preview = createElement(previewTemplate);
        const ext = values.filename.split('.').pop();
        $(preview).find('[data-dz-name]').text(values.filename);
        if (supportedPreview.includes(ext)) {
            $(preview).find('[data-dz-name]').attr("href", values.preview).addClass('has-preview').attr('title', "click to preview");
        }
        $(preview).find('[data-dz-size]').html(`<strong>${values.size}</strong>`);
        $(preview).append(createElement(`<input type="hidden" name="${fieldName}" value="${values.path}"/>`));
        $(selector).append(preview);
    }
    $(selector).addClass('dz-started');
    $(selector).addClass('dz-hasvalue');
    $(selector).find('[data-dz-remove]').on('click', function (ev) {
        ev.preventDefault();
        $(this).parents('.dz-preview').remove();
        if ($(selector).find('.dz-preview').length == 0) {
            $(selector).removeClass('dz-started');
            $(selector).removeClass('dz-hasvalue');
        }
    })
}

function previewFileFromURL(url_file, previewContainerId) {
    let output;
    // check if element is a string or an object
    if (typeof previewContainerId === 'string') {
        output = $('#' + previewContainerId);
    } else {
        output = previewContainerId;
    }
    if (url_file === '') {
        output.html('<p>No file uploaded.</p>');
    } else {
        // determine type of file
        const extension = url_file.split('.').pop().toLowerCase();
        if (extension === 'pdf') {
            output.html('<embed src="' + url_file + '" type="application/pdf" style="width: 100%; height: 500px;"></embed>');
        } else if (extension === 'docx' || extension === 'doc') {
            output.html('<img src="assets/media/icons/msword.png" class="img-fluid mx-auto d-block" style="max-width: 100%; max-height: 300px;" />');
        } else if (extension === 'xlsx' || extension === 'xls') {
            output.html('<img src="assets/media/icons/excel.png" class="img-fluid mx-auto d-block" style="max-width: 100%; max-height: 300px;" />');
        } else if (extension === 'pptx' || extension === 'ppt') {
            output.html('<img src="assets/media/icons/powerpoint.png" class="img-fluid mx-auto d-block" style="max-width: 100%; max-height: 300px;" />');
        } else if (extension === 'jpg' || extension === 'jpeg' || extension === 'png' || extension === 'gif') {
            output.html('<img src="' + url_file + '" class="img-fluid mx-auto d-block" style="max-width: 100%; max-height: 300px;" />');
        } else {
            output.html('<p>No preview available.</p>');
        }
    }
}

// custom form handling

$(function () {
    let closeConfirmed = false;

    // plugin ininitialization
    if (Dropzone) {
        // start dropzone customizations
        $("[data-plugin='dropzone']").each(function () {
            const id = $(this).attr('id');
            const { url = "tes", accept, maxSize, maxFiles, multiple, folder, name } = $(this).data();

            const el = $(this);
            const previewTemplate = el.find('.dz-preview').get(0).outerHTML;
            el.find('.dz-preview').get(0).remove();

            const existing = el.find('.dz-preview');
            let files = [];
            existing.map(function () {
                files.push({
                    basename: $(this).find('[data-dz-name]').text(),
                    path: $(this).find('[data-dz-name]').attr('href'),
                    size: $(this).find('[data-dz-size]').text(),
                    extension: $(this).find('[data-dz-name]').text().split('.').pop()
                });
            });
            el.find('.dz-preview').remove();

            new Dropzone(`#${id}`, {
                url: '/admin/media/upload',
                paramName: "file",
                maxFilesize: maxFiles ?? 2,
                createImageThumnails: false,
                clickable: `#${id} #btn_select `,
                autoQueue: false,
                previewTemplate,
                init: function () {
                    this.on("error", function (file, message) {
                        this.removeFile(file);
                        toastr.error(message, 'Error');
                    });
                    this.on('sending', function (file, xhr, formData) {
                        formData.append("_token", "");
                        formData.append("folder", folder ?? 'media');
                        formData.append('unique', false);
                    });
                    this.on('addedfile', function (file) {
                        const initname = file.name;
                        let filename = !(initname.slice(0, -4).length > 20) ? initname : (initname.slice(0, 20) + '...' + initname
                            .slice(-4));
                        const filetypes = file.type.split('/');

                        const fileReader = new FileReader();
                        fileReader.onload = function () {
                            if (filetypes[0] == 'image' || filetypes[1] == 'pdf') {
                                $(file.previewElement).find('[data-dz-name]').attr('href', fileReader.result);
                                $(file.previewElement).find('[data-dz-name]').addClass('has-preview')
                            }
                        }
                        switch (file.type.split('/')[0]) {
                            case 'image':
                                // $(file.previewElement).find('[data-dz-type]').addClass('img');
                                break;
                            case 'video':
                                // $(file.previewElement).find('[data-dz-type]').addClass('video');
                                break;
                            case 'audio':
                                // $(file.previewElement).find('[data-dz-type]').addClass('audio');
                                break;
                            default:
                            // $(file.previewElement).find('[data-dz-type]').addClass('file');
                        }
                        $(file.previewElement).find('[data-dz-name]').text(filename);
                        fileReader.readAsDataURL(file);
                    });

                    this.on("processing", (file) => {
                        $(file.previewElement).find('[dz-remove]').html('cancel');
                    });
                },
            });

            if (files.length > 0) {
                initDropzone(`#${id}`, files);
            }
        });
    }

    // select2 plugin
    $("[data-plugin='select-2']").not("[custom]").each(function () {
        const placeholder = $(this).data('placeholder');
        const source = $(this).data('source');
        const parent = $(this).data("parent");
        const multiple = Boolean($(this).attr('multiple'));

        const config = {
            placeholder: placeholder,
            dropdownParent: parent ? $(parent).find(".modal-body") : $(this).parents('form'),
            multiple,
        }

        if (source) {
            config.ajax = {
                url: source,
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: data.data
                    }
                }
            }
        };

        $(this).select2(config);
    });


    // base ajax handling

    $("form").not('[custom-action]').on("submit", function (ev) {
        ev.preventDefault();
        const currentForm = $(this);
        const tableId = currentForm.data('table-id')
        const hideButtonLoader = showButtonLoader(currentForm.find("button[type='submit']", currentForm.find("input[type='submit']").data('loading-text') ?? "Processing..."));
        const exceptsRules = {};
        const formData = new FormData(this);
        const dropzoneInstances = currentForm.find('[data-plugin="dropzone"]');
        if (dropzoneInstances.length > 0) {
            dropzoneInstances.each(function () {
                exceptsRules[$(this).data('name')] = {
                    selector: `#${$(this).attr('id')}`,
                    invalidStyle: {
                        borderColor: 'var(--bs-form-invalid-border-color) '
                    },
                    validStyle: {
                        borderColor: 'var(--bs-form-valid-border-color) '
                    }
                }
                if (!$(this).hasClass('dz-hasvalue')) {
                    const name = $(this).data("name");
                    const id = $(this).attr("id");
                    const dzInstance = Dropzone.forElement(`#${id}`);
                    const files = dzInstance?.files;
                    if (files.length > 1) {
                        files.forEach(file => {
                            formData.append(`${name}[]`, file)
                        })
                    } else if(files.length > 0){
                        formData.append(name, files[0]);
                    }
                }
            })
        }

        const select2Instances = currentForm.find('[data-plugin="select-2"]');
        if (select2Instances.length > 0) {
            select2Instances.each(function () {
                exceptsRules[$(this).attr('name')] = {
                    selector: $(this).next('.select2-container'),
                    styleInvalid: {
                        border: '1px solid var(--bs-form-invalid-border-color)'
                    },
                    styleValid: {
                        border: '1px solid var(--bs-form-valid-border-color)'
                    }
                }
            })
        }

        $.ajax({
            url: currentForm.attr("action"),
            method: currentForm.attr("method"),
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                Swal.fire({
                    text: data.message?.body,
                    icon: "success",
                    title: data.message?.title,
                    buttonsStyling: false,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    customClass: {
                        confirmButton: 'btn btn-primary',
                    }
                }).then((result) => {
                    const parentModal = currentForm.parents('.modal');
                    $(document).trigger(`form-submitted:${currentForm.attr('id')}`);
                    if (tableId) window.LaravelDataTables[tableId].ajax.reload();
                    if (currentForm.parents('.modal[update-modal]').length > 0) {
                        closeConfirmed = true;
                    }
                    if (!parentModal) return;
                    parentModal.modal("hide");
                });
            },
            error: function (jqXhr) {

                handleAjaxError(jqXhr, () => {
                    showValidationErrors(jqXhr.responseJSON.errors, currentForm, exceptsRules)
                });

            },
            complete: hideButtonLoader
        })
    })

    $('input:not([type="submit"]), textarea, select').on('input', function () {
        if ($(this).hasClass('is-invalid')) {
            $(this).removeClass('is-invalid').next('.invalid-feedback').html('');
        } else if ($(this).hasClass('is-valid')) {
            $(this).removeClass('is-valid');
        }
    });

    $(document).on('click', '[data-action="preview"]', function () {
        const url = $(this).data('url');
        const modal = $('#' + $(this).data('modal-id'));
        const title = $(this).data('title');
        modal.find('.modal-title').text(title);
        modal.find('.preview-container-modal').html('');
        previewFileFromURL(url, modal.find('.preview-container-modal'));
        modal.modal('show');
    });

    $(document).on("click", "button[action-need-confirm]", function (e) {
        let token = $('meta[name="csrf-token"]').attr('content');
        const currentButton = $(this);
        const actionType = currentButton.data("action-type") ?? "danger";
        const actionText = currentButton.data("action-text");
        const tableId = currentButton.data("table-id");
        let actionUrl = currentButton.data("action-url");
        const actionMethod = currentButton.data("action-method");

        const selectedRows = window.LaravelDataTables[tableId].rows('.selected').data().toArray().map(function (v) {
            return v.id
        });

        swal.fire({
            text: actionText.replace(/\{count\}/, selectedRows.length > 1 ? `${selectedRows.length}` : ""),
            icon: (actionType == 'danger') ? "warning" : "question",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            loaderHtml: '<span class="spinner-border w-15px h-15px " role="status" aria-hidden="true"></span>',
            showLoaderOnConfirm: true,
            preConfirm: async () => {
                let payload = {};
                if (selectedRows.length > 0) {

                    payload['id'] = selectedRows;
                    actionUrl = actionUrl.split("/").slice(0, -1).join("/");
                };
                let response = await fetch(actionUrl, {
                    method: actionMethod,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({
                        _token: token,
                        ...payload
                    })
                });
                if (response.ok) {
                    return await response.json()
                } else {
                    response = await response.json();
                    Swal.fire({
                        text: response.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: 'Yes',
                        customClass: {
                            confirmButton: 'btn btn-primary',
                        }
                    });
                    return false;
                }
            },
            allowOutsideClick: () => !Swal.isLoading(),
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            Swal.fire({
                text: result.value.message,
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                customClass: {
                    confirmButton: 'btn btn-primary',
                }
            }).then((result) => {
                window.LaravelDataTables[tableId].ajax.reload();
            });
        });
    });

    $("div[update-modal].modal").on("hide.bs.modal", function (ev) {
        if (!closeConfirmed) {
            ev.preventDefault();
            Swal.fire({
                html: "<h4>Are you sure want to cancel ?</h4>\n All change that you made , will be lost.",
                icon: "warning",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-secondary',
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    closeConfirmed = true;
                    $(this).modal('hide');
                }
            })
        } else {
            closeConfirmed = false;
        }
    })

    $("form a[cancel-btn]").click(function (ev) {
        ev.preventDefault();
        const link = $(this).attr("href");
        Swal.fire({
            html: "<h4>Are you sure want to cancel ?</h4>\n All change that you made , will be lost.",
            icon: "warning",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
            }
        })
    })

    $(".modal").each(function () {
        const modal = $(this);
        modal.on('hidden.bs.modal', function () {
            if (modal.find('form').length > 0) {
                resetForm(modal.find('form'));
            }
        })
    })

})




