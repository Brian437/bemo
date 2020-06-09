/*
	Created by Brian Chaves
	Created on June 09, 2020
	Updated on June 09, 2020
*/
function navHambugerIconClick()
{
	document.getElementById('nav-links').classList.toggle('active');
}

window.addEventListener('resize', resizeWindow);
function resizeWindow()
{
	document.getElementById('nav-links').classList.remove('active');
}