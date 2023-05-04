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







