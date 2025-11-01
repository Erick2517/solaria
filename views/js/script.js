
  document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('.nav-toggle');
    const list = document.getElementById('nav-list');
    if (!toggle || !list) return;

    toggle.addEventListener('click', () => {
      const expanded = toggle.getAttribute('aria-expanded') === 'true';
      toggle.setAttribute('aria-expanded', String(!expanded));
      list.classList.toggle('open');
    });

    // Opcional: cerrar al hacer clic en un enlace en móvil
    list.addEventListener('click', (e) => {
      if (e.target.closest('a') && window.matchMedia('(max-width: 767px)').matches) {
        list.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
      }
    });
  });

