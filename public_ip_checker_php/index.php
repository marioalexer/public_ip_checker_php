<?php
declare(strict_types=1);

/*
 * Política de IP:
 * - Cloudflare: CF-Connecting-IP
 * - Caso general: REMOTE_ADDR
 * No se intenta adivinar detrás de proxies desconocidos.
 */

function getClientIP(): array
{
    if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            return [$ip, 'cloudflare'];
        }
    }

    $ip = $_SERVER['REMOTE_ADDR'] ?? null;
    if ($ip && filter_var($ip, FILTER_VALIDATE_IP)) {
        return [$ip, 'directa'];
    }

    return ['No se pudo obtener la IP', 'desconocido'];
}

[$ip, $source] = getClientIP();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tu IP pública</title>

<link rel="icon" href="assets/favicon.png" type="image/png">
<link rel="stylesheet" href="assets/style.css">

<meta name="theme-color" media="(prefers-color-scheme: light)" content="#ffffff">
<meta name="theme-color" media="(prefers-color-scheme: dark)"  content="#121212">
<meta name="referrer" content="no-referrer">

<meta http-equiv="Content-Security-Policy"
      content="default-src 'self';
               style-src 'self';
               img-src 'self' data:;
               script-src 'self';
               base-uri 'none';
               form-action 'none';">
</head>
<body>
<main>
  <a class="logo" href="https://nomad-idea.com/">
    <img src="assets/logo.png"
         alt="Logo"
         loading="lazy"
         decoding="async"
         onerror="this.closest('a').style.display='none'">
  </a>

  <div id="ip" title="Clic para copiar">
    <?= htmlspecialchars($ip, ENT_QUOTES) ?>
  </div>

  <div class="hint">
    Origen: <?= htmlspecialchars($source, ENT_QUOTES) ?> · Clic para copiar
  </div>

  <button id="copy">Copiar</button>

  <noscript>Activa JavaScript para copiar la IP.</noscript>
</main>

<script src="assets/app.js" defer></script>
</body>
</html>

