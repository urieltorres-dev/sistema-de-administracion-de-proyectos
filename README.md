# Sistema de administración de proyectos

Este sistema fue desarrollado como parte de un proyecto universitario para la asignatura **"Tecnologías y aplicaciones en internet"**. El objetivo del proyecto fue crear una aplicación web que facilitara la gestión y organización de proyectos. Se trabajó en binas, con un periodo de desarrollo de cuatro semanas, y cada semana se nos solicitó completar un hito para evaluar nuestro progreso.

## Descripción del proyecto

El proyecto final **Administración de proyectos** sistema administrativo está diseñado para simplificar la administración de proyectos, la asignación de colaboradores y la gestión de clientes. Los administradores tienen control total sobre la creación y edición de proyectos, mientras que los colaboradores pueden gestionar sus propias asignaciones. El sistema permite agregar colaboradores, definir prioridades, gestionar pagos, y realizar un seguimiento detallado del estado de los proyectos.

## Perfiles de usuario y funcionalidades

### Perfil: Administrador

1. **Tablero de indicadores:** 
   - Muestra tablas que resumen los avances de los proyectos, ingresos, tareas y clientes.
   
2. **Gestor de colaboradores:**
   - Listado en formato de cartas que permite agregar, editar y eliminar colaboradores. Visualiza la información clasificada de los colaboradores. [Ejemplo dado en clase](https://smarthr.dreamguystech.com/php/template/employees.php).
   
3. **Gestor de clientes:**
   - Visualización de los clientes en un formato de cartas clasificado. Los administradores pueden agregar, editar y eliminar clientes. [Ejemplo dado en clase](https://smarthr.dreamguystech.com/php/template/clients.php).

4. **Gestor de proyectos:**
   - Gestión de proyectos que incluye un listado con información relevante (nombre del proyecto, clientes, colaboradores, fechas, etc.). Cada proyecto permite la carga de archivos (imágenes, pdf), manejo de fechas de inicio y fin, así como la gestión de costos asociados. También se asignan colaboradores y clientes a los proyectos. [Ejemplo dado en clase](https://smarthr.dreamguystech.com/php/template/projects.php).

### Perfil: Colaborador

1. **Tablero de indicadores:**
   - Proporciona gcartas que muestran los pagos, proyectos en proceso y proyectos pendientes.

2. **Gestor de finanzas:**
   - Vista de estado de cuenta, que muestra los ingresos por proyecto. También se presenta un balance general. [Ejemplo dado en clase](https://smarthr.dreamguystech.com/php/template/payments.php).

3. **Gestor de proyectos asignados:**
   - Listado de los proyectos en los que el colaborador está participando. Se muestran todos los proyectos asignados y su estado.

## Contribuciones del equipo

Aunque fue un proyecto en binas, la totalidad del desarrollo técnico, incluyendo la programación, implementación de funcionalidades y despliegue en Digital Ocean, fue realizado principalmente por mí.

## Tecnologías Utilizadas

+ **Lenguajes:** PHP, HTML, CSS y JavaScript
+ **Base de datos:** MySQL
+ **Frameworks:** Laravel y Tailwind CSS
+ **Librerías:** SweetAlert2 y Dropzone
+ **Herramientas de desarrollo:** Docker, Visual Studio Code

## Instalación y configuración

Para ejecutar este proyecto en tu entorno local, sigue estos pasos:

1. Clona el repositorio:
```bash
git clone https://github.com/urieltorres-dev/sistema-de-administracion-de-proyectos.git
```

2. Instala las dependencias de Composer:
```bash
composer install
```

3. Instala las dependencias de Node.js:
```bash
npm install
```

4. Configura el archivo `.env` y genera la clave de la aplicación:
```bash
cp .env.example .env
php artisan key:generate
```

5. Ejecuta las migraciones y seeders:
```bash
php artisan migrate --seed
```

6. Inicia el servidor de desarrollo:
```bash
php artisan serve
```

7. Ejecuta los assets de frontend:
```bash
npm run dev
```

8. Accede a la aplicación a través de tu navegador en `http://localhost:8000`.

## Capturas de pantalla

A continuación se muestran algunas capturas de pantalla de la aplicación:

<table>
  <tr>
    <td align="center">
      <img src="public/img/ss1.png" width="400" alt="Login">
      <br><b>Login</b>
    </td>
    <td align="center">
      <img src="public/img/ss2.png" width="400" alt="Register">
      <br><b>Register</b>
    </td>
  </tr>
  <tr>
    <td align="center">
      <img src="public/img/ss3.png" width="400" alt="Admin dashboard">
      <br><b>Admin dashboard</b>
    </td>
    <td align="center">
      <img src="public/img/ss4.png" width="400" alt="Gestión de clientes">
      <br><b>Gestión de clientes</b>
    </td>
  </tr>
  <tr>
    <td align="center">
      <img src="public/img/ss5.png" width="400" alt="Gestión de colaboradores">
      <br><b>Gestión de colaboradores</b>
    </td>
    <td align="center">
      <img src="public/img/ss6.png" width="400" alt="Gestión de proyectos">
      <br><b>Gestión de proyectos</b>
    </td>
  </tr>
  <tr>
    <td align="center">
      <img src="public/img/ss7.png" width="400" alt="Dashboard de los colaboradores">
      <br><b>Dashboard de los colaboradores</b>
    </td>
    <td align="center">
      <img src="public/img/ss8.png" width="400" alt="Gestión de proyectos para colaboradores">
      <br><b>Gestión de proyectos para colaboradores</b>
    </td>
  </tr>
  <tr>
</table>

## Demo

Por el momento la demo no está  disponible.

## Licencia

Este proyecto está licenciado bajo la Licencia MIT - consulta el archivo [LICENSE](https://choosealicense.com/licenses/mit/) para más detalles.

## Contacto

Para más información o consultas, puedes contactarme a través de [urieltorres.dev@gmail.com](mailto:urieltorres.dev@gmail.com) o en [github.com/urieltorres-dev](https://github.com/urieltorres-dev).

