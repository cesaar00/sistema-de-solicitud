<td>
        <a href="{{route($route.'.edit', $id)}}">Editar</a>
   <td>

         <button class="btn btn-link"
             type="button"
             rel="tooltip"
             data-toggle="modal"
             data-target="#deleteModal"
             data-name="{{$name}}"
             data-id="{{$id}}">Eliminar</button>
     </td>
     <div class="modal" id="deleteModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p id="modalbody"></p>
                </div>
                <div class="modal-footer">
                <form action=" {{route($route.'.destroy', 'null')}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" id="deleteId" name="id">
                <button type="submit" class="btn btn-primary" id="deletebutton">Eliminar</button>

                </form>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
              </div>
            </div>
          </div>
