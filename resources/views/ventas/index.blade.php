@extends('layouts.user_type.auth')

@section('content')

<div>
   <div class="alert alert-secondary mx-4 bg-gradient-primary text-center" role="alert">
         <strong class="text-white">
            ¡Administra tu flujo de Ventas! Revisa, crea y elimina ventas al instante.
         </strong>
   </div>

   <div class="row">
      <div class="col-12">
         <div class="card mb-4 mx-4">
            <div class="card-header pb-2">
               <div class="d-flex flex-row justify-content-between">
                  <div class="ms-3">
                     <h5 class="mb-0">Ventas</h5>
                  </div>
                  <a href="{{ route('ventas.create') }}" class="btn bg-gradient-primary btn-sm ms-3 mb-0" type="button">+&nbsp; Nueva Venta</a>
               </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
               <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                     <thead>
                        <tr>
                           <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                              #
                           </th>
                           <!-- <th class="text-center text-uppercase text-primary text-sm font-weight-bold"> -->
                           <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                              Productos
                           </th>
                           <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Cantidad
                                    </th> -->
                           <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                              Total
                           </th>
                           <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Fecha
                                    </th> -->
                           <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                              Eliminar
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($ventas as $venta)
                        <tr>
                           <td class="text-center">
                              <p class="text-sm font-weight-bold mb-0">
                                 {{ ++$i }}
                              </p>
                           </td>

                           @if ($venta->productos->isNotEmpty())
                           <td class="text-center">
                              <p class="text-sm font-weight-bold mb-0">
                                 {{ implode(', ', $venta->productos->map(function ($producto) {
                                    return $producto->nombre . ' (' . $producto->pivot->cantidad . ')';
                                 })->toArray()) }}
                              </p>
                           </td>
                           @else
                           <td class="text-center">
                              <p class="text-xs font-weight-bold mb-0">
                                 No hay productos asociados a esta venta.
                              </p>
                           </td>
                           @endif

                           <!-- <td >{{ $venta->cantidad }}</td> -->
                           <td class="text-center">
                              <span class="text-white text-xs font-weight-bolder mb-0 badge-custom">
                                 <i class="fas fa-check-circle"></i> ${{ number_format($venta->total, 0, ',', '.') }}
                              </span>
                           </td>

                           <td class="text-center">
                              <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $venta->id }}">
                                 <!-- <a class="btn btn-sm btn-primary " href="{{ route('ventas.show', $venta->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('ventas.edit', $venta->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a> -->
                                 @csrf
                                 @method('DELETE')
                                 <!-- <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Deseas eliminar la venta?') ? this.closest('form').submit() : false;">
                                                        <i class="fa fa-fw fa-trash"></i> 
                                                        {{ __('Delete') }}
                                                    </button> -->

                                 <button type="button" class="buttonDel bg-gradient-primary" onclick="confirmDelete({{ $venta->id }})">
                                    <svg viewBox="0 0 448 512" class="svgIcon">
                                       <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                                    </svg>
                                 </button>
                              </form>

                           </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                No hay ventas registradas.
                            </td>
                        </tr>
                        @endforelse


                        <!-- <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">1</p>
                                    </td>
                                    <td>
                                        <div>
                                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Admin</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">admin@softui.com</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">16/06/18</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span>
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr> -->

                     </tbody>
                  </table>
                  <div class="pagination-container">
                      {{ $ventas->links('pagination::bootstrap-4') }}
                  </div>

                  
               </div>
               <a type="button" class="btn bg-gradient-primary btn-sm ms-3 mb-0" href="{{ url('/pdf') }}" target="_blank">Generar Reporte</a>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
   function confirmDelete(id) {
      Swal.fire({
         title: '¿Estás seguro?',
         text: "¡Esta venta será eliminada permanentemente!",
         icon: 'warning',
         confirmButtonColor: "#6e7881",
         cancelButtonColor: "#7066e0",
         showCancelButton: true,
         confirmButtonText: 'Sí, eliminar',
         cancelButtonText: 'Cancelar',
      }).then((result) => {
         if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
         }
      });
   }
</script>

@endsection