# Sistema de Registro y Sorteo de Clientes 🎉

Este proyecto fue desarrollado como parte de una prueba técnica de backend en Laravel 10.
Permite registrar clientes, realizar sorteos, validar datos y exportar los registros en Excel.

---

## ⚙️ Requisitos

Asegúrate de tener instalado en tu entorno:

* PHP >= 8.1
* Composer
* Node.js y NPM
* MySQL o MariaDB
* Git (opcional para clonar el repositorio)

---

## 🚀 Instalación paso a paso

### 0. Crear la base de datos manualmente

Antes de ejecutar las migraciones, asegúrate de crear una base de datos llamada `concurso` en tu sistema MySQL.

Puedes hacerlo con este comando si usas consola:

```bash
mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS concurso;"
```

O desde phpMyAdmin, DBeaver u otro cliente SQL.

### 1. Clona el repositorio o descarga el código

```bash
git clone https://github.com/diegobello/clientes-concurso
cd proyecto
```

O si lo descargaste como .zip, extráelo y navega a la carpeta del proyecto.

### 2. Instala dependencias PHP

```bash
composer install
```

### 3. Instala dependencias JavaScript

```bash
npm install
```

### 4. Configura el archivo de entorno

```bash
cp .env.example .env
```

Edita el archivo `.env` con los datos de tu base de datos:

```
DB_DATABASE=concurso
DB_USERNAME=usuario
DB_PASSWORD=clave
```

Luego genera la llave de aplicación:

```bash
php artisan key:generate
```

### 5. Ejecuta las migraciones y seeders

```bash
php artisan migrate --seed
```

Esto creará las tablas necesarias y cargará los datos de departamentos y municipios.

### 6. Compila los archivos CSS/JS con Vite

```bash
npm run dev
```

(Mantén este comando corriendo en una terminal para desarrollo con recarga automática)

### 7. Levanta el servidor local de Laravel

```bash
php artisan serve
```

Accede en tu navegador a:

```
http://127.0.0.1:8000/cliente
```

---

## ✍️ Funcionalidades

| Módulo                       | Descripción                               |
| ---------------------------- | ----------------------------------------- |
| Registro de clientes         | Formulario validado en frontend y backend |
| Validaciones con SweetAlert2 | Mensajes de error y éxito elegantes       |
| Departamentos y municipios   | Carga dinámica con AJAX                   |
| Sorteo de ganador            | Solo si hay mínimo 5 clientes registrados |
| Exportar registros           | Descarga en Excel (.xlsx)                 |

---

## 📄 Ver ganador

Puedes ver la pagina del ganador

```
http://127.0.0.1:8000/cliente/ganador
```

---
---

## 📄 Exportar clientes a Excel

Puedes descargar un archivo Excel con todos los registros accediendo a:

```
http://127.0.0.1:8000/cliente/exportar
```
o

```
Desde la pagina del ganador seleccionar el boton #Descargar Excel de registros#
```

---

## 📓 Librerías utilizadas

* Laravel 10
* Laravel Excel (maatwebsite/excel)
* jQuery y Bootstrap 5
* SweetAlert2
* Vite para assets (JS y CSS)

---

## 👨‍💻 Autor

**Diego Bello Prieto**
Desarrollador Backend
Prueba técnica completada aplicando buenas prácticas de desarrollo.
