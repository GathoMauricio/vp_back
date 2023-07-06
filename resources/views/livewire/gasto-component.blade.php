<div>
    <a wire:click="render" data-toggle="modal" data-target="#show_vale_{{ $vale->id }}" href="javascript:void(0)"
        class="btn btn-primary"><span class="icon icon-eye"></span></a>
    @include('gasto_component.show')
    @include('gasto_component.create')
    @include('gasto_component.edit')
</div>
