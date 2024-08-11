import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';

//import Swal from 'sweetalert2';
@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css',
})

export class AppComponent {
  title = 'Sistema de Facturación';
}