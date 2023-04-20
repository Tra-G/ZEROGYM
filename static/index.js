// QUERY SELECTORS
const sidebarList = document.querySelector('.dashboard-lists');
const dasbBoardModal = document.querySelector('.dashboard-modal');
const openSideBar = document.querySelector('.mobile-menu-open');
const closeSidebar = document.querySelector('.mobile-menu-close');
const selectGym = document.querySelector('.selected-gym');

// Open/Show sidebar
function showSideBar() {
    let sidebar = document.querySelector('#sidebar');
    sidebar.style.left = 0;
}

// Close sideBar
function closeSideBar() {
    let sidebar = document.querySelector('#sidebar');
    sidebar.style.left = '-100%';
    
}


// closeNav when ever any part of the modal is clicked
dasbBoardModal.addEventListener('click', closeSideBar);

// Close Sidebar -- mobile view
closeSidebar.addEventListener('click', closeSideBar);

// Open side bar -- mobile view
openSideBar.addEventListener('click', showSideBar);




// Calendar Event (Library -- FullCalendar.io)
document.addEventListener('DOMContentLoaded', function() {
var calendarEl = document.getElementById('calendar');
var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
        events: [
{
start: '2023-04-05T10:00:00',
end: '2023-04-06T16:00:00',
title: 'Chest Work out',
    },

{
start: '2023-04-11T10:00:00',
end: '2023-04-12T16:00:00',
    title: 'Chest Work out',
    backgroundColor: 'red',
    color: 'blue',
},

{
    start: '2023-04-14T10:00:00',
    end: '2023-04-15T16:00:00',
    title: 'Abs',
},

{
    start: '2023-04-23T10:00:00',
    end: '2023-04-24T16:00:00',
title: 'Thigh',
},
    
{
start: '2023-04-27T10:00:00',
end: '2023-04-30T16:00:00',
    title: 'Muscles',
display: 'background'
},
    
{
start: '2023-04-14T10:00:00',
end: '2023-04-15T16:00:00',
title: 'Chest Work out',
}      
    ],

});
calendar.render();
});



