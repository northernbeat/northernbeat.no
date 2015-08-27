// // JavaScript Document

// var mainmenu = document.querySelector("#mainmenu");
// var hamburger = document.querySelector(".hamburger");
// var profiles = document.querySelectorAll(".profile");
// var currentProfile;

// function addClass(element, classToAdd) {
//     var currentClassValue = element.className;
      
//     if (currentClassValue.indexOf(classToAdd) == -1) {
//         if ((currentClassValue == null) || (currentClassValue === "")) {
//             element.className = classToAdd;
//         } else {
//             element.className += " " + classToAdd;
//         }
//     }
// }
 
// function removeClass(element, classToRemove) {
//     var currentClassValue = element.className;
 
//     if (currentClassValue == classToRemove) {
//         element.className = "";
//         return;
//     }
 
//     var classValues = currentClassValue.split(" ");
//     var filteredList = [];
 
//     for (var i = 0 ; i < classValues.length; i++) {
//         if (classToRemove != classValues[i]) {
//             filteredList.push(classValues[i]);
//         }
//     }
 
//     element.className = filteredList.join(" ");
// }


// // ÅPNE & LUKKE MENY
// function showMenu() {
// 	//alert("show");
// 	removeClass(mainmenu, "hidden");
// 	addClass(hamburger, "active");
// }
// function hideMenu() {
// 	addClass(mainmenu, "hidden");
// 	removeClass(hamburger, "active");
// }
// function toggleMenu(toggle) {
// 	toggle.addEventListener( "click", function(e) {
// 		e.preventDefault();
// 		(this.classList.contains("active") === true) ? hideMenu() : showMenu();
// 	});
// }
// toggleMenu(hamburger);


// // ÅPNE & LUKKE PROFILER
// function activateProfile(profile) {
// 	profile.addEventListener( "click", function(e) {
// 		e.preventDefault();
// 		(currentProfile.classList.contains("active") === true) ? removeClass(profile, "active") : null;
// 		//removeClass(currentProfile, "active");
// 		//(this.classList.contains("active") === true) ? removeClass(profile, "active") : addClass(profile, "active");
// 		addClass(profile, "active");
// 		currentProfile = profile;
// 	});
// }
// for (var i = profiles.length - 1; i >= 0; i--) {
//     var profile = profiles[i];
//     activateProfile(profile);
//   };


// // HØNA TIL ANDERS
// var fadeStart=600 // 100px scroll or less will equiv to 1 opacity
//     ,fadeUntil=$(document).height() - 1200 // 200px scroll or more will equiv to 0 opacity
//     ,fading = $('.anders')
// ;

// $(window).bind('scroll', function(){
//     var offset = $(document).scrollTop()
//         ,opacity=1
//     ;
//     if( offset<=fadeStart ){
//         opacity=0;
//     }else if( offset<=fadeUntil ){
//         opacity=0+offset/(fadeUntil);
//     }
//     fading.css('opacity',opacity);
// });
