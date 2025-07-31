<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# sobre el projecto
Este es un projecto para la digitalización de ganado bovino, ayudara a agilizar el control ganadero. 

# Tecologias a utlizar
- PHP -> lenguaje.
- Laravel -> framework.
- SQLLite -> base de datos.
- Tailwind and DaisyUI -> framework fronted.

# documentación de instalción en Linux
### instalción de php

```bash
sudo apt install php -y
```
### instalcioón de composer
-[intlacion de composer](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-20-04-es)

### Instalación de NodeJS
```bash
sudo apt install curl
```

```bash
sudo curl -fsSL https://deb.nodesource.com/setup_22.x | sudo -E bash -
```

Actualiza los repositorios

```bash
sudo apt update
```
### Tailwind
-[Documentacion de tailwind](https://tailwindcss.com/docs/installation/using-vite)

### DaisyUI
-[Documentacion de daisyUI](https://daisyui.com/docs/install/)

## Gestor de base de datos

aqui se deja a discreción de cada quien puede usar el que uno le conviene, puede usar dbeaver o TablePlus.

---
despues de instaldo todo se debe de dirigir al archivo y debe de hacer el siguientes comandos

```bash
composer install
```

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

```bash
composer run dev
```

## listo para usar ! ! !

# Plantilla de base de datos
aqui esta la plantilla de la base de datos del proyecto 

-[BD](https://lucid.app/lucidchart/0236cc94-9842-42d5-9c8e-404b5ce2722e/edit?viewport_loc=287%2C140%2C1109%2C560%2C0_0&invitationId=inv_4ceba973-af22-4596-b00a-5e768a8600c1)

# REPORTERIA
Librerias de exportar EXCEL

-[documentación](https://docs.laravel-excel.com/3.1/getting-started/)

```bash
composer require maatwebsite/excel
```

-[video de excel](https://www.youtube.com/watch?v=LchSPSKx2Gw)


