import { Component, OnInit } from '@angular/core';
import { ClienteService } from './Services/cliente.service';
import { ICliente } from './Interfaces/icliente';

@Component({
  selector: 'app-cliente',
  templateUrl: './cliente.component.html', // Cambiado a templateUrl
  styleUrls: ['./app.component.css'] // Agregado styleUrls
})
export class ClienteComponent implements OnInit {
  listaClientes: ICliente[] = [];

  constructor(private clienteService: ClienteService) { }

  ngOnInit(): void {
    this.clienteService.todos().subscribe((data) => {
      this.listaClientes = data;
    });
  }

  eliminar(idCliente: number): void {
    this.clienteService.eliminar(idCliente).subscribe((data) => {
      console.log(data);
      this.ngOnInit(); // Llamada a ngOnInit para recargar la lista
    });
  }
}