"use strict";

// Class Definition
var KTSigninTwoSteps = function() {
    // Elements
    var form;
    var handleType = function() {
        var input1 = form.querySelector("[data-id=code_1]");
        var input2 = form.querySelector("[data-id=code_2]");
        var input3 = form.querySelector("[data-id=code_3]");
        var input4 = form.querySelector("[data-id=code_4]");
        var input5 = form.querySelector("[data-id=code_5]");
        var input6 = form.querySelector("[data-id=code_6]");

        input1.focus();

        input1.addEventListener("keyup", function() {
            if (this.value.length === 1) {
                input2.focus();
            }
        });

        input2.addEventListener("keyup", function() {
            if (this.value.length === 1) {
                input3.focus();
            }
        });

        input3.addEventListener("keyup", function() {
            if (this.value.length === 1) {
                input4.focus();
            }
        });

        input4.addEventListener("keyup", function() {
            if (this.value.length === 1) {
                input5.focus();
            }
        });

        input5.addEventListener("keyup", function() {
            if (this.value.length === 1) {
                input6.focus();
            }
        });
        
        input6.addEventListener("keyup", function() {
            if (this.value.length === 1) {
                input6.blur();
            }
        });
    }    

    // Public functions
    return {
        // Initialization
        init: function() {
            form = document.querySelector('#kt_sing_in_two_steps_form');
            handleType();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTSigninTwoSteps.init();
});