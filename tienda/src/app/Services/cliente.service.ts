import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { ICliente } from '../Interfaces/icliente';

@Injectable({
  providedIn: 'root',
})
export class ClienteService {
  apiurl = 
    'http://localhost/Sexto/Proyectos/03MVC/controllers/clientes.controller.php?op=';

  constructor(private lector: HttpClient) {}

  todos(): Observable<ICliente[]> {
    return this.lector.get<ICliente[]>(this.apiurl + 'todos');
  }
  eliminar(idCliente: number): Observable<number> {
    const formData = new FormData();
    formData.append('idClientes', idCliente.toString());
    return this.lector.post<number>(this.apiurl + 'eliminar', formData);
  }

}