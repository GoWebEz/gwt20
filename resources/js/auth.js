$(document).ready(function () {

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $('#login-form').validate({
        rules: {
            // input fields
            user_name: {
                required: true,
            },
            password: {
                required: true,
            },

        },
        // input fields error mesaages
        messages: {
            user_name: {
                required: 'Username is required.',
            },
            password: {
                required: 'Password is required.',
            },
        },
        highlight: function(element) 
        {
            $(element).addClass("is-invalid");
        },
        unhighlight: function(element) 
        {
            $(element).removeClass("is-invalid");
        }
        
    })

    $('#forgot-password').validate({
        rules: {
            // input fields
            name_email: {
                required: true,
            },
            last_name: {
                required: true,
            },
        },
        // input fields error mesaages
        messages: {
            name_email: {
                required: 'Username or Email is required.',
            },
            last_name: {
                required: 'Lastname is required.',
            },
        },
        highlight: function(element) 
        {
            $(element).addClass("is-invalid");
        },
        unhighlight: function(element) 
        {
            $(element).removeClass("is-invalid");
        }
    })

    // reset form input validation    
    $('#reset-form').validate({ 
        rules : {
            // input fields
            email : {  
                required: true,  
                email: true,
            },
            new_password : 
            {  required: true,  
                minlength: 8,
            },
            confirm_password : 
            {   
                required: true,  
                equalTo: "#new_password"
            }
        }, 
            // input fields error mesaages 
        messages : { 
            email : 
            {
                required : 'Email is required.',
                email : "Email must be a valid email address.",
            },
            new_password : 
            {
                required : 'Password is required.',
                minlength: "Password must be at least 8 characters."
            },
            confirm_password : 
            {
                required : 'Confirm password is required.',
                equalTo: "Password and confirm password should same."
            }
        },
        highlight: function(element) 
        {
            $(element).addClass("is-invalid");
        },
        unhighlight: function(element) 
        {
            $(element).removeClass("is-invalid");
        }
    });

    $('.login').on('click', function (e) {
        e.preventDefault();
        if (!$('#login-form').valid()) {
            return;
        }
        $('.loader-container').removeClass('d-none');
        $.ajax({
            url: '/login',
            type: 'POST',
            data: $("#login-form").serialize(),
            dataType: 'JSON',
            async: false
        }).done(function (response) {
            $('.loader-container').addClass('d-none');
            if (response['status'] == 'Success') {
                toastr.success(response['message']);
                window.location.href = '/home';
            }
            if (response['status'] == 'error') {
                toastr.error(response['message']);
            }
        }).fail(function (error) {
            $('.loader-container').addClass('d-none');
            toastr.error(error['message']);
        })
    });

    $('.forgot-password').on('click', function (e) {
        e.preventDefault();
        if (!$('#forgot-password').valid()) {
            return;
        }
        $('.loader-container').removeClass('d-none');
        $.ajax({
            url: '/password-reset',
            type: 'POST',
            data: $("#forgot-password").serialize(),
            dataType: 'JSON',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            async: false
        }).done(function (response) {
            $('.loader-container').addClass('d-none');
            if (response['status'] == 'Success') {
                toastr.success(response['message']);
                window.location.href = '/thankyou';
            }
            if (response['status'] == 'error') {
                console.log('d');
                toastr.error(response['message']);
            }
        }).fail(function (error) {
            $('.loader-container').addClass('d-none');
            toastr.error(error['message']);
        })

    })

    $('.reset-password').on('click', function (e) {
        e.preventDefault();
        if (!$('#reset-form').valid()) {
            return;
        }
        $('.loader-container').removeClass('d-none');
        $.ajax({
            url: '/update-password',
            type: 'POST',
            data: $("#reset-form").serialize(),
            dataType: 'JSON',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            async: false
        }).done(function (response) {
            $('.loader-container').addClass('d-none');
            if (response['status'] == 'Success') {
                toastr.success(response['message']);
                window.location.href = '/thankyou';
            }
            if (response['status'] == 'error') {
                console.log('d');
                toastr.error(response['message']);
            }
        }).fail(function (error) {
            $('.loader-container').addClass('d-none');
            toastr.error(error['message']);
        })

    })

})