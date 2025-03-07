@extends('layouts.app')

@section('content')
    <hgroup>
        <h1>Lista de Productos</h1>
        <br>
        <a href="#" data-target="createModal" onclick="toggleModal(event)" style="align-items: flex-end;">Crear Producto</a>  
    </hgroup>
    

    <table style="overflow-x: auto;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>
                        <a href="#" data-target="showModal{{ $producto->id }}" onclick="toggleModal(event)">Ver</a> |
                        <a href="#" data-target="editModal{{ $producto->id }}" onclick="toggleModal(event)">Editar</a> |
                        <a href="#" data-target="deleteModal{{ $producto->id }}" onclick="toggleModal(event)">Eliminar</a>                       
                    </td>
                </tr>
                
                
                <dialog id="showModal{{ $producto->id }}">
                    <article>
                        <a href="#" aria-label="Close" class="close" data-target="showModal{{ $producto->id }}" onclick="toggleModal(event)"></a>
                        <h1>Detalles del Producto</h1>
                        <div>
                            <strong>Nombre:</strong>
                            {{ $producto->nombre }}
                        </div>
                        <div>
                            <strong>Descripción:</strong>
                            {{ $producto->descripcion }}
                        </div>
                        <div>
                            <strong>Precio:</strong>
                            {{ $producto->precio }}
                        </div>
                    </article>
                </dialog>
                

                <dialog id="editModal{{ $producto->id }}">
                    <article>
                        <a href="#" aria-label="Close" class="close" data-target="editModal{{ $producto->id }}" onclick="toggleModal(event)"></a>
                        <h1>Editar Producto</h1>
                        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" required>
                            </div>
                            <div>
                                <label for="descripcion">Descripción:</label>
                                <textarea name="descripcion" id="descripcion" required>{{ $producto->descripcion }}</textarea>
                            </div>
                            <div>
                                <label for="precio">Precio:</label>
                                <input type="number" name="precio" id="precio" step="0.01" value="{{ $producto->precio }}" required>
                            </div>
                            <button type="submit">Actualizar</button>
                        </form>
                    </article>
                </dialog>

                <dialog id="deleteModal{{ $producto->id }}">
                    <article>
                    <a href="#" aria-label="Close" class="close" data-target="deleteModal{{ $producto->id }}" onclick="toggleModal(event)"></a>
                        <h1>Confirmar</h1>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                        </form> 
                    </article>
                </dialog>
            @endforeach
        </tbody>
    </table>

    

    <dialog id="createModal">
        <article>
            <a href="#" aria-label="Close" class="close" data-target="createModal" onclick="toggleModal(event)"></a>
            <h1>Crear Producto</h1>
            <form action="{{ route('productos.store') }}" method="POST">
                @csrf
                <div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required>
                </div>
                <div>
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" required></textarea>
                </div>
                <div>
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" id="precio" step="0.01" required>
                </div>
                <button type="submit">Guardar</button>
            </form>
        </article>
    </dialog>

    
@endsection

    

<script>
    /*
 * Modal
 *
 * Pico.css - https://picocss.com
 * Copyright 2019-2024 - Licensed under MIT
 */

// Config
const isOpenClass = "modal-is-open";
const openingClass = "modal-is-opening";
const closingClass = "modal-is-closing";
const scrollbarWidthCssVar = "--pico-scrollbar-width";
const animationDuration = 400; // ms
let visibleModal = null;

// Toggle modal
const toggleModal = (event) => {
  event.preventDefault();
  const modal = document.getElementById(event.currentTarget.dataset.target);
  if (!modal) return;
  modal && (modal.open ? closeModal(modal) : openModal(modal));
};

// Open modal
const openModal = (modal) => {
  const { documentElement: html } = document;
  const scrollbarWidth = getScrollbarWidth();
  if (scrollbarWidth) {
    html.style.setProperty(scrollbarWidthCssVar, `${scrollbarWidth}px`);
  }
  html.classList.add(isOpenClass, openingClass);
  setTimeout(() => {
    visibleModal = modal;
    html.classList.remove(openingClass);
  }, animationDuration);
  modal.showModal();
};

// Close modal
const closeModal = (modal) => {
  visibleModal = null;
  const { documentElement: html } = document;
  html.classList.add(closingClass);
  setTimeout(() => {
    html.classList.remove(closingClass, isOpenClass);
    html.style.removeProperty(scrollbarWidthCssVar);
    modal.close();
  }, animationDuration);
};

// Close with a click outside
document.addEventListener("click", (event) => {
  if (visibleModal === null) return;
  const modalContent = visibleModal.querySelector("article");
  const isClickInside = modalContent.contains(event.target);
  !isClickInside && closeModal(visibleModal);
});

// Close with Esc key
document.addEventListener("keydown", (event) => {
  if (event.key === "Escape" && visibleModal) {
    closeModal(visibleModal);
  }
});

// Get scrollbar width
const getScrollbarWidth = () => {
  const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;
  return scrollbarWidth;
};

// Is scrollbar visible
const isScrollbarVisible = () => {
  return document.body.scrollHeight > screen.height;
};
</script>