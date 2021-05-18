/* function openModal(key) {
    document.getElementById(key).showModal();
    document.body.setAttribute('style', 'overflow: hidden;');
    document.getElementById(key).children[0].scrollTop = 0;
    document.getElementById(key).children[0].classList.remove('opacity-0');
    document.getElementById(key).children[0].classList.add('opacity-100')
}

function modalClose(key) {
    document.getElementById(key).children[0].classList.remove('opacity-100');
    document.getElementById(key).children[0].classList.add('opacity-0');
    setTimeout(function () {
        document.getElementById(key).close();
        document.body.removeAttribute('style');
    }, 100);
}
 */

const button = document.getElementById('buttonmodal')
const closebutton = document.getElementById('closebutton')
const modal = document.getElementById('modal')
const calcont = document.getElementById('cal-container')


button.addEventListener('click',openModal)
closebutton.addEventListener('click',closeModal)

function openModal(){
    calcont.classList.add('invisible')
    modal.classList.add('scale-100')
}

function closeModal(){
    modal.classList.remove('scale-100')
    calcont.classList.remove('invisible')
}

