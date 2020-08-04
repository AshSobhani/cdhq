// Get Modal Element
var modal = document.getElementById('simpleModal');
// Open Modal Button
var modalBtn = document.getElementById('modalBtn');
// Close Modal Button
var closeBtn = document.getElementsByClassName('closeBtn')[0];

// openModal Function
function openModal(){
    modal.style.display = 'block';
}
// closeModal Function
function closeModal(){
    modal.style.display = 'none';
}
// clickOutside Function
function clickOutside(e){
    if(e.target == modal){
        modal.style.display = 'none';
    }
}

// Listen For Open Click
modalBtn.addEventListener('click', openModal);
// Listen For Close Click
closeBtn.addEventListener('click', closeModal);
// Listen For Outside Click
window.addEventListener('click', clickOutside);

