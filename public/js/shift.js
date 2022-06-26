'use strict';

function AllChecked(){
	var ElementsCount = document.shiftform.elements.length; // チェックボックスの数
  const none = document.getElementById('none');
  if (document.shiftform.all.checked == true) {
    none.classList.remove("hidden");
    var tf = true;
  } else {
    none.classList.add("hidden");
    var tf = false;
  }
	for(var i=0 ; i<ElementsCount ; i++ ) {
		document.shiftform.elements[i].checked = tf; // ON・OFFを切り替え
	}
}

function　DisChecked(){
  var checks = document.shiftform.elements;
  var checksCount = 0;
  for (var i=0; i<checks.length; i++){
    if(checks[i].checked == false){
      document.shiftform.all.checked = false;
    }else{
      checksCount += 1;
      if(checksCount == checks.length){
        document.shiftform.all.checked = true;
      }
    }
  }
}
function periodChecked(period){
  if (document.shiftform.elements[period*15-5].checked) {
    var tf = true;
  } else {
    var tf = false;
  }
	for(var i=period*15 - 5 ; i<=(period+1)*15-6 ; i+=2 ) {
		document.shiftform.elements[i].checked = tf; // ON・OFFを切り替え
	}
}

function dayChecked(num){
  if (document.shiftform.elements[num].checked) {
    var tf = true;
  } else {
    var tf = false;
  }
	for(var i=(10+(num-2)*2) ; i<=85+(num-2)*2 ; i+=15 ) {
		document.shiftform.elements[i].checked = tf;  // ON・OFFを切り替え
	}
}
