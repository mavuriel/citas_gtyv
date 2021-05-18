const opbutton = document.getElementById('buttonmodal')
const clsbutton = document.getElementById('closebutton')
const modalform = document.getElementById('modal')
const caldcont = document.getElementById('cal-container')

opbutton.addEventListener('click',openModal)
clsbutton.addEventListener('click',closeModal)

document.addEventListener('DOMContentLoaded', function() {
        let formulario  = document.querySelector('form');
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        selectable: true,
        locale:'es',

        headerToolbar: {
            left: '',
            center: 'title'
        },

        dateClick:function(info){
            alert('clicked ' + info.dateStr);
            openModal();
        },


        });

        calendar.render();

        document.getElementById('submitbtn').addEventListener('click', function(){
            const datos = new FormData(formulario);

            console.log(datos);
            console.log(formulario.title.value);
        });

    });

    function openModal(){
        caldcont.classList.add('invisible')
        modalform.classList.add('scale-100')
    }

    function closeModal(){
        modalform.classList.remove('scale-100')
        caldcont.classList.remove('invisible')
    }
