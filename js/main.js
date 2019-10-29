// function openNav() {
// 	document.getElementById("mySidenav").style.width = "250px";
// 	document.body.style.backgroundColor = "rgba(0,0,0,0.25)";
// }

// function closeNav() {
// 	document.getElementById("mySidenav").style.width = "0";
// 	document.body.style.backgroundColor = "#eee";
// }

// function showDropdown() {
// 	document.getElementById("myDropdown").classList.toggle("show");
// }

// window.onclick = function(event) {
// 	if (!event.target.matches(".dropbtn")) {
// 		var dropdowns = document.getElementsByClassName("dropdown-content");
// 		var i;
// 		for (i = 0; i < dropdowns.length; i++) {
// 			var openDropdown = dropdowns[i];
// 			if (openDropdown.classList.contains("show")) {
// 				openDropdown.classList.remove("show");
// 			}
// 		}
// 	}
// };

// var modal = document.getElementById("id01");

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
// 	if (event.target == modal) {
// 		modal.style.display = "none";
// 	}
// };

// Hide submenus
$('#body-row .collapse').collapse('hide');

// Collapse/Expand icon
$('#collapse-icon').addClass('fa-angle-double-left');

// Collapse click
$('[data-toggle=sidebar-colapse]').click(function () {
	SidebarCollapse();
});

function SidebarCollapse() {
	$('.menu-collapsed').toggleClass('d-none');
	$('.sidebar-submenu').toggleClass('d-none');
	$('.submenu-icon').toggleClass('d-none');
	$('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');

	// Treating d-flex/d-none on separators with title
	var SeparatorTitle = $('.sidebar-separator-title');
	if (SeparatorTitle.hasClass('d-flex')) {
		SeparatorTitle.removeClass('d-flex');
	} else {
		SeparatorTitle.addClass('d-flex');
	}

	// Collapse/Expand icon
	$('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
}