<?php

return [

    /*
|--------------------------------------------------------------------------
| Valores predeterminados de autenticación
|--------------------------------------------------------------------------
|
| Esta opción controla las opciones predeterminadas de autenticación y restablecimiento de contraseña para su aplicación. 
  Puede cambiar estos valores predeterminados según sea necesario, pero son ideales para la mayoría de las aplicaciones.
|
*/

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

  /*
|--------------------------------------------------------------------------
| Protectores de autenticación
|--------------------------------------------------------------------------
|
| A continuación, puede definir cada protector de autenticación para su aplicación.
| Por supuesto, se ha definido una excelente configuración predeterminada que utiliza el almacenamiento de sesiones y el proveedor de usuarios de Eloquent.
|
| Todos los controladores de autenticación tienen un proveedor de usuarios. 
  Este define cómo se recuperan los usuarios de la base de datos u otros mecanismos de almacenamiento que utiliza esta aplicación para conservar los datos de sus usuarios.
|
| Compatible con: "sesión"
|
*/

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
|--------------------------------------------------------------------------
| Proveedores de Usuarios
|--------------------------------------------------------------------------
|
| Todos los controladores de autenticación tienen un proveedor de usuarios.
 Este define cómo se recuperan los usuarios de la base de datos u otros mecanismos de almacenamiento que utiliza esta aplicación para conservar los datos de sus usuarios.
| Si tiene varias tablas o modelos de usuarios, puede configurar varias fuentes que representen cada modelo/tabla.
 Estas fuentes pueden asignarse a cualquier protección de autenticación adicional que haya definido.
|
| Compatible con: "database", "eloquent"
|
*/

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

   /*
|--------------------------------------------------------------------------
| Restablecimiento de contraseñas
|------------------------------------------------------------------------------------------
|
| Puede especificar varias configuraciones de restablecimiento de contraseña si tiene más de una tabla o modelo de usuario en la aplicación y
   desea tener configuraciones de restablecimiento de contraseña independientes según los tipos de usuario específicos.
|
| El tiempo de expiración indica la cantidad de minutos que el token de restablecimiento debe considerarse válido. 
  Esta función de seguridad mantiene la vida útil de los tokens, por lo que es menos probable que se adivinen. Puede cambiar esto según sea necesario.
|
*/

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

   /*
|--------------------------------------------------------------------------
| Tiempo de espera para la confirmación de contraseña
|--------------------------------------------------------------------------
|
| Aquí puede definir la cantidad de segundos que deben transcurrir antes de que expire el tiempo de espera para la confirmación de contraseña y
  se le solicite al usuario que vuelva a ingresarla en la pantalla de confirmación. Por defecto, el tiempo de espera es de tres horas.
|
*/

    'password_timeout' => 10800,

];
