import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { IProducto } from '../Interfaces/IProducto';

@Injectable({
  providedIn: 'root',
})
export class ProductoService {
  apiurl = 'http://localhost/Sexto/Proyectos/03MVC/controllers/productos.controller.php?op=';

  constructor(private lector: HttpClient) {}

  todos(): Observable<IProducto[]> {
    return this.lector.get<IProducto[]>(this.apiurl + 'todos');
  }

  uno(idProducto: number): Observable<IProducto> {
    const formData = new FormData();
    formData.append('idProductos', idProducto.toString());
    return this.lector.post<IProducto>(this.apiurl + 'uno', formData);
  }

  insertar(producto: IProducto): Observable<any> {
    const formData = new FormData();
    formData.append('Codigo_Barras', producto.Codigo_Barras);
    formData.append('Nombre_Producto', producto.Nombre_Producto);
    formData.append('Graba_IVA', producto.Graba_IVA.toString());
    return this.lector.post(this.apiurl + 'insertar', formData);
  }

  actualizar(producto: IProducto): Observable<any> {
    const formData = new FormData();
    formData.append('idProductos', producto.idProductos.toString());
    formData.append('Codigo_Barras', producto.Codigo_Barras);
    formData.append('Nombre_Producto', producto.Nombre_Producto);
    formData.append('Graba_IVA', producto.Graba_IVA.toString());
    return this.lector.post(this.apiurl + 'actualizar', formData);
  }

  eliminar(idProducto: number): Observable<any> {
    const formData = new FormData();
    formData.append('idProductos', idProducto.toString());
    return this.lector.post(this.apiurl + 'eliminar', formData);
  }
}


