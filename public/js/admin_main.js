let sidebar = "close";

let toggleSidebar = function () {
    let getMainCont = document.querySelector('.main-cont');
    let getSideBar = document.querySelector('.side-bar');
    let getSideMenu = document.querySelector('.side-menu');


    if (sidebar === "close"){
        getMainCont.style.marginLeft = "50px";
        getSideBar.style.width = "150px";
        getSideMenu.style.opacity = "1";

        sidebar = "open"
    }else if (sidebar === "open"){
        getMainCont.style.marginLeft = "50px";
        getSideBar.style.width = "50px";
        getSideMenu.style.opacity = "0";

        sidebar = "close";
    }
};