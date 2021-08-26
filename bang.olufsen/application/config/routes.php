<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/

//1ER ENTREGA
$route['default_controller']  = 'MiControlador';
$route['principal']           = 'MiControlador/verPrincipal';
$route['quienes_somos']       = 'MiControlador/verQuienesSomos';
$route['comercializacion']    = 'MiControlador/verComercializacion';
$route['contacto']            = 'Consulta_controller/verContacto';
$route['terminos']            = 'MiControlador/verTerminos';

$route['catalogo'] = 'Producto_controller/verCatalogo/0/0';
$route['catalogo/(:num)'] = 'Producto_controller/verCatalogo/0/$1';
$route['catalogo/parlantes'] = 'Producto_controller/verCatalogo/1/0';
$route['catalogo/parlantes/(:num)'] = 'Producto_controller/verCatalogo/1/$1';
$route['catalogo/auriculares'] = 'Producto_controller/verCatalogo/2/0';
$route['catalogo/auriculares/(:num)'] = 'Producto_controller/verCatalogo/2/$1';
$route['catalogo/televisores'] = 'Producto_controller/verCatalogo/3/0';
$route['catalogo/televisores/(:num)'] = 'Producto_controller/verCatalogo/3/$1';
$route['catalogo/accesorios'] = 'Producto_controller/verCatalogo/4/0';
$route['catalogo/accesorios/(:num)'] = 'Producto_controller/verCatalogo/4/$1';
$route['catalogo/ofertas'] = 'Producto_controller/verOferta/0';
$route['catalogo/ofertas/(:num)'] = 'Producto_controller/verOferta/$1';

$route['busqueda'] = 'Producto_controller/verBusqueda';

$route['verano2019'] = '';
$route['beosound_shape'] = '';

//SESION
$route['registro'] = 'Cliente_controller/verRegistro';
$route['login'] = 'Usuario_controller/verLogin';
$route['configuracion'] = 'Cliente_controller/verModificarCliente';
$route['salir'] = 'Usuario_controller/cerrarSesion';
$route['carrito'] = 'Carrito_controller/verCarrito';
/************************************/
$route['compras/(:num)'] = 'Carrito_controller/verCompras/$1/ASC';
$route['compras/(:num)/ASC'] = 'Carrito_controller/verCompras/$1/ASC';
$route['compras/(:num)/DESC'] = 'Carrito_controller/verCompras/$1/DESC';

$route['admin'] = 'MiControlador/verAdmin';

//LISTADO ADMINISTRADOR
$route['admin/listado'] = 'Producto_controller/verListado/0/0';
$route['admin/listado/(:num)'] = 'Producto_controller/verListado/0/$1';
$route['admin/listado/parlantes'] = 'Producto_controller/verListado/1/0';
$route['admin/listado/parlantes/(:num)'] = 'Producto_controller/verListado/1/$1';
$route['admin/listado/auriculares'] = 'Producto_controller/verListado/2/0';
$route['admin/listado/auriculares/(:num)'] = 'Producto_controller/verListado/2/$1';
$route['admin/listado/televisores'] = 'Producto_controller/verListado/3/0';
$route['admin/listado/televisores/(:num)'] = 'Producto_controller/verListado/3/$1';
$route['admin/listado/accesorios'] = 'Producto_controller/verListado/4/0';
$route['admin/listado/accesorios/(:num)'] = 'Producto_controller/verListado/4/$1';

$route['admin/producto'] = 'Producto_controller/verRegistro';
$route['admin/modificar/(:num)'] = 'Producto_controller/verModificarProducto/$1';
$route['admin/consultas'] = 'Consulta_controller/verConsultas';
/************************************/
$route['admin/compras'] = 'Carrito_controller/verCompras/0/ASC';
$route['admin/compras/ASC'] = 'Carrito_controller/verCompras/0/ASC';
$route['admin/compras/DESC'] = 'Carrito_controller/verCompras/0/DESC';

$route['acceso_invalido'] = 'MiControlador/verAccesoInvalido';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
