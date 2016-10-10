$(document).ready(function(){

    // Logout function



    // Google sign-in

    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail());
    }

    // Track page div change

    $("#menu_dashboard").click(function(){
        $("#dashboard").show();
        $("#history").hide();
        $('#li_history').removeClass('active');
        $("#li_dashboard").addClass('active');

    });

    $("#menu_history").click(function(){
        $("#dashboard").hide();
        $("#history").show();
        $('#li_dashboard').removeClass('active');
        $("#li_history").addClass('active');
    });

    // Profile page div change

    $("#menu_profile").click(function(){
        $("#profile").show();
        $("#dogs").hide();
        $("#devices").hide();
        $('#li_profile').addClass('active');
        $('#li_dogs').removeClass('active');
        $("#li_devices").removeClass('active');
    });

    $("#menu_dogs").click(function(){
        $("#profile").hide();
        $("#dogs").show();
        $("#devices").hide();
        $('#li_profile').removeClass('active');
        $('#li_dogs').addClass('active');
        $("#li_devices").removeClass('active');
    });

    $("#menu_devices").click(function(){
        $("#profile").hide();
        $("#dogs").hide();
        $("#devices").show();
        $('#li_profile').removeClass('active');
        $('#li_dogs').removeClass('active');
        $("#li_devices").addClass('active');
    });

    // Settings page div change

    $("#menu_email").click(function(){
        $("#email").show();
        $("#password").hide();
        $('#li_password').removeClass('active');
        $("#li_email").addClass('active');

    });

    $("#menu_password").click(function(){
        $("#email").hide();
        $("#password").show();
        $('#li_email').removeClass('active');
        $("#li_password").addClass('active');
    });

});
