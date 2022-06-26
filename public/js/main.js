'use strict';

function openModal(id){
	var element = document.getElementById(id);
	element.classList.remove("hidden");
}

function closeModal(id){
	var element = document.getElementById(id);
	element.classList.add("hidden");
}

function logoutFlash(){
	logout.classList.remove("hidden");
}

function openMenu(id) {
  var element = document.getElementById(id);
	element.classList.remove("hidden");
	if (id != "header-left") {
		mask.classList.remove("hidden");
	}
}

function closeMenu(id) {
  var element = document.getElementById(id);
	element.classList.add("hidden");
	if (id != "header-left") {
		mask.classList.add("hidden");
	}
}

function noneQuestion(){
	window.alert('現在、受講可能な質問はありません。');
}


function noneTeacher(){
	window.alert('対応できる講師がいません。');
}
