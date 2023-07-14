<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary" style="color:white;">
                <div class="inner">
                    <h3>{{ $cotizacionNum }} Cotizaciones</h3>
                    <p>En espera de ser aprobadas</p>
                </div>
                <div class="icon">
                    <i class="icon icon-clipboard"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info" style="color:white;">
                <div class="inner">
                    <h3>{{ $aprobadonNum }} Aprobados</h3>
                    <p>Listos para ser iniciados</p>
                </div>
                <div class="icon">
                    <i class="icon icon-clipboard"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box " style="background-color:rgb(212, 243, 102);color:white;">
                <div class="inner">
                    <h3>{{ $procesoNum }} En proceso</h3>
                    <p>La clase será recalculada al terminar</p>
                </div>
                <div class="icon">
                    <i class="icon icon-clipboard"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box" style="background-color: rgb(235, 175, 65);color:white;">
                <div class="inner">
                    <h3>{{ $terminadoNum }} Terminados</h3>
                    <p>En espera de ser aprobados</p>
                </div>
                <div class="icon">
                    <i class="icon icon-clipboard"></i>
                </div>
            </div>
        </div>
    </div>
</div>
