// QUERY SELECTORS
const sidebarList = document.querySelector('.dashboard-lists');
const dasbBoardModal = document.querySelector('.dashboard-modal');
const openSideBar = document.querySelector('.mobile-menu-open');
const closeSidebar = document.querySelector('.mobile-menu-close');
const selectGym = document.querySelector('.selected-gym');
const hamburger = document.querySelector(".hamburger");
const menu = document.querySelector(".navlinks ul");

// handle menu toggle on mobile screens
hamburger.addEventListener("click", function() {
  menu.classList.toggle("show");
});



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




// Event Listener to handle side bar
sidebarList.addEventListener('click', (e) => {
    const displayHeading = document.querySelector('.display-heading');
    const welcomeMsg = document.querySelector('.welcome');
    let contentHeader = '';

    // Hide Welcome Msg
    welcomeMsg.style.display = 'none';
    const target = e.target;
    lists = document.querySelectorAll('.dashboard-list');
    lists.forEach(list => {
        // remove active class when a list is clicked
        if (list.classList.contains('active')) {
            list.classList.remove('active');
        }
        // set active classs 
        if (list == target) {
            list.classList.add('active');
            contentHeader = list.lastChild.innerHTML;
        }
    })
    
    const modalName = target.getAttribute('data-modal');
    displayHeading.innerHTML = contentHeader;
    // Show the modal for the clicked item
    displayModal(modalName);
    handleResetGymBtn();
    closeSideBar();
});

// Reset Selected Gym Button Options to Original State
function handleResetGymBtn() {
    document.querySelector('.selected-gym-btns').style.display = 'flex';
    document.querySelector('.view-gym').style.display = 'none';
    document.querySelector('.gym-options').style.display = 'none';
}

// handle select and change gym
selectGym.addEventListener('click', (e) => {
    let target = e.target;

    if (target.classList.contains('view-btn')) {
        document.querySelector('.selected-gym-btns').style.display = 'none';
        document.querySelector('.view-gym').style.display = 'block';
    }
    else if (target.classList.contains('change-btn')) {
        document.querySelector('.selected-gym-btns').style.display = 'none';
        document.querySelector('.gym-options').style.display = 'block';
    }
    else {
        return;
    }
})


// Function to handle modal_display
function displayModal(modalName) {
    const modalContainer = document.querySelectorAll('.modal-content');
    
    // Set hide modal contents
    modalContainer.forEach((element) => element.style.display = 'none');
    const modalContent = document.querySelector(`.${modalName}`);
    // display the modal
    modalContent.style.display = 'block';
}

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



