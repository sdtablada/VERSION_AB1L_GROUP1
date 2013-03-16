window.onload = initialize;

//Boolean values for customer fields
var isAboutVisible = false;
var isReservationFormVisible = false;
var isServicesAvailedVisible= false;
var isActivitiesVisible = false;
var isBillsVisible = false;
//Boolean values for admin fields
var isHotelStatVisible= false;
var isRoomsStatusVisible= false;
var isServicesVisible = false;
var isAdminBillVisible= false;
var isCustCheckInVisible= false;
var isCustCheckOutVisible= false;

function initialize(){
					/*ADMIN FUNCTIONALITIES*/
	document.getElementById("checkoutOpt").onclick = slideCheckOut;
	document.getElementById("checkinOpt").onclick = slideCheckIn;
	document.getElementById("billingOpt").onclick = slideAdminBillingForm;
	document.getElementById("rmstatOpt").onclick = slideRoomStatus;
	document.getElementById("hotelstatOpt").onclick = slideHotelStatistics;
	document.getElementById("serviceOpt").onclick = slideServicesAvailable;
					
					/*CUSTOMER FUNCTIONALITIES*/
	document.getElementById("billsandexpenses").onclick = slideBills;
	document.getElementById("recentactivities").onclick = slideActivities;
	document.getElementById("services").onclick = slideServices;
	document.getElementById("roomreserve").onclick = slideReservationForm;
	document.getElementById("about").onclick = slideAbout;
	document.getElementById("signin").onclick = showSignIn;
	document.getElementById("closesign").onclick = closeSignIn; 
	document.getElementById("register").onclick = showRegForm;
	document.getElementById("close").onclick = closeRegister;
	
	
		
}
$(document).ready(function() {
    $('.slideshow').cycle({
		fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
	});
});		/*ADMIN FUNCTIONALITIES*/
//HOTEL STATISTICS
function slideHotelStatistics(){	
	if(isAdminBillVisible){
        $('#adminbillingform').slideUp(200);
        isAdminBillVisible = false;
	}
	if(isCustCheckInVisible){
        $('#checkinForm').slideUp(200);
        isCustCheckInVisible = false;
	}
	if(isCustCheckOutVisible){
        $('#checkoutForm').slideUp(200);
        isCustCheckOutVisible = false;
	}
	if(isRoomsStatusVisible){
        $('#rmstatForm').slideUp(200);
        isRoomsStatusVisible = false;
	} 
	if(isServicesAvailedVisible){
        $('#serviceForm').slideUp(200);
        isServicesAvailedVisible = false;
	}
	if(isHotelStatVisible){
        $('#hotelstatForm').slideUp(200);
        isHotelStatVisible = false;
	}
	else{
	  $('#hotelstatForm').slideDown(200);
       isHotelStatVisible = true;
	}
}
function getChart(){

	cnvs1=document.getElementById('cnvsvacant');
	cnvs2=document.getElementById('cnvsreserved');
	cnvs3=document.getElementById('cnvsoccupied');
	

	maxvacant= parseInt(document.getElementById('vacantc').value);
	maxreserved= parseInt(document.getElementById('reservedc').value);
	maxoccupied= parseInt(document.getElementById('occupiedc').value);


	ctx1=cnvs1.getContext('2d');
	ctx2=cnvs2.getContext('2d');
	ctx3=cnvs3.getContext('2d');
	
	grd1=ctx1.createLinearGradient(0,0,100,0);
	grd2=ctx2.createLinearGradient(0,0,100,0);
	grd3=ctx3.createLinearGradient(0,0,100,0);
	
	grd1.addColorStop(0,'#DADAFF');
	grd1.addColorStop(1,'#99FF99');
	grd2.addColorStop(0,'#DADAFF');
	grd2.addColorStop(1,'#4D70DB');
	grd3.addColorStop(0,'#DADAFF');
	grd3.addColorStop(1,'#751947');

	ctx1.fillStyle=grd1;
	ctx2.fillStyle=grd2;
	ctx3.fillStyle=grd3;


	ctx1.fillRect(0,0,maxvacant,30);
	ctx2.fillRect(0,0,maxreserved,30);
	ctx3.fillRect(0,0,maxoccupied,30);
}
//ROOM STATUS
function slideRoomStatus(){	
	if(isAdminBillVisible){
        $('#adminbillingform').slideUp(200);
        isServicesAvailedVisible = false;
	}
	if(isCustCheckInVisible){
        $('#checkinForm').slideUp(200);
        isCustCheckInVisible = false;
	}
	if(isCustCheckOutVisible){
        $('#checkoutForm').slideUp(200);
        isCustCheckOutVisible = false;
	}
	if(isHotelStatVisible){
        $('#hotelstatForm').slideUp(200);
        isHotelStatVisible = false;
	}
	if(isServicesAvailedVisible){
        $('#serviceForm').slideUp(200);
        isServicesAvailedVisible = false;
	}
	if(isRoomsStatusVisible){
        $('#rmstatForm').slideUp(200);
        isRoomsStatusVisible = false;
	} 
	else{
	  $('#rmstatForm').slideDown(200);
       isRoomsStatusVisible = true;
	}
}
// ADD/DELETE SERVICES
function slideServicesAvailable(){	
	if(isAdminBillVisible){
        $('#adminbillingform').slideUp(200);
        isAdminBillVisible = false;
	}
	if(isCustCheckInVisible){
        $('#checkinForm').slideUp(200);
        isCustCheckInVisible = false;
	}
	if(isCustCheckOutVisible){
        $('#checkoutForm').slideUp(200);
        isCustCheckOutVisible = false;
	}
	if(isRoomsStatusVisible){
        $('#rmstatForm').slideUp(200);
        isRoomsStatusVisible = false;
	} 
	if(isHotelStatVisible){
        $('#hotelstatForm').slideUp(200);
        isHotelStatVisible = false;
	}
	if(isServicesAvailedVisible){
        $('#serviceForm').slideUp(200);
        isServicesAvailedVisible = false;
	}
	else{
	  $('#serviceForm').slideDown(200);
       isServicesAvailedVisible = true;
	}
}
// BILL CUSTOMER
function slideAdminBillingForm(){
	if(isCustCheckInVisible){
        $('#checkinForm').slideUp(200);
        isCustCheckInVisible = false;
	}
	if(isCustCheckOutVisible){
        $('#checkoutForm').slideUp(200);
        isCustCheckOutVisible = false;
	}
	if(isRoomsStatusVisible){
        $('#rmstatForm').slideUp(200);
        isRoomsStatusVisible = false;
	} 
	if(isHotelStatVisible){
        $('#hotelstatForm').slideUp(200);
        isHotelStatVisible = false;
	}
	if(isServicesAvailedVisible){
        $('#serviceForm').slideUp(200);
        isServicesAvailedVisible = false;
	}
	if(isAdminBillVisible){
        $('#adminbillingform').slideUp(200);
        isAdminBillVisible = false;
	}
	else{
	  $('#adminbillingform').slideDown(200);
       isAdminBillVisible = true;
	}
}
//CHECK-IN
function slideCheckIn(){	
	if(isAdminBillVisible){
        $('#adminbillingform').slideUp(200);
        isAdminBillVisible = false;
	}
	if(isCustCheckOutVisible){
        $('#checkoutForm').slideUp(200);
        isCustCheckOutVisible = false;
	}
	if(isRoomsStatusVisible){
        $('#rmstatForm').slideUp(200);
        isRoomsStatusVisible = false;
	} 
	if(isHotelStatVisible){
        $('#hotelstatForm').slideUp(200);
        isHotelStatVisible = false;
	}
	if(isServicesAvailedVisible){
        $('#serviceForm').slideUp(200);
        isServicesAvailedVisible = false;
	}
	if(isCustCheckInVisible){
        $('#checkinForm').slideUp(200);
        isCustCheckInVisible = false;
	}
	else{
	  $('#checkinForm').slideDown(200);
       isCustCheckInVisible = true;
	}
}
//CHECK-OUT
function slideCheckOut(){	
	if(isAdminBillVisible){
        $('#adminbillingform').slideUp(200);
        isAdminBillVisible = false;
	}
	if(isCustCheckInVisible){
        $('#checkinForm').slideUp(200);
        isCustCheckInVisible = false;
	}
	if(isRoomsStatusVisible){
        $('#rmstatForm').slideUp(200);
        isRoomsStatusVisible = false;
	} 
	if(isHotelStatVisible){
        $('#hotelstatForm').slideUp(200);
        isHotelStatVisible = false;
	}
	if(isServicesAvailedVisible){
        $('#serviceForm').slideUp(200);
        isServicesAvailedVisible = false;
	}
	if(isCustCheckOutVisible){
        $('#checkoutForm').slideUp(200);
        isCustCheckOutVisible = false;
	}
	else{
	  $('#checkoutForm').slideDown(200);
       isCustCheckOutVisible = true;
	}
}
								/*CUSTOMER FUNCTIONALITIES*/ 
//REGISTER
function showRegForm(){
    $('#darkoverlay').fadeIn(150);
    $('#regform').fadeIn(250);
}
function closeRegister(){
    $('#darkoverlay').fadeOut(150);
    $('#regform').fadeOut(250);
}
//SIGN IN
function showSignIn(){
    $('#darkoverlay').fadeIn(150);
    $('#signinform').fadeIn(250);
}
function closeSignIn(){
    $('#darkoverlay').fadeOut(150);
    $('#signinform').fadeOut(250);
}

//ABOUT THE HOTEL
function slideAbout(){	
	if(isServicesVisible){
        $('#listofservices').slideUp(200);
        isServicesVisible = false;
	}
	if(isActivitiesVisible){
        $('#listofactivities').slideUp(200);
        isActivitiesVisible = false;
	}/*
	if(isBillsVisible){
        $('#billingrecords').slideUp(200);
        isBillsVisible = false;
	} */
	if(isReservationFormVisible){
        $('#reserveroom').slideUp(200);
        isReservationFormVisible = false;
	}
	
	if(isAboutVisible){
        $('#aboutatalia').slideUp(200);
        isAboutVisible = false;
	}
	else{
	  $('#aboutatalia').slideDown(200);
       isAboutVisible = true;
	}
}
// RESERVE ROOM
function slideReservationForm(){	
	if(isServicesVisible){
        $('#listofservices').slideUp(200);
        isServicesVisible = false;
	}
	if(isActivitiesVisible){
        $('#listofactivities').slideUp(200);
        isActivitiesVisible = false;
	}
	if(isBillsVisible){
        $('#billingrecords').slideUp(200);
        isBillsVisible = false;
	}
	if(isAboutVisible){
        $('#aboutatalia').slideUp(200);
        isAboutVisible = false;
	}
	if(isReservationFormVisible){
        $('#reserveroom').slideUp(200);
        isReservationFormVisible = false;
	}
	else{
	  $('#reserveroom').slideDown(200);
       isReservationFormVisible = true;
	}
}
// AVAIL SERVICE
function slideServices(){	
	if(isActivitiesVisible){
        $('#listofactivities').slideUp(200);
        isActivitiesVisible = false;
	}
	if(isBillsVisible){
        $('#billingrecords').slideUp(200);
        isBillsVisible = false;
	}
	if(isReservationFormVisible){
        $('#reserveroom').slideUp(200);
        isReservationFormVisible = false;
	}
	if(isAboutVisible){
        $('#aboutatalia').slideUp(200);
        isAboutVisible = false;
	}
	if(isServicesVisible){
        $('#listofservices').slideUp(200);
        isServicesVisible = false;
	}
	else{
	  $('#listofservices').slideDown(200);
       isServicesVisible = true;
	}
}
// RECENT ACTIVITIES
function slideActivities(){	
	if(isServicesVisible){
        $('#listofservices').slideUp(200);
        isServicesVisible = false;
	}
	
	if(isBillsVisible){
        $('#billingrecords').slideUp(200);
        isBillsVisible = false;
	}
	if(isReservationFormVisible){
        $('#reserveroom').slideUp(200);
        isReservationFormVisible = false;
	}
	if(isAboutVisible){
        $('#aboutatalia').slideUp(200);
        isAboutVisible = false;
	}
	if(isActivitiesVisible){
        $('#listofactivities').slideUp(200);
        isActivitiesVisible = false;
	}
	else{
	  $('#listofactivities').slideDown(200);
       isActivitiesVisible = true;
	}
}
//VIEW BILLS
function slideBills(){	
	if(isServicesVisible){
        $('#listofservices').slideUp(200);
        isServicesVisible = false;
	}
	if(isActivitiesVisible){
        $('#listofactivities').slideUp(200);
        isActivitiesVisible = false;
	}
	
	if(isReservationFormVisible){
        $('#reserveroom').slideUp(200);
        isReservationFormVisible = false;
	}
	if(isAboutVisible){
        $('#aboutatalia').slideUp(200);
        isAboutVisible = false;
	}
	if(isBillsVisible){
        $('#billingrecords').slideUp(200);
        isBillsVisible = false;
	}
	else{
	  $('#billingrecords').slideDown(200);
       isBillsVisible = true;
	}
}

				/* FORM VALIDATION */
function validateForm(){
     var x1 = document.forms["addservice"]["servicename"].value;
     var x2 = document.forms["addservice"]["servicecharge"].value;
     
	 // assign patterns for input
     var letters = /^[A-Za-z" "\-]{4,25}$/;
     var numbers = /^[0-9]{2,5}$/;
     
     if (x1 == null || x1 == "" || x2 == null || x2 == "" || x1 < 4 || x2 < 2) {
          alert("Please fill all fields appropriately.");
          return false;
     }
     if(!x1.match(letters)){
          alert('Service name must have 4-20 characters');
          return false;
     }
     if(!x2.match(numbers)){
          alert('Service charge must be numeric (10-10000) only');
          return false;
     }
     else {
        return true;
     }
}

function updatelength(field, output) {
    curr_length = document.getElementById(field).value.length;
    field_mlen = document.getElementById(field).maxlength;
    document.getElementById(output).innerHTML = curr_length+'/'+field_mlen;
    return 1;
}

function check_v_pass(field, output) {
    pass_buf_value = document.getElementById(field).value;
    pass_level = 0;
    if (pass_buf_value.match(/[a-z]/g)) {
        pass_level++;
    }
    if (pass_buf_value.match(/[A-Z]/g)) {
        pass_level++;
    }
    if (pass_buf_value.match(/[0-9]/g)) {
        pass_level++;
    }
    if (pass_buf_value.length < 5) {
        if(pass_level >= 1) pass_level--;
    } else if (pass_buf_value.length >= 20) {
        pass_level++;
    }
    output_val = '';
    switch (pass_level) {
        case 1: output_val='Weak'; break;
        case 2: output_val='Normal'; break;
        case 3: output_val='Strong'; break;
        case 4: output_val='Very strong'; break;
        default: output_val='Very weak'; break;
    }
    if (document.getElementById(output).value != pass_level) {
        document.getElementById(output).value = pass_level;
        document.getElementById(output).innerHTML = output_val;
    }
    return 1;
}

function compare_valid(field, field2) {
    fld_val = document.getElementById(field).value;
    fld2_val = document.getElementById(field2).value;
    if (fld_val == fld2_val) {
        update_css_class(field2, 2);
        p_valid_r = 1;
    } else {
        update_css_class(field2, 1);
        p_valid_r = 0;
    }
    return p_valid_r;
}

function check_v_mail(field) {
    fld_value = document.getElementById(field).value;
    is_m_valid = 0;
    if (fld_value.indexOf('@') >= 1) {
        m_valid_dom = fld_value.substr(fld_value.indexOf('@')+1);
        if (m_valid_dom.indexOf('@') == -1) {
            if (m_valid_dom.indexOf('.') >= 1) {
                m_valid_dom_e = m_valid_dom.substr(m_valid_dom.indexOf('.')+1);
                if (m_valid_dom_e.length >= 1) {
                    is_m_valid = 1;
                }
            }
        }
    }
    if (is_m_valid) {
        update_css_class(field, 2);
        m_valid_r = 1;
    } else {
        update_css_class(field, 1);
        m_valid_r = 0;
    }
    return m_valid_r;
}

function valid_length(field) {
    length_df = document.getElementById(field).value.length;
    if (length_df >= 1 && length_df <= document.getElementById(field).maxLength) {
        update_css_class(field, 2);
        ret_len = 1;
    } else {
        update_css_class(field, 1);
        ret_len = 0;
    }
    return ret_len;
}

function update_css_class(field, class_index) {
    if (class_index == 1) {
        class_s = 'wrong';
    } else if (class_index == 2) {
        class_s = 'correct';
    }
    document.getElementById(field).className = class_s;
    return 1;
}

function change_password_type(field){
	document.getElementById(field).type="password";
}

function validate_all(output) {
    t1 = valid_length('uname');
    t2 = valid_length('firstname');
	t3 = valid_length('lastname');
	t4 = valid_length('address');
	t5 = check_v_mail('email');
	t6 = valid_length('pword');
	t7 = compare_valid('pword', 'repassword');
    t8 = check_v_pass('pword', 'pass_result');
	
    errorlist = '';
    if (! t1) {
        errorlist += 'Invalid/Missing Username<br />';
    }
    if (! t2) {
        errorlist += 'Invalid/Missing First Name<br />';
    }
	 if (! t3) {
        errorlist += 'Invalid/Missing Last Name<br />';
    }
	 if (! t4) {
        errorlist += 'Invalid/Missing Address<br />';
    }
	 if (! t5) {
        errorlist += 'Invalid/Missing Email<br />';
    }
    if (! t6) {
        errorlist += 'Invalid/Missing Password<br />';
    }
    if (! t7) {
        errorlist += 'Passwords do not match<br />';
    }
    if (errorlist) {
        document.getElementById(output).innerHTML = errorlist;
        
		return false;
    }
    return true;
}

function validate_dates(field1,field2){
	fldv1 = document.getElementById(field1).value;
	fldv2 = document.getElementById(field2).value;
	
	if(new Date(fldv1) > new Date(fldv2)){
		update_css_class(field2, 1);
		update_css_class(field1, 1);
        ret_len = 0;
	}else{
		ret_len = 1;
	}
	return ret_len;
}

function validate_reservation(output){
    t1 = valid_length('arr');
    t2 = valid_length('dep');
	t3 = validate_dates('arr','dep');
	
    errorlist = '';
    if (! t1) {
        errorlist += 'Invalid Arrival date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    }
    if (! t2) {
        errorlist += 'Invalid Departure date ';
    }
	if (! t3) {
        errorlist += 'Invalid Arrival/Departure date';
    }
    if (errorlist) {
        document.getElementById(output).innerHTML = errorlist;
		return false;
    }
    return true;
}

function validate_walkin(output) {
    t1 = valid_length('loginid');
    t2 = valid_length('firstname1');
	t3 = valid_length('lastname1');
	t4 = valid_length('address1');
	t5 = check_v_mail('email1');
	t6 = valid_length('contact');
	t7 = valid_length('room');
	
    errorlist = '';
    if (! t1) {
        errorlist += 'Invalid/Missing Login ID<br />';
    }
    if (! t2) {
        errorlist += 'Invalid/Missing First Name<br />';
    }
	 if (! t3) {
        errorlist += 'Invalid/Missing Last Name<br />';
    }
	 if (! t4) {
        errorlist += 'Invalid/Missing Address<br />';
    }
	 if (! t5) {
        errorlist += 'Invalid/Missing Email<br />';
    }
    if (! t6) {
        errorlist += 'Invalid/Missing Contact Number<br />';
    }
	if (! t7) {
        errorlist += 'Invalid/Missing Room Number<br />';
    }
    if (errorlist) {
        document.getElementById(output).innerHTML = errorlist;   
		return false;
    }
    return true;
}

function validate_checkout(output){
	    t1 = valid_length('outroom');
	
  errorlist = '';
    if (! t1) {
        errorlist += 'Missing Room Number<br />';
    }

	if (errorlist) {
        document.getElementById(output).innerHTML = errorlist;   
		return false;
    }
    return true;
	
}

function validateForm(){
     var x1 = document.forms["addservice"]["servicename"].value;
     var x2 = document.forms["addservice"]["servicecharge"].value;
     
	 // assign patterns for input
     var letters = /^[A-Za-z" "\-]{4,25}$/;
     var numbers = /^[0-9]{2,5}$/;
     
     if (x1 == null || x1 == "" || x2 == null || x2 == "" || x1 < 4 || x2 < 2) {
          alert("Please fill all fields appropriately.");
          return false;
     }
     if(!x1.match(letters)){
          alert('Service name must have 4-20 characters');
          return false;
     }
     if(!x2.match(numbers)){
          alert('Service charge must be numeric (10-10000) only');
          return false;
     }
     else {
        return true;
     }
}