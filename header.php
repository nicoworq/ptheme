<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/favicon.ico" />
        <?php wp_head(); ?>
        <!-- Facebook Pixel Code -->
        <script>
            !function (f, b, e, v, n, t, s)
            {
                if (f.fbq)
                    return;
                n = f.fbq = function () {
                    n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq)
                    f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '422312091292470');
            fbq('track', 'PageView');
        </script>
        <noscript>
    <img height="1" width="1" 
         src="https://www.facebook.com/tr?id=422312091292470&ev=PageView
         &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

</head>

<body <?php body_class(); ?>>

    <div id="page" class="hfeed site">
        <?php do_action('storefront_before_header'); ?>





        <header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">

            <div class="numeros-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div id="contacto-header">
                                <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDM0OC4wNzcgMzQ4LjA3NyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMzQ4LjA3NyAzNDguMDc3OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPGc+CgkJPGc+CgkJCTxwYXRoIGQ9Ik0zNDAuMjczLDI3NS4wODNsLTUzLjc1NS01My43NjFjLTEwLjcwNy0xMC42NjQtMjguNDM4LTEwLjM0LTM5LjUxOCwwLjc0NGwtMjcuMDgyLDI3LjA3NiAgICAgYy0xLjcxMS0wLjk0My0zLjQ4Mi0xLjkyOC01LjM0NC0yLjk3M2MtMTcuMTAyLTkuNDc2LTQwLjUwOS0yMi40NjQtNjUuMTQtNDcuMTEzYy0yNC43MDQtMjQuNzAxLTM3LjcwNC00OC4xNDQtNDcuMjA5LTY1LjI1NyAgICAgYy0xLjAwMy0xLjgxMy0xLjk2NC0zLjU2MS0yLjkxMy01LjIyMWwxOC4xNzYtMTguMTQ5bDguOTM2LTguOTQ3YzExLjA5Ny0xMS4xLDExLjQwMy0yOC44MjYsMC43MjEtMzkuNTIxTDczLjM5LDguMTk0ICAgICBDNjIuNzA4LTIuNDg2LDQ0Ljk2OS0yLjE2MiwzMy44NzIsOC45MzhsLTE1LjE1LDE1LjIzN2wwLjQxNCwwLjQxMWMtNS4wOCw2LjQ4Mi05LjMyNSwxMy45NTgtMTIuNDg0LDIyLjAyICAgICBDMy43NCw1NC4yOCwxLjkyNyw2MS42MDMsMS4wOTgsNjguOTQxQy02LDEyNy43ODUsMjAuODksMTgxLjU2NCw5My44NjYsMjU0LjU0MWMxMDAuODc1LDEwMC44NjgsMTgyLjE2Nyw5My4yNDgsMTg1LjY3NCw5Mi44NzYgICAgIGM3LjYzOC0wLjkxMywxNC45NTgtMi43MzgsMjIuMzk3LTUuNjI3YzcuOTkyLTMuMTIyLDE1LjQ2My03LjM2MSwyMS45NDEtMTIuNDNsMC4zMzEsMC4yOTRsMTUuMzQ4LTE1LjAyOSAgICAgQzM1MC42MzEsMzAzLjUyNywzNTAuOTUsMjg1Ljc5NSwzNDAuMjczLDI3NS4wODN6IiBmaWxsPSIjODg2ZjAwIi8+CgkJPC9nPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
                               
                                <span>Contactanos</span>
                                
                                <img class="down-arrow" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAulBMVEUAAACAYACAYACKbQCIbwCHcACHcQCGcgCGcQCHcACMawCKbQCIbwCIbwCIbwCJcACKbgCJbwCIbwCIcACMawCHbwCIbwCIbwCIbwCJcACJbwCIbwCIbwCJcACHbwCIbwCIbwCIbwCJcACKbgCJbwCIbwCIbwCJcACHbwCIbwCIbwCIbwCJbwCIbwCJcACHbwCIbwCIbwCIbwCIbwCIbwCJcACJcACIbwCIbwCJcACIbwCIbgCAgAAAAAAHab3sAAAAPXRSTlMABgEanC0FBi6dFwx6nzcHBzSdeAoffpY7CDiSex4igI89CQg6i30gI4GKPzyGIiWCiEVDhSMlmJckfCMDvtFAgwAAAAFiS0dEAIgFHUgAAAAJcEhZcwAADdcAAA3XAUIom3gAAAAHdElNRQfjBgwEAAHpnBHeAAAAcUlEQVQY02NgIAMwMiHYTIwMDMwsrGwwPjsHJxcDNw8vHz+ELyAoJCzCwCAqJi4hCeZLScvIghhy8gqKSgwMyiqqauoQpRqaWtpKyjq6Ynoww/QNDI2MTcRMEdaZyZtbiFkiO8ZMzcoa1Xk2NuR4CgIAFdwIeHSmrcMAAAAldEVYdGRhdGU6Y3JlYXRlADIwMTktMDYtMTJUMDI6MDA6MDErMDI6MDAl6o5IAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDE5LTA2LTEyVDAyOjAwOjAxKzAyOjAwVLc29AAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAAASUVORK5CYII=" alt=""/>
                                
                                <div id="contacto-header-float">
                                    <h4>Nuestras sucursales:</h4>
                                    <ul>
                                        <li>
                                            <a target="blank" href="https://www.google.com.ar/maps/place/Pascal+Computadoras/@-32.9441799,-60.6427994,17z/data=!4m13!1m7!3m6!1s0x95b7ab17fa457497:0xd81fd9d23a51f39d!2sEntre+R%C3%ADos+658,+S2000CRL+Rosario,+Santa+Fe!3b1!8m2!3d-32.9441799!4d-60.6406107!3m4!1s0x95b7ab17fa457491:0x2835d64950d2dbb2!8m2!3d-32.94418!4d-60.640611" class="contacto-mapa">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAsVBMVEUAAACZZgCHbgCIbwCIbwCJbwCIbwCOcQCIbwCJbwD/AACIbgCIbwCIbwCKbwCHcACAgACIbwCIbwCIcACHcACHbwCIcACIbwCHbgCJbwCIbwCHbwCIbgCGcACIcACIbwCIbgCAgACIbwCJbgCJcACJbwCIbwCGbACIbwCJbwCGbwCIbwCIbwCHbwCIbgCIbwCJbwCIbwCHaQCKcQCIbwCJcACIbwCIbwCHcACIbwAAAADm4bZkAAAAOXRSTlMABWjH9MZnEsXEAbv2uExZBFr1SaBxcp7CJ8GxOjuwgbICtH8pY8Mourc3/v01nZri4RE9+3t4o6LR2O4FAAAAAWJLR0QAiAUdSAAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAAd0SU1FB+MGDAMrC3p2EywAAACVSURBVBjTTY7ZGsEwFIRPCSWK2lsURe27Wub9X0xyTvXrf5HJ/BfJEBmcUlmpStWhDLcGpu5K1w1TPM8cTREtQLV9v9MFeiz6wMDmEBixCIDQZgiMWUyAqc0ImLGYA4uYKF4CKxZr836QJBsTW/lmh4x9NuxwlH46/6deRFwp336z/f7IBT1TII2owAt4Fzvpz1fL7QeELRX+hPHz/AAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxOS0wNi0xMlQwMTo0MzoxMSswMjowMA9kKpkAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTktMDYtMTJUMDE6NDM6MTErMDI6MDB+OZIlAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAABJRU5ErkJggg==" alt=""/>
                                                
                                                <span>Entre ríos 658</span>
                                            </a>
                                            <a href="tel:4242129" class="contacto-telefono">
                                                <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDM0OC4wNzcgMzQ4LjA3NyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMzQ4LjA3NyAzNDguMDc3OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPGc+CgkJPGc+CgkJCTxwYXRoIGQ9Ik0zNDAuMjczLDI3NS4wODNsLTUzLjc1NS01My43NjFjLTEwLjcwNy0xMC42NjQtMjguNDM4LTEwLjM0LTM5LjUxOCwwLjc0NGwtMjcuMDgyLDI3LjA3NiAgICAgYy0xLjcxMS0wLjk0My0zLjQ4Mi0xLjkyOC01LjM0NC0yLjk3M2MtMTcuMTAyLTkuNDc2LTQwLjUwOS0yMi40NjQtNjUuMTQtNDcuMTEzYy0yNC43MDQtMjQuNzAxLTM3LjcwNC00OC4xNDQtNDcuMjA5LTY1LjI1NyAgICAgYy0xLjAwMy0xLjgxMy0xLjk2NC0zLjU2MS0yLjkxMy01LjIyMWwxOC4xNzYtMTguMTQ5bDguOTM2LTguOTQ3YzExLjA5Ny0xMS4xLDExLjQwMy0yOC44MjYsMC43MjEtMzkuNTIxTDczLjM5LDguMTk0ICAgICBDNjIuNzA4LTIuNDg2LDQ0Ljk2OS0yLjE2MiwzMy44NzIsOC45MzhsLTE1LjE1LDE1LjIzN2wwLjQxNCwwLjQxMWMtNS4wOCw2LjQ4Mi05LjMyNSwxMy45NTgtMTIuNDg0LDIyLjAyICAgICBDMy43NCw1NC4yOCwxLjkyNyw2MS42MDMsMS4wOTgsNjguOTQxQy02LDEyNy43ODUsMjAuODksMTgxLjU2NCw5My44NjYsMjU0LjU0MWMxMDAuODc1LDEwMC44NjgsMTgyLjE2Nyw5My4yNDgsMTg1LjY3NCw5Mi44NzYgICAgIGM3LjYzOC0wLjkxMywxNC45NTgtMi43MzgsMjIuMzk3LTUuNjI3YzcuOTkyLTMuMTIyLDE1LjQ2My03LjM2MSwyMS45NDEtMTIuNDNsMC4zMzEsMC4yOTRsMTUuMzQ4LTE1LjAyOSAgICAgQzM1MC42MzEsMzAzLjUyNywzNTAuOTUsMjg1Ljc5NSwzNDAuMjczLDI3NS4wODN6IiBmaWxsPSIjODg2ZjAwIi8+CgkJPC9nPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
                                                
                                                <span>4242129/4493917</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="blank" href="https://www.google.com.ar/maps/place/Pascal+Computadoras/@-32.9572129,-60.6424697,17z/data=!4m13!1m7!3m6!1s0x95b7ab0f62feac95:0xb371d38362404be8!2sAv.+Pellegrini+1070,+S2000BTX+Rosario,+Santa+Fe!3b1!8m2!3d-32.9572129!4d-60.640281!3m4!1s0x95b7abbd55be88d9:0x813ff2b14c16fca4!8m2!3d-32.9572129!4d-60.640281" class="contacto-mapa">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAsVBMVEUAAACZZgCHbgCIbwCIbwCJbwCIbwCOcQCIbwCJbwD/AACIbgCIbwCIbwCKbwCHcACAgACIbwCIbwCIcACHcACHbwCIcACIbwCHbgCJbwCIbwCHbwCIbgCGcACIcACIbwCIbgCAgACIbwCJbgCJcACJbwCIbwCGbACIbwCJbwCGbwCIbwCIbwCHbwCIbgCIbwCJbwCIbwCHaQCKcQCIbwCJcACIbwCIbwCHcACIbwAAAADm4bZkAAAAOXRSTlMABWjH9MZnEsXEAbv2uExZBFr1SaBxcp7CJ8GxOjuwgbICtH8pY8Mourc3/v01nZri4RE9+3t4o6LR2O4FAAAAAWJLR0QAiAUdSAAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAAd0SU1FB+MGDAMrC3p2EywAAACVSURBVBjTTY7ZGsEwFIRPCSWK2lsURe27Wub9X0xyTvXrf5HJ/BfJEBmcUlmpStWhDLcGpu5K1w1TPM8cTREtQLV9v9MFeiz6wMDmEBixCIDQZgiMWUyAqc0ImLGYA4uYKF4CKxZr836QJBsTW/lmh4x9NuxwlH46/6deRFwp336z/f7IBT1TII2owAt4Fzvpz1fL7QeELRX+hPHz/AAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxOS0wNi0xMlQwMTo0MzoxMSswMjowMA9kKpkAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTktMDYtMTJUMDE6NDM6MTErMDI6MDB+OZIlAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAABJRU5ErkJggg==" alt=""/>
                                                Pellegrini 1070
                                                <span></span>
                                            </a>
                                            <a href="tel:2971551" class="contacto-telefono">
                                                <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDM0OC4wNzcgMzQ4LjA3NyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMzQ4LjA3NyAzNDguMDc3OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPGc+CgkJPGc+CgkJCTxwYXRoIGQ9Ik0zNDAuMjczLDI3NS4wODNsLTUzLjc1NS01My43NjFjLTEwLjcwNy0xMC42NjQtMjguNDM4LTEwLjM0LTM5LjUxOCwwLjc0NGwtMjcuMDgyLDI3LjA3NiAgICAgYy0xLjcxMS0wLjk0My0zLjQ4Mi0xLjkyOC01LjM0NC0yLjk3M2MtMTcuMTAyLTkuNDc2LTQwLjUwOS0yMi40NjQtNjUuMTQtNDcuMTEzYy0yNC43MDQtMjQuNzAxLTM3LjcwNC00OC4xNDQtNDcuMjA5LTY1LjI1NyAgICAgYy0xLjAwMy0xLjgxMy0xLjk2NC0zLjU2MS0yLjkxMy01LjIyMWwxOC4xNzYtMTguMTQ5bDguOTM2LTguOTQ3YzExLjA5Ny0xMS4xLDExLjQwMy0yOC44MjYsMC43MjEtMzkuNTIxTDczLjM5LDguMTk0ICAgICBDNjIuNzA4LTIuNDg2LDQ0Ljk2OS0yLjE2MiwzMy44NzIsOC45MzhsLTE1LjE1LDE1LjIzN2wwLjQxNCwwLjQxMWMtNS4wOCw2LjQ4Mi05LjMyNSwxMy45NTgtMTIuNDg0LDIyLjAyICAgICBDMy43NCw1NC4yOCwxLjkyNyw2MS42MDMsMS4wOTgsNjguOTQxQy02LDEyNy43ODUsMjAuODksMTgxLjU2NCw5My44NjYsMjU0LjU0MWMxMDAuODc1LDEwMC44NjgsMTgyLjE2Nyw5My4yNDgsMTg1LjY3NCw5Mi44NzYgICAgIGM3LjYzOC0wLjkxMywxNC45NTgtMi43MzgsMjIuMzk3LTUuNjI3YzcuOTkyLTMuMTIyLDE1LjQ2My03LjM2MSwyMS45NDEtMTIuNDNsMC4zMzEsMC4yOTRsMTUuMzQ4LTE1LjAyOSAgICAgQzM1MC42MzEsMzAzLjUyNywzNTAuOTUsMjg1Ljc5NSwzNDAuMjczLDI3NS4wODN6IiBmaWxsPSIjODg2ZjAwIi8+CgkJPC9nPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
                                                
                                                <span>2971551</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="blank" href="https://www.google.com.ar/maps/place/Pascal+Computadoras+(Echesortu)/@-32.945344,-60.6688707,17z/data=!4m13!1m7!3m6!1s0x95b7ab5c78d937f3:0x7578b91a50e3b808!2sAv.+Francia+1102,+S2002QRQ+Rosario,+Santa+Fe!3b1!8m2!3d-32.945344!4d-60.666682!3m4!1s0x95b7ab5c7f32f1d9:0x120e280653f21dc7!8m2!3d-32.9452778!4d-60.6666667" class="contacto-mapa">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAsVBMVEUAAACZZgCHbgCIbwCIbwCJbwCIbwCOcQCIbwCJbwD/AACIbgCIbwCIbwCKbwCHcACAgACIbwCIbwCIcACHcACHbwCIcACIbwCHbgCJbwCIbwCHbwCIbgCGcACIcACIbwCIbgCAgACIbwCJbgCJcACJbwCIbwCGbACIbwCJbwCGbwCIbwCIbwCHbwCIbgCIbwCJbwCIbwCHaQCKcQCIbwCJcACIbwCIbwCHcACIbwAAAADm4bZkAAAAOXRSTlMABWjH9MZnEsXEAbv2uExZBFr1SaBxcp7CJ8GxOjuwgbICtH8pY8Mourc3/v01nZri4RE9+3t4o6LR2O4FAAAAAWJLR0QAiAUdSAAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAAd0SU1FB+MGDAMrC3p2EywAAACVSURBVBjTTY7ZGsEwFIRPCSWK2lsURe27Wub9X0xyTvXrf5HJ/BfJEBmcUlmpStWhDLcGpu5K1w1TPM8cTREtQLV9v9MFeiz6wMDmEBixCIDQZgiMWUyAqc0ImLGYA4uYKF4CKxZr836QJBsTW/lmh4x9NuxwlH46/6deRFwp336z/f7IBT1TII2owAt4Fzvpz1fL7QeELRX+hPHz/AAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxOS0wNi0xMlQwMTo0MzoxMSswMjowMA9kKpkAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTktMDYtMTJUMDE6NDM6MTErMDI6MDB+OZIlAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAABJRU5ErkJggg==" alt=""/>

                                                <span>Av Francia 1102</span>
                                            </a>
                                            <a href="tel:4775612" class="contacto-telefono">
                                                <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDM0OC4wNzcgMzQ4LjA3NyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMzQ4LjA3NyAzNDguMDc3OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPGc+CgkJPGc+CgkJCTxwYXRoIGQ9Ik0zNDAuMjczLDI3NS4wODNsLTUzLjc1NS01My43NjFjLTEwLjcwNy0xMC42NjQtMjguNDM4LTEwLjM0LTM5LjUxOCwwLjc0NGwtMjcuMDgyLDI3LjA3NiAgICAgYy0xLjcxMS0wLjk0My0zLjQ4Mi0xLjkyOC01LjM0NC0yLjk3M2MtMTcuMTAyLTkuNDc2LTQwLjUwOS0yMi40NjQtNjUuMTQtNDcuMTEzYy0yNC43MDQtMjQuNzAxLTM3LjcwNC00OC4xNDQtNDcuMjA5LTY1LjI1NyAgICAgYy0xLjAwMy0xLjgxMy0xLjk2NC0zLjU2MS0yLjkxMy01LjIyMWwxOC4xNzYtMTguMTQ5bDguOTM2LTguOTQ3YzExLjA5Ny0xMS4xLDExLjQwMy0yOC44MjYsMC43MjEtMzkuNTIxTDczLjM5LDguMTk0ICAgICBDNjIuNzA4LTIuNDg2LDQ0Ljk2OS0yLjE2MiwzMy44NzIsOC45MzhsLTE1LjE1LDE1LjIzN2wwLjQxNCwwLjQxMWMtNS4wOCw2LjQ4Mi05LjMyNSwxMy45NTgtMTIuNDg0LDIyLjAyICAgICBDMy43NCw1NC4yOCwxLjkyNyw2MS42MDMsMS4wOTgsNjguOTQxQy02LDEyNy43ODUsMjAuODksMTgxLjU2NCw5My44NjYsMjU0LjU0MWMxMDAuODc1LDEwMC44NjgsMTgyLjE2Nyw5My4yNDgsMTg1LjY3NCw5Mi44NzYgICAgIGM3LjYzOC0wLjkxMywxNC45NTgtMi43MzgsMjIuMzk3LTUuNjI3YzcuOTkyLTMuMTIyLDE1LjQ2My03LjM2MSwyMS45NDEtMTIuNDNsMC4zMzEsMC4yOTRsMTUuMzQ4LTE1LjAyOSAgICAgQzM1MC42MzEsMzAzLjUyNywzNTAuOTUsMjg1Ljc5NSwzNDAuMjczLDI3NS4wODN6IiBmaWxsPSIjODg2ZjAwIi8+CgkJPC9nPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
                                                <span>4775612</span>
                                            </a>
                                        </li>
                             
                                        <li>
                                            <a target="blank" href="https://www.google.com.ar/maps/place/Pascal+Computadoras+(Zona+Oeste)/@-32.9356266,-60.7014884,17z/data=!4m13!1m7!3m6!1s0x95b6533575e08091:0x281e130594927225!2sAv.+Eva+Per%C3%B3n+5541,+S2000+Rosario,+Santa+Fe!3b1!8m2!3d-32.9356266!4d-60.6992997!3m4!1s0x95b6533575e08091:0x9f5132f29b68cdce!8m2!3d-32.9356266!4d-60.6992997" class="contacto-mapa">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAsVBMVEUAAACZZgCHbgCIbwCIbwCJbwCIbwCOcQCIbwCJbwD/AACIbgCIbwCIbwCKbwCHcACAgACIbwCIbwCIcACHcACHbwCIcACIbwCHbgCJbwCIbwCHbwCIbgCGcACIcACIbwCIbgCAgACIbwCJbgCJcACJbwCIbwCGbACIbwCJbwCGbwCIbwCIbwCHbwCIbgCIbwCJbwCIbwCHaQCKcQCIbwCJcACIbwCIbwCHcACIbwAAAADm4bZkAAAAOXRSTlMABWjH9MZnEsXEAbv2uExZBFr1SaBxcp7CJ8GxOjuwgbICtH8pY8Mourc3/v01nZri4RE9+3t4o6LR2O4FAAAAAWJLR0QAiAUdSAAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAAd0SU1FB+MGDAMrC3p2EywAAACVSURBVBjTTY7ZGsEwFIRPCSWK2lsURe27Wub9X0xyTvXrf5HJ/BfJEBmcUlmpStWhDLcGpu5K1w1TPM8cTREtQLV9v9MFeiz6wMDmEBixCIDQZgiMWUyAqc0ImLGYA4uYKF4CKxZr836QJBsTW/lmh4x9NuxwlH46/6deRFwp336z/f7IBT1TII2owAt4Fzvpz1fL7QeELRX+hPHz/AAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxOS0wNi0xMlQwMTo0MzoxMSswMjowMA9kKpkAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTktMDYtMTJUMDE6NDM6MTErMDI6MDB+OZIlAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAABJRU5ErkJggg==" alt=""/>
                                                <span>Córdoba 5541</span>
                                                
                                            </a>
                                            <a href="tel:4577177" class="contacto-telefono">
                                                <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDM0OC4wNzcgMzQ4LjA3NyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMzQ4LjA3NyAzNDguMDc3OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPGc+CgkJPGc+CgkJCTxwYXRoIGQ9Ik0zNDAuMjczLDI3NS4wODNsLTUzLjc1NS01My43NjFjLTEwLjcwNy0xMC42NjQtMjguNDM4LTEwLjM0LTM5LjUxOCwwLjc0NGwtMjcuMDgyLDI3LjA3NiAgICAgYy0xLjcxMS0wLjk0My0zLjQ4Mi0xLjkyOC01LjM0NC0yLjk3M2MtMTcuMTAyLTkuNDc2LTQwLjUwOS0yMi40NjQtNjUuMTQtNDcuMTEzYy0yNC43MDQtMjQuNzAxLTM3LjcwNC00OC4xNDQtNDcuMjA5LTY1LjI1NyAgICAgYy0xLjAwMy0xLjgxMy0xLjk2NC0zLjU2MS0yLjkxMy01LjIyMWwxOC4xNzYtMTguMTQ5bDguOTM2LTguOTQ3YzExLjA5Ny0xMS4xLDExLjQwMy0yOC44MjYsMC43MjEtMzkuNTIxTDczLjM5LDguMTk0ICAgICBDNjIuNzA4LTIuNDg2LDQ0Ljk2OS0yLjE2MiwzMy44NzIsOC45MzhsLTE1LjE1LDE1LjIzN2wwLjQxNCwwLjQxMWMtNS4wOCw2LjQ4Mi05LjMyNSwxMy45NTgtMTIuNDg0LDIyLjAyICAgICBDMy43NCw1NC4yOCwxLjkyNyw2MS42MDMsMS4wOTgsNjguOTQxQy02LDEyNy43ODUsMjAuODksMTgxLjU2NCw5My44NjYsMjU0LjU0MWMxMDAuODc1LDEwMC44NjgsMTgyLjE2Nyw5My4yNDgsMTg1LjY3NCw5Mi44NzYgICAgIGM3LjYzOC0wLjkxMywxNC45NTgtMi43MzgsMjIuMzk3LTUuNjI3YzcuOTkyLTMuMTIyLDE1LjQ2My03LjM2MSwyMS45NDEtMTIuNDNsMC4zMzEsMC4yOTRsMTUuMzQ4LTE1LjAyOSAgICAgQzM1MC42MzEsMzAzLjUyNywzNTAuOTUsMjg1Ljc5NSwzNDAuMjczLDI3NS4wODN6IiBmaWxsPSIjODg2ZjAwIi8+CgkJPC9nPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
                                                
                                                <span>4577177/4580888</span>
                                                
                                            </a>
                                        </li>
                                        <li>
                                            <a href="mailto:info@pascalonline.com.ar"> <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDUxMS42MjYgNTExLjYyNiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTExLjYyNiA1MTEuNjI2OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPGc+CgkJPHBhdGggZD0iTTQ5LjEwNiwxNzguNzI5YzYuNDcyLDQuNTY3LDI1Ljk4MSwxOC4xMzEsNTguNTI4LDQwLjY4NWMzMi41NDgsMjIuNTU0LDU3LjQ4MiwzOS45Miw3NC44MDMsNTIuMDk5ICAgIGMxLjkwMywxLjMzNSw1Ljk0Niw0LjIzNywxMi4xMzEsOC43MWM2LjE4Niw0LjQ3NiwxMS4zMjYsOC4wOTMsMTUuNDE2LDEwLjg1MmM0LjA5MywyLjc1OCw5LjA0MSw1Ljg1MiwxNC44NDksOS4yNzcgICAgYzUuODA2LDMuNDIyLDExLjI3OSw1Ljk5NiwxNi40MTgsNy43YzUuMTQsMS43MTgsOS44OTgsMi41NjksMTQuMjc1LDIuNTY5aDAuMjg3aDAuMjg4YzQuMzc3LDAsOS4xMzctMC44NTIsMTQuMjc3LTIuNTY5ICAgIGM1LjEzNy0xLjcwNCwxMC42MTUtNC4yODEsMTYuNDE2LTcuN2M1LjgwNC0zLjQyOSwxMC43NTItNi41MiwxNC44NDUtOS4yNzdjNC4wOTMtMi43NTksOS4yMjktNi4zNzYsMTUuNDE3LTEwLjg1MiAgICBjNi4xODQtNC40NzcsMTAuMjMyLTcuMzc1LDEyLjEzNS04LjcxYzE3LjUwOC0xMi4xNzksNjIuMDUxLTQzLjExLDEzMy42MTUtOTIuNzljMTMuODk0LTkuNzAzLDI1LjUwMi0yMS40MTEsMzQuODI3LTM1LjExNiAgICBjOS4zMzItMTMuNjk5LDEzLjk5My0yOC4wNywxMy45OTMtNDMuMTA1YzAtMTIuNTY0LTQuNTIzLTIzLjMxOS0xMy41NjUtMzIuMjY0Yy05LjA0MS04Ljk0Ny0xOS43NDktMTMuNDE4LTMyLjExNy0xMy40MThINDUuNjc5ICAgIGMtMTQuNjU1LDAtMjUuOTMzLDQuOTQ4LTMzLjgzMiwxNC44NDRDMy45NDksNzkuNTYyLDAsOTEuOTM0LDAsMTA2Ljc3OWMwLDExLjk5MSw1LjIzNiwyNC45ODUsMTUuNzAzLDM4Ljk3NCAgICBDMjYuMTY5LDE1OS43NDMsMzcuMzA3LDE3MC43MzYsNDkuMTA2LDE3OC43Mjl6IiBmaWxsPSIjODg2ZjAwIi8+CgkJPHBhdGggZD0iTTQ4My4wNzIsMjA5LjI3NWMtNjIuNDI0LDQyLjI1MS0xMDkuODI0LDc1LjA4Ny0xNDIuMTc3LDk4LjUwMWMtMTAuODQ5LDcuOTkxLTE5LjY1LDE0LjIyOS0yNi40MDksMTguNjk5ICAgIGMtNi43NTksNC40NzMtMTUuNzQ4LDkuMDQxLTI2Ljk4LDEzLjcwMmMtMTEuMjI4LDQuNjY4LTIxLjY5Miw2Ljk5NS0zMS40MDEsNi45OTVoLTAuMjkxaC0wLjI4NyAgICBjLTkuNzA3LDAtMjAuMTc3LTIuMzI3LTMxLjQwNS02Ljk5NWMtMTEuMjI4LTQuNjYxLTIwLjIyMy05LjIyOS0yNi45OC0xMy43MDJjLTYuNzU1LTQuNDctMTUuNTU5LTEwLjcwOC0yNi40MDctMTguNjk5ICAgIGMtMjUuNjk3LTE4Ljg0Mi03Mi45OTUtNTEuNjgtMTQxLjg5Ni05OC41MDFDMTcuOTg3LDIwMi4wNDcsOC4zNzUsMTkzLjc2MiwwLDE4NC40Mzd2MjI2LjY4NWMwLDEyLjU3LDQuNDcxLDIzLjMxOSwxMy40MTgsMzIuMjY1ICAgIGM4Ljk0NSw4Ljk0OSwxOS43MDEsMTMuNDIyLDMyLjI2NCwxMy40MjJoNDIwLjI2NmMxMi41NiwwLDIzLjMxNS00LjQ3MywzMi4yNjEtMTMuNDIyYzguOTQ5LTguOTQ5LDEzLjQxOC0xOS42OTQsMTMuNDE4LTMyLjI2NSAgICBWMTg0LjQzN0M1MDMuNDQxLDE5My41NjksNDkzLjkyNywyMDEuODU0LDQ4My4wNzIsMjA5LjI3NXoiIGZpbGw9IiM4ODZmMDAiLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />info@pascalonline.com.ar</a>
                                        </li>
                                         <li><a href="https://wa.me/5493416523221"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMTZweCIgaGVpZ2h0PSIxNnB4Ij4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNMjU2LjA2NCwwaC0wLjEyOEMxMTQuNzg0LDAsMCwxMTQuODE2LDAsMjU2YzAsNTYsMTguMDQ4LDEwNy45MDQsNDguNzM2LDE1MC4wNDhsLTMxLjkwNCw5NS4xMDRsOTguNC0zMS40NTYgICAgQzE1NS43MTIsNDk2LjUxMiwyMDQsNTEyLDI1Ni4wNjQsNTEyQzM5Ny4yMTYsNTEyLDUxMiwzOTcuMTUyLDUxMiwyNTZTMzk3LjIxNiwwLDI1Ni4wNjQsMHogTTQwNS4wMjQsMzYxLjUwNCAgICBjLTYuMTc2LDE3LjQ0LTMwLjY4OCwzMS45MDQtNTAuMjQsMzYuMTI4Yy0xMy4zNzYsMi44NDgtMzAuODQ4LDUuMTItODkuNjY0LTE5LjI2NEMxODkuODg4LDM0Ny4yLDE0MS40NCwyNzAuNzUyLDEzNy42NjQsMjY1Ljc5MiAgICBjLTMuNjE2LTQuOTYtMzAuNC00MC40OC0zMC40LTc3LjIxNnMxOC42NTYtNTQuNjI0LDI2LjE3Ni02Mi4zMDRjNi4xNzYtNi4zMDQsMTYuMzg0LTkuMTg0LDI2LjE3Ni05LjE4NCAgICBjMy4xNjgsMCw2LjAxNiwwLjE2LDguNTc2LDAuMjg4YzcuNTIsMC4zMiwxMS4yOTYsMC43NjgsMTYuMjU2LDEyLjY0YzYuMTc2LDE0Ljg4LDIxLjIxNiw1MS42MTYsMjMuMDA4LDU1LjM5MiAgICBjMS44MjQsMy43NzYsMy42NDgsOC44OTYsMS4wODgsMTMuODU2Yy0yLjQsNS4xMi00LjUxMiw3LjM5Mi04LjI4OCwxMS43NDRjLTMuNzc2LDQuMzUyLTcuMzYsNy42OC0xMS4xMzYsMTIuMzUyICAgIGMtMy40NTYsNC4wNjQtNy4zNiw4LjQxNi0zLjAwOCwxNS45MzZjNC4zNTIsNy4zNiwxOS4zOTIsMzEuOTA0LDQxLjUzNiw1MS42MTZjMjguNTc2LDI1LjQ0LDUxLjc0NCwzMy41NjgsNjAuMDMyLDM3LjAyNCAgICBjNi4xNzYsMi41NiwxMy41MzYsMS45NTIsMTguMDQ4LTIuODQ4YzUuNzI4LTYuMTc2LDEyLjgtMTYuNDE2LDIwLTI2LjQ5NmM1LjEyLTcuMjMyLDExLjU4NC04LjEyOCwxOC4zNjgtNS41NjggICAgYzYuOTEyLDIuNCw0My40ODgsMjAuNDgsNTEuMDA4LDI0LjIyNGM3LjUyLDMuNzc2LDEyLjQ4LDUuNTY4LDE0LjMwNCw4LjczNkM0MTEuMiwzMjkuMTUyLDQxMS4yLDM0NC4wMzIsNDA1LjAyNCwzNjEuNTA0eiIgZmlsbD0iIzg4NmYwMCIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />0341-6523221</a></li>
                                    </ul>
                                </div>
                                <ul>
                                    
                                 
                                
                                    </ul>
                            </div>
                            
                            



                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_html_e('Primary Navigation', 'storefront'); ?>">
                            <button class="menu-toggle" aria-controls="primary-navigation" aria-expanded="false"><span><?php echo esc_attr(apply_filters('storefront_menu_toggle_text', __('Menu', 'storefront'))); ?></span></button>
                            <?php
                            wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary',
                                        'container' => '',
                                        'menu_id' => 'nav-primary',
                                    //'walker'=> new example_nav_walker
                                    )
                            );
                            ?>
                            <!--                            <div class="fb-like-container">
                                                            <div class="fb-like" data-href="https://www.facebook.com/pascalcomputadoras/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
                                                        </div>-->
                        </nav><!-- #site-navigation -->



                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="site-branding">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/sitio/pascal-logo.svg'; ?>"  alt="<?php bloginfo('name'); ?>" />
                            </a>                   
                        </div>

                        <div class="header-contents">

                            <div class="nav-secondary-toggle">
                                <button id="nav-secondary-toggle-bt">
                                    <ul>
                                        <li><i>&nbsp;</i></li>
                                        <li><i>&nbsp;</i></li>
                                        <li><i>&nbsp;</i></li>
                                    </ul>
                                    <span>Menú</span>
                                </button>
                            </div>

                            <div class="site-search">
                                <?php //dynamic_sidebar( 'sidebar-header' );   ?>

                                <form role="search" method="get" id="form-search-header" class="wc_ps_form" data-ps-id="2" data-ps-cat_align="left" data-ps-cat_max_wide="30" data-ps-popup_wide="input_wide" data-ps-widget_template="sidebar" action="<?php echo site_url(); ?>">
                                    <input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="Estoy buscando..." value="" name="s" title="Estoy buscando...">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 52.966 52.966" style="enable-background:new 0 0 52.966 52.966;" xml:space="preserve" >
                                        <path d="M51.704,51.273L36.845,35.82c3.79-3.801,6.138-9.041,6.138-14.82c0-11.58-9.42-21-21-21s-21,9.42-21,21s9.42,21,21,21  c5.083,0,9.748-1.817,13.384-4.832l14.895,15.491c0.196,0.205,0.458,0.307,0.721,0.307c0.25,0,0.499-0.093,0.693-0.279  C52.074,52.304,52.086,51.671,51.704,51.273z M21.983,40c-10.477,0-19-8.523-19-19s8.523-19,19-19s19,8.523,19,19  S32.459,40,21.983,40z" fill="#FFFFFF"/>

                                        </svg>
                                    </button>
                                    <input type="hidden" name="post_type" value="product">
                                </form>
                            </div>


                            <?php
                            if (is_cart()) {
                                $class = 'current-menu-item';
                            } else {
                                $class = '';
                            }
                            ?>
                            <ul class="site-header-cart menu">
                                <li class="cart-text">Carro</li>
                                <li class="<?php echo esc_attr($class); ?>">
                                    <?php storefront_cart_link(); ?>
                                </li>
                                <li class="cart-contents-pascal">
                                    <?php the_widget('WC_Widget_Cart', 'title='); ?>
                                </li>
                            </ul>
                            <div id="site-redes">
                                <a href="https://www.instagram.com/pascal_computadoras/" target="blank" class="instagram-header">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 551.034 551.034" style="enable-background:new 0 0 551.034 551.034;" xml:space="preserve">
                                    <g>

                                    <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="275.517" y1="4.57" x2="275.517" y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)">
                                    <stop  offset="0" style="stop-color:#E09B3D"/>
                                    <stop  offset="0.3" style="stop-color:#C74C4D"/>
                                    <stop  offset="0.6" style="stop-color:#C21975"/>
                                    <stop  offset="1" style="stop-color:#7024C4"/>
                                    </linearGradient>
                                    <path style="fill:url(#SVGID_1_);" d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722
                                          c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156
                                          C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156
                                          c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722
                                          c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z"/>

                                    <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="275.517" y1="4.57" x2="275.517" y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)">
                                    <stop  offset="0" style="stop-color:#E09B3D"/>
                                    <stop  offset="0.3" style="stop-color:#C74C4D"/>
                                    <stop  offset="0.6" style="stop-color:#C21975"/>
                                    <stop  offset="1" style="stop-color:#7024C4"/>
                                    </linearGradient>
                                    <path style="fill:url(#SVGID_2_);" d="M275.517,133C196.933,133,133,196.933,133,275.516s63.933,142.517,142.517,142.517
                                          S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6c-48.095,0-87.083-38.988-87.083-87.083
                                          s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083C362.6,323.611,323.611,362.6,275.517,362.6z"/>

                                    <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="418.31" y1="4.57" x2="418.31" y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)">
                                    <stop  offset="0" style="stop-color:#E09B3D"/>
                                    <stop  offset="0.3" style="stop-color:#C74C4D"/>
                                    <stop  offset="0.6" style="stop-color:#C21975"/>
                                    <stop  offset="1" style="stop-color:#7024C4"/>
                                    </linearGradient>
                                    <circle style="fill:url(#SVGID_3_);" cx="418.31" cy="134.07" r="34.15"/>
                                    </g>

                                    </svg>
                                </a>
                                <a href="https://www.facebook.com/pascalcomputadoras/" class="facebook-header" target="blank">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 408.788 408.788" style="enable-background:new 0 0 408.788 408.788;" xml:space="preserve">
                                    <path style="fill:#475993;" d="M353.701,0H55.087C24.665,0,0.002,24.662,0.002,55.085v298.616c0,30.423,24.662,55.085,55.085,55.085
                                          h147.275l0.251-146.078h-37.951c-4.932,0-8.935-3.988-8.954-8.92l-0.182-47.087c-0.019-4.959,3.996-8.989,8.955-8.989h37.882
                                          v-45.498c0-52.8,32.247-81.55,79.348-81.55h38.65c4.945,0,8.955,4.009,8.955,8.955v39.704c0,4.944-4.007,8.952-8.95,8.955
                                          l-23.719,0.011c-25.615,0-30.575,12.172-30.575,30.035v39.389h56.285c5.363,0,9.524,4.683,8.892,10.009l-5.581,47.087
                                          c-0.534,4.506-4.355,7.901-8.892,7.901h-50.453l-0.251,146.078h87.631c30.422,0,55.084-24.662,55.084-55.084V55.085
                                          C408.786,24.662,384.124,0,353.701,0z"/>

                                    </svg>

                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div id="secondary-navigation-back"></div>
            <nav id="secondary-navigation" role="navigation" aria-label="<?php esc_html_e('Secondary Navigation', 'storefront'); ?>">                    

                <div id="secondary-navigation-back2"></div>

                <div class="container">                      
                    <div class="row">
                        <div class="col-md-12">



                            <div id="secondary-nav-container">
                                <div id="secondary-nav-close">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" viewBox="0 0 95.939 95.939" x="0px" y="0px" width="10px" height="10px"xml:space="preserve">
                                    <g>
                                    <path d="M62.819,47.97l32.533-32.534c0.781-0.781,0.781-2.047,0-2.828L83.333,0.586C82.958,0.211,82.448,0,81.919,0   c-0.53,0-1.039,0.211-1.414,0.586L47.97,33.121L15.435,0.586c-0.75-0.75-2.078-0.75-2.828,0L0.587,12.608   c-0.781,0.781-0.781,2.047,0,2.828L33.121,47.97L0.587,80.504c-0.781,0.781-0.781,2.047,0,2.828l12.02,12.021   c0.375,0.375,0.884,0.586,1.414,0.586c0.53,0,1.039-0.211,1.414-0.586L47.97,62.818l32.535,32.535   c0.375,0.375,0.884,0.586,1.414,0.586c0.529,0,1.039-0.211,1.414-0.586l12.02-12.021c0.781-0.781,0.781-2.048,0-2.828L62.819,47.97   z"/>
                                    </g>
                                    </svg>
                                </div>


                                <?php
                                wp_nav_menu(
                                        array(
                                            'theme_location' => 'primary',
                                            'container' => '',
                                            'menu_id' => 'nav-primary-mobile',
                                        )
                                );
                                ?>


                                <?php
                                wp_nav_menu(
                                        array(
                                            'theme_location' => 'secondary',
                                            'container' => '',
                                            'menu_id' => 'nav-secondary-head',
                                            'menu_class' => 'nav-secondary'
                                        )
                                );

                                $args = array(
                                    'taxonomy' => 'product_cat',
                                    'hide_empty' => 0
                                );
                                $c = get_categories($args);

                                $catsMagic = array();
                                foreach ($c as $cat) {
                                    $catEspecial = get_field('categoria_especial', $cat);
                                    if ($catEspecial) {
                                        $catsMagic[] = $cat;
                                    }
                                }
                                ?><ul class="secondary-nav-special-cats" id="secondary-nav-special-cats-header">
                                <?php
                                foreach ($catsMagic as $cat) {
                                    $color = get_field('color_categoria', $cat);
                                    $link = esc_url(get_term_link($cat));
                                    $img = get_field('imagen_categoria_menu', $cat);
                                    echo "<li>"
                                    . "<a href='{$link}' style='background-color:{$color}' title='{$cat->name}'>"
                                    . "<div class='cat-especial-header-bg' style='background-image:url({$img['sizes']['medium']});'></div><span>{$cat->name}</span></a>"
                                    . "</li>";
                                }
                                ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </nav><!-- #site-navigation -->


            <nav>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            wp_nav_menu(
                                    array(
                                        'theme_location' => 'categorias',
                                        'container' => '',
                                        'menu_id' => 'nav-categorias',
                                    //'walker'=> new example_nav_walker
                                    )
                            );
                            ?>
                        </div>
                    </div>
                </div>

            </nav>
        </header><!-- #masthead -->

        <?php
        /**
         * Functions hooked in to storefront_before_content
         *
         * @hooked storefront_header_widget_region - 10
         */
        do_action('storefront_before_content');
        ?>

        <div id="content" class="site-content" tabindex="-1">


            <?php
            /**
             * Functions hooked in to storefront_content_top
             *
             * @hooked woocommerce_breadcrumb - 10
             */
            do_action('storefront_content_top');
            