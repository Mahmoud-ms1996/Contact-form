/* global $, alert, console */

$(function (){
    
    'use strict';

    var userError = true,
        
        emailError = true,

        phoneError = true,

        msgError = true;


    // username viladation
    $('.user').blur(function(){
 
        if ($(this).val().length < 8){ // Show Error
            
            $(this).css('border', '1px solid red');
            $(this).parent().find('.errors').fadeIn(250);
            $(this).parent().find('.asterisk').fadeIn(150);
            
            userError = true;
        } else { // No Error
        
            $(this).css('border', '1px solid green');
            $(this).parent().find('.errors').fadeOut(250);
            $(this).parent().find('.asterisk').fadeOut(150);

            userError = false;
         };

    }); 

    // Email viladation
    $('.email').blur(function(){

        if ($(this).val() === ''){
            
            $(this).css('border', '1px solid red');
            $(this).parent().find('.errors').fadeIn(250);
            $(this).parent().find('.asterisk').fadeIn(150);
        
            emailError = true;
        } else {
        
            $(this).css('border', '1px solid green');
            $(this).parent().find('.errors').fadeOut(250);
            $(this).parent().find('.asterisk').fadeOut(150);

            emailError = false;
         };

    }); 

    // cellphone viladation
    $('.phone').blur(function(){
         if ($(this).val().length < 8){
            
            $(this).css('border', '1px solid red');
            $(this).parent().find('.errors').fadeIn(250);
            $(this).parent().find('.asterisk').fadeIn(150);

            phoneError = true;
        } else {
       
            $(this).css('border', '1px solid green');
            $(this).parent().find('.errors').fadeOut(250);
            $(this).parent().find('.asterisk').fadeOut(150);

            phoneError = false;
         };

    });

    // msg viladation
    $('.msg').blur(function(){
         if ($(this).val().length < 10){
            
            $(this).css('border', '1px solid red');
            $(this).parent().find('.errors').fadeIn(250);
            $(this).parent().find('.asterisk').fadeIn(150);

            msgError = true;
        } else {
        
            $(this).css('border', '1px solid green');
            $(this).parent().find('.errors').fadeOut(250);
            $(this).parent().find('.asterisk').fadeOut(150);

            msgError = false;
         };

    });
    
    // Submit Form Validation

    $('.contact-form').submit(function (e){

        if (userError === true || emailError === true || phoneError === true || msgError === true){

            e.preventDefault();

            $('.user').blur();
            $('.email').blur();
            $('.phone').blur();
            $('.msg').blur();

        }
        
    })
})