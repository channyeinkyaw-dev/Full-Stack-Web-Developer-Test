(function () {
  const header = document.querySelector('.site-header');
  const toggle = document.querySelector('.site-header__toggle');
  const nav = document.querySelector('#primary-navigation');

  if (header && toggle && nav) {
    toggle.addEventListener('click', () => {
      const isOpen = header.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', String(isOpen));
      toggle.setAttribute('aria-label', isOpen ? 'Close navigation' : 'Open navigation');
    });

    nav.addEventListener('click', (event) => {
      if (event.target.closest('a')) {
        header.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'Open navigation');
      }
    });
  }

  document.querySelectorAll('.signup-form').forEach((form) => {
    const input = form.querySelector('input[type="email"]');
    const message = form.querySelector('.signup-form__message');
    const success = form.getAttribute('data-success') || 'Thanks. You are on the list.';

    form.addEventListener('submit', (event) => {
      event.preventDefault();
      form.classList.remove('is-invalid', 'is-valid');

      if (!input || !input.checkValidity()) {
        form.classList.add('is-invalid');
        if (message) {
          message.textContent = 'Please enter a valid email address.';
        }
        if (input) {
          input.focus();
        }
        return;
      }

      form.classList.add('is-valid');
      if (message) {
        message.textContent = success;
      }
      form.reset();
    });
  });
})();
