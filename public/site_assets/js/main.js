
/*jquery for pre loader */
jQuery(window).on('load', function () { 
    jQuery('#status').delay(600).fadeOut(); 
    jQuery('#preloader').delay(600).fadeOut('slow');  
    jQuery('body').delay(1500).css({ 'overflow': 'visible' });
})


// js for scroll to top 

var scrollbtn = document.querySelector('.scroll');

window.onscroll = function(){
    if (scrollY > 300){
        scrollbtn.classList.add('show')
    }
    else{
        scrollbtn.classList.remove('show')
    }
}

scrollbtn.onclick = function(){
    window.scrollTo({
        top:0 ,
        behavior : 'smooth'
    })
}

// js for showing available unit 
var show_available_btn = document.querySelector(".show-available");
var available_message = document.querySelector(".available-message");
show_available_btn.onclick = function(){
    available_message.style.right = "2%"
}
var close_available_btn = document.querySelector(".available-message .close");
close_available_btn.onclick = function(){
    available_message.style.right = "-100%"
}


