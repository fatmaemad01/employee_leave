@props([
    'btn' , 'id' , 'class'
])
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $id }}">
    {{ $btn }}
</button>

<!-- Modal -->
<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog {{$class}}">
        <div class="modal-content">
            {{ $slot }}

           
        </div>
    </div>
</div>
