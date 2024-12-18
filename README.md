<h1 align="center" id="title">Agenda Médica 👨‍⚕️👩‍⚕️</h1>

<p id="description">
  Originalmente este proyecto fue hecho para practicar PHP y JavaScript. Pero me pareció una idea interesante y seguí mejorándolo de a poco.  
  La agenda es para que un doctor (que es el administrador) pueda tener varios hospitales, asistentes y pacientes.
  La idea es que, si el paciente decide acudir junto al mismo doctor en diferentes hospitales, este pueda llevar un registro e historial del paciente. </br>

  El doctor: es el usuario administrador. Puede registrar varios asistentes con usuarios y contraseñas. También puede crear o habilitar los horarios en los que se puede crear las citas</br>
  Asistente: es el usuario que puede registrar pacientes. Crear fichas, crear citas o turnos y crear recetas.
  Los turnos (o citas): Están vinculados al horario que habilita el doctor para atender a los pacientes.</br>

  La interfaz gráfica está generada en HTML, CSS, Bootstrap y javascript. Para crear los horarios y citas de forma gráfica uso una librería javascript de terceros. 

  
  

</p>

<h2>🚀 Demo</h2>

[https://agenda.idevpy.com](https://agenda.idevpy.com)

<h2>🛠️ Pasos para la instalación:</h2>

<p>1. Clone el proyecto.</p>

```
git clone https://github.com/edbenrio/agenda
```

<p>2. En la raíz del proyecto encontrará el archivo DB.sql. Cree una base de datos e importe en el el archivo en la base de datos.</p>

<p>3. En el archivo Config/Config.php puede configurar los parametros de conexion a la base de datos y dominio que debe tener la ruta del proyecto.</p>

 ```
 
 <?php

    const BASE_URL = "http://localhost/agenda/";
    date_default_timezone_set("America/Asuncion");

    //Datos de conexion a la base de datos 
    const DB_HOST = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "";
    const DB_NAME = "agenda_medica";
    const DB_CHARSET = "charset=utf8";

    const SPD = ".";
    const SPM = ",";
    const MONEY = "Gs. ";
 ```
  
<h2>💻 Built with</h2>

Tecnologías usadas en el proyecto 

*   PHP
*   JavaScript
*   CSS
*   Bootstrap
