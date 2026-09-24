document.addEventListener('DOMContentLoaded', function () {
  var b = document.querySelector('.salin'), info = document.getElementById('salin-info');
  if (!b) return;
  b.addEventListener('click', function () {
    var url = b.dataset.url;
    var ok = function () { info.textContent = 'Tautan tersalin. Kirim ke temanmu.'; };
    var gagal = function () { info.textContent = 'Gagal menyalin. Salin dari bilah alamat browser.'; };
    if (navigator.clipboard && navigator.clipboard.writeText) navigator.clipboard.writeText(url).then(ok, gagal); else gagal();
  });
});
