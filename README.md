# public_ip_checker_php

Herramienta mínima para mostrar y copiar la IP pública del visitante en tiempo real.

Pensada para usuarios no técnicos, soporte y equipos que necesitan conocer su IP
sin depender de servicios externos ni instalaciones complejas.

Se despliega copiando archivos a un directorio público (cPanel, hosting compartido, VPS).

---

## Características

- Muestra la IP pública detectada por el servidor
- Copia la IP al portapapeles con un clic
- Interfaz limpia, responsive y sin frameworks
- Funciona en HTTP y HTTPS
- Sin APIs externas
- Sin dependencias
- Compatible con cPanel estándar

---

## Cómo funciona

La IP se obtiene **directamente en el servidor** usando PHP:

1. Si el sitio está detrás de Cloudflare, se usa `CF-Connecting-IP`
2. En cualquier otro caso, se usa `REMOTE_ADDR`

No se intenta adivinar la IP real detrás de proxies desconocidos.
Si hay VPN, proxy o CDN, se muestra la IP que el servidor ve.

El navegador solo se encarga de mostrarla y copiarla.

---

## Estructura del proyecto

/folder/
├─ index.php
└─ assets/
├─ style.css
├─ app.js
├─ logo.png
└─ favicon.png

---

## Requisitos

- PHP 7.4 o superior
- Navegador moderno con JavaScript habilitado

No requiere base de datos, extensiones adicionales ni configuración especial.

---

## Instalación

1. Copia la carpeta del proyecto a un directorio público
   - Ejemplo: `public_html/ip/`
2. Accede a la URL desde el navegador

No hay pasos adicionales.

---

## Seguridad y privacidad

- No se almacenan datos
- No se usan cookies
- No se realizan peticiones a terceros
- Content Security Policy (CSP) estricta
- Sin tracking

---

## Limitaciones conocidas

- La IP mostrada es la que ve el servidor
- Detrás de VPN o proxy se mostrará la IP de ese servicio
- No detecta la IP WAN de un router doméstico
- No realiza geolocalización

Estas limitaciones son intencionales para evitar resultados engañosos.

---

## Diferencia respecto a la versión HTML + JavaScript

| Aspecto | HTML puro | Esta versión |
|------|----------|--------------|
| APIs externas | Sí | No |
| Dependencia de red | Alta | Baja |
| Bloqueos por firewall | Posibles | No |
| Hosting estático | Sí | No |
| Hosting cPanel | Sí | Sí |
| Confiabilidad | Media | Alta |

---

## Licencia

MIT
