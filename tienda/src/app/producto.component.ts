import { Component, OnInit } from '@angular/core';
import { ProductoService } from './Services/producto.service';
import { IProducto } from './Interfaces/IProducto';

@Component({
  selector: 'app-producto',
  templateUrl: './producto.component.html',
  styleUrls: ['./app.component.css']
})
export class ProductoComponent implements OnInit {
  listaProductos: IProducto[] = [];

  constructor(private productoService: ProductoService) { }

  ngOnInit(): void {
    this.productoService.todos().subscribe((data) => {
      this.listaProductos = data;
    });
  }

  eliminar(idProducto: number): void {
    this.productoService.eliminar(idProducto).subscribe((data) => {
      console.log(data);
      this.ngOnInit(); // Llamada a ngOnInit para recargar la lista
    });
  }
}