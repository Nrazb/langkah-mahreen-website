(function () {
  var root = document.documentElement;
  try { var saved = localStorage.getItem('tema'); if (saved) root.dataset.tema = saved; } catch (e) {}
  document.addEventListener('DOMContentLoaded', function () {
    var btn = document.getElementById('tema');
    if (!btn) return;
    function aktif() {
      return root.dataset.tema || (matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
    }
    btn.setAttribute('aria-pressed', aktif() === 'dark');
    btn.addEventListener('click', function () {
      var next = aktif() === 'dark' ? 'light' : 'dark';
      root.dataset.tema = next;
      try { localStorage.setItem('tema', next); } catch (e) {}
      btn.setAttribute('aria-pressed', next === 'dark');
    });
  });
})();
