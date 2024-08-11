# Contenido de Frecuente 1 - P1: CRUD de Clientes y Productos

## Informe de Tarea

En este repositorio se presenta el resultado de las actividades realizadas para cumplir con la tarea solicitada de implementar CRUD (Crear, Leer, Actualizar, Eliminar) a nivel de modelos y controladores para Clientes y Productos.

### Desarrollo en PHP

#### Modificaciones y Creaciones

* Se modificó la clase `Conectar` en `config.php` para devolver la conexión como objeto, utilizar excepciones para manejo de errores y crear constantes para credenciales de la base de datos.
* Se crearon los siguientes archivos:
	+ `clientes.model.php`
	+ `clientes.controller.php`
	+ `productos.model.php`
	+ `productos.controller.php`
* Se agregaron funciones para manejar errores y validar datos en los controladores `clientes.controller.php` y `productos.controller.php`.
* Se crearon scripts en PHP para probar el buen funcionamiento de los archivos creados.

### Desarrollo en Angular

#### Modificaciones y Creaciones

* Se modificó `app.component` para habilitar la navegación entre opciones.
* Se modificó `app.routes.ts` para configurar las rutas.
* Se crearon interfaces para los modelos de datos de clientes y productos (`ICliente` y `IProducto`).
* Se crearon servicios para interactuar con la API de clientes y productos (`ClienteService` y `ProductoService`).
* Se crearon componentes para mostrar la lista de clientes y productos (`ClienteComponent` y `ProductoComponent`).
* Se creó el componente y servicio para Proveedores (`ProveedorComponent` y `ProveedorService`).
* Se crearon templates HTML para desplegar:
	+ Clientes
	+ Proveedores
	+ Productos
