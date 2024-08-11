
import { Routes } from '@angular/router';
import { ClienteComponent } from './cliente.component';
import { ProductoComponent } from './producto.component';
import { ProveedorComponent } from './proveedor.component';

export const routes: Routes = [
  { path: 'clientes', component: ClienteComponent },
  { path: 'productos', component: ProductoComponent },
  { path: 'proveedores', component: ProveedorComponent }
];