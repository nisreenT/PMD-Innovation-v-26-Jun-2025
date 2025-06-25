const hamburger = document.querySelector('.header .nav-bar .nav-list .hamburger');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header .nav-bar .nav-list ul li a');
const header = document.querySelector('.header.container');

hamburger.addEventListener('click', () => {
	hamburger.classList.toggle('active');
	mobile_menu.classList.toggle('active');
	
});

document.addEventListener('scroll', () => {
	var scroll_position = window.scrollY;
	if (scroll_position > 250) {
		header.style.backgroundColor = '#7877778c';
	} else {
		header.style.backgroundColor = 'transparent';
	}
});

menu_item.forEach((item) => {
	item.addEventListener('click', () => {
		hamburger.classList.toggle('active');
		mobile_menu.classList.toggle('active');
	});
});

var date = new Date().getFullYear();

document.getElementById("year").innerHTML = date;

//for google recaptcha 
function successCallback(token){
    'debugger';
}



//Swiper Container 



(function() {
	$('.gallery-link').magnificPopup({
	  type: 'image',
	  closeOnContentClick: true,
	  closeBtnInside: false,
	  mainClass: 'mfp-with-zoom mfp-img-mobile',
	  image: {
		verticalFit: true,
		titleSrc: function(item) {
		  return item.el.find('figcaption').text() || item.el.attr('title');
		}
	  },
	  zoom: {
		enabled: true
	  },
	  gallery: {
		enabled: true,
		navigateByImgClick: false,
		tCounter: ''
	  },
	  disableOn: function() {
		if ($(window).width() < 640) {
		  return false;
		}
		return true;
	  }
	});
  
  }).call(this);


  