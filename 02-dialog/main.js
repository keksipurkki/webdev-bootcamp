(() => {
  const dialog = document.querySelector('.dialog');

  const dialogEventHandler = handlers => event => {
    const action = event.target.getAttribute('aria-label');
    if (handlers[action]) {
      handlers[action](event.target.closest('.dialog'));
    }
  };

  const accept = dialog => {
    dialog.classList.add('animated', 'zoomOut');
  };

  const close = dialog => {
    dialog.classList.add('animated', 'fadeOut');
  };

  const cancel = dialog => {
    dialog.classList.add('animated', 'rollOut');
  };

  if (dialog) {
    dialog.addEventListener(
      'click',
      dialogEventHandler({
        close,
        accept,
        cancel,
      }),
    );
  }
})();
