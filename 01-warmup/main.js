(() => {
    'use strict';

    const bulb = document.querySelector(".bulb");
    const lightSwitch = document.querySelector(".switch");
    lightSwitch.addEventListener("change", () => {
        bulb.classList.toggle("on");
    });

})();
