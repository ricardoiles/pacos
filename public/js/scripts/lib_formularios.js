function CmbValue(id){
	

	if(document.getElementById(id).value == 0){
           document.getElementById(id).value ="1";
	}else{
	   document.getElementById(id).value="0";
	   
	}

}
function modalOpen(){
	var btnabrir = document.getElementById("modalAddCategory");
	btnabrir.classList.add('is-active','is-clipped');
	
}
function modalClose(){
	var btnabrir = document.getElementById("modalAddCategory");
	btnabrir.classList.remove('is-active','is-clipped');
	
}
