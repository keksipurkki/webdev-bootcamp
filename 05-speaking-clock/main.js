(() => {
    'use strict';

    const clock = document.getElementById("clock");
    const tick = clock => clock.textContent = new Date().toLocaleTimeString();
    setInterval(tick, 1000, clock);

    const speaker = document.getElementById("clock-say");
    speaker.addEventListener("click", () => {
        const url = `time.php?tz=Europe/Helsinki&time=${new Date().getTime()}`;
        const audio = new Audio(url);
        audio.load();
        audio.play();     
    });

})();
