<div class="grid lg:grid-cols-12 lg:gap-6">
    <div class="lg:col-span-6 mb-5">
        <div class="ltr:text-left rtl:text-right">
            <label for="name" class="font-semibold">Tipo de servicio a resolver</label>
            <div class="form-icon relative mt-2">

                <input name="nombre" id="nombre" type="text" class="form-input ltr:pl-11 rtl:pr-11" required>
            </div>
        </div>
    </div>

    <div class="lg:col-span-6 mb-5">
        <div class="ltr:text-left rtl:text-right">
            <label for="email" class="font-semibold">Descripción del servicio requerido</label>
            <div class="form-icon relative mt-2">
                <i data-feather="modelo" class="w-4 h-4 absolute top-3 ltr:left-4 rtl:right-4"></i>
                <input name="modelo" id="modelo" type="modelo" class="form-input ltr:pl-11 rtl:pr-11" required>
            </div>
        </div>
    </div>
</div>

<div class="grid lg:grid-cols-12 lg:gap-6">
    <div class="lg:col-span-6 mb-5">
        <div class="ltr:text-left rtl:text-right">
            <label for="presupuesto" class="font-semibold">Presupuesto aproximado para invertir</label>
            <div class="form-icon relative mt-2">

                <input name="presupuesto" id="presupuesto" type="text" class="form-input ltr:pl-11 rtl:pr-11">
            </div>
        </div>
    </div>

    <div class="lg:col-span-6 mb-5">
        <div class="ltr:text-left rtl:text-right">
            <label for="email" class="font-semibold">Tipo de servicio</label>
            <div class="form-icon relative mt-2">

                <select name="servicio" id="servicio" class="form-input ltr:pl-11 rtl:pr-11" required>
                    <option value="">Seleccionar</option>
                    <option value="Normal">Normal</option>
                    <option value="Urgente">Urgente</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1">
    <div class="mb-5">
        <div class="ltr:text-left rtl:text-right">
            <label for="description" class="font-semibold">Descripción de la problemática a resolver</label>
            <div class="form-icon relative mt-2">
                <i data-feather="message-circle"
                    class="w-4 h-4 absolute top-3 ltr:left-4 rtl:right-4"></i>
                <textarea name="description" id="description" required class="form-input ltr:pl-11 rtl:pr-11 h-28"
                    placeholder="En este campos podrás añadir detalles importantes a tu solicitud para que sea procesada con mayor efectividad."
                    required>{{ $search }}</textarea>
            </div>
        </div>
    </div>
</div>
</div>
