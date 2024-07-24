import "./bootstrap";

import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

// gestisco l'icona della item list in dashboard

document.addEventListener("DOMContentLoaded", function () {
    const submenu = document.getElementById("projectSubmenu");
    const submenuToggle = document.getElementById("projectSubmenuToggle");
    const submenuIcon = document.getElementById("submenuIcon");

    submenu.addEventListener("show.bs.collapse", function () {
        submenuIcon.classList.remove("fa-angle-down");
        submenuIcon.classList.add("fa-angle-up");
    });

    submenu.addEventListener("hide.bs.collapse", function () {
        submenuIcon.classList.remove("fa-angle-up");
        submenuIcon.classList.add("fa-angle-down");
    });
});
