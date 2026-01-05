(() => {
  const ipEl = document.getElementById('ip');
  const btn  = document.getElementById('copy');
  if (!ipEl || !btn) return;

  const ip = ipEl.textContent.trim();

  function legacyCopy(text) {
    const ta = document.createElement('textarea');
    ta.value = text;
    ta.style.position = 'fixed';
    ta.style.opacity = '0';
    document.body.appendChild(ta);
    ta.focus();
    ta.select();
    try { document.execCommand('copy'); } catch {}
    document.body.removeChild(ta);
  }

  async function copyIP() {
    try {
      if (navigator.clipboard && window.isSecureContext) {
        await navigator.clipboard.writeText(ip);
      } else {
        legacyCopy(ip);
      }
      const prev = btn.textContent;
      btn.textContent = 'Copiado';
      setTimeout(() => btn.textContent = prev, 1000);
    } catch {}
  }

  btn.addEventListener('click', copyIP);
  ipEl.addEventListener('click', copyIP);
})();

