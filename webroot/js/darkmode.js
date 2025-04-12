document.addEventListener('DOMContentLoaded', function() {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const html = document.documentElement;

    // Verificar preferencia guardada o del sistema
    const savedTheme = localStorage.getItem('theme') ||
      (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

    // Aplicar tema al cargar
    if (savedTheme === 'dark') {
      html.setAttribute('data-bs-theme', 'dark');
      darkModeToggle.innerHTML = '<i class="bi bi-sun-fill"></i> Modo Claro';
    }

    // Alternar al hacer clic
    darkModeToggle.addEventListener('click', function() {
      if (html.getAttribute('data-bs-theme') === 'dark') {
        html.removeAttribute('data-bs-theme');
        localStorage.setItem('theme', 'light');
        darkModeToggle.innerHTML = '<i class="bi bi-moon-fill"></i> Modo Oscuro';
      } else {
        html.setAttribute('data-bs-theme', 'dark');
        localStorage.setItem('theme', 'dark');
        darkModeToggle.innerHTML = '<i class="bi bi-sun-fill"></i> Modo Claro';
      }
    });
  });
