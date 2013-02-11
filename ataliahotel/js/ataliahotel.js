window.onload = initialize;

var isAccomodationsVisible = false;
var isOptionsVisible = false;
var isLoginVisible = false;
var isSignUpVisible = false;

function initialize(){
    document.getElementById("btnAccomodations").onclick = slideAccomodations;
	document.getElementById("btnOptions").onclick = slideOptions;
	document.getElementById("btnLogin").onclick = slideLogin;
	document.getElementById("signup").onclick = slideSignUpForm;
}

function slideAccomodations(){
    if(isOptionsVisible){
        $('#optionsForm').slideUp(200);
        isOptionsVisible = false;
    }
    if(isLoginVisible){
        $('#loginForm').slideUp(200);
        isLoginVisible = false;
    }
	if(isSignUpVisible){
        $('#signUpForm').slideUp(200);
        isSignUpVisible = false;
    }
	if(isAccomodationsVisible){
        $('#accomodations').slideUp(200);
        isAccomodationsVisible = false;
    }
    else{
        $('#accomodations').slideDown(200);
        isAccomodationsVisible = true;
    }
}
function slideOptions(){
    if(isAccomodationsVisible){
        $('#accomodations').slideUp(200);
        isAccomodationsVisible = false;
    }
    if(isLoginVisible){
        $('#loginForm').slideUp(200);
        isLoginVisible = false;
    }
	if(isSignUpVisible){
        $('#signUpForm').slideUp(200);
        isSignUpVisible = false;
    }
	if(isOptionsVisible){
        $('#optionsForm').slideUp(200);
        isOptionsVisible = false;
    }
    else{
        $('#optionsForm').slideDown(200);
        isOptionsVisible = true;
    }
}
function slideLogin(){
    if(isAccomodationsVisible){
        $('#accomodations').slideUp(200);
        isAccomodationsVisible = false;
    }
    if(isOptionsVisible){
        $('#optionsForm').slideUp(200);
        isOptionsVisible = false;
    }
	if(isLoginVisible){
        $('#loginForm').slideUp(200);
        isLoginVisible = false;
    }
	if(isSignUpVisible){
        $('#signUpForm').slideUp(200);
        isSignUpVisible = false;
    }
    else{
        $('#loginForm').slideDown(200);
        isLoginVisible = true;
    }
}

function slideSignUpForm(){
    if(isAccomodationsVisible){
        $('#accomodations').slideUp(200);
        isAccomodationsVisible = false;
    }
    if(isOptionsVisible){
        $('#optionsForm').slideUp(200);
        isOptionsVisible = false;
    }
	if(isLoginVisible){
        $('#loginForm').slideUp(200);
        isLoginVisible = false;
		$('#signUpForm').slideDown(200);
        isSignUpVisible = true;
	}   
}